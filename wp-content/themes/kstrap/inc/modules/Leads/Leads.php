<?php

namespace Includes\Modules\Leads;

use Includes\Modules\CPT\CustomPostType;

class Leads
{
    protected $postType;
    protected $adminEmail;
    protected $domain;
    protected $ccEmail;
    protected $bccEmail;
    public    $additionalFields;

    /**
     * Leads constructor.
     * configure any options here
     */
    public function __construct ()
    {
        date_default_timezone_set('America/New_York');

        $this->postType   = 'Lead';
        $this->domain     = 'fbcpsj.org';

        //separate multiple email addresses with a ';'
        $this->adminEmail = 'bbaird85@gmail.com';
        $this->ccEmail    = ''; //Admin email only
        $this->bccEmail   = 'bbaird85@gmail.com';

        //use this to merge in additional fields
        $this->assembleLeadData([
            //'name' => 'label'
        ]);
    }

    protected function set($var, $value)
    {
        $this->$var = $value;
    }

    protected function get($var)
    {
        return $this->$var;
    }

    protected function uglify($var){
        return str_replace(' ', '_', strtolower($var));
    }

    /**
     * Creates custom post type and backend view
     * @instructions run once from functions.php
     */
    public function setupAdmin ()
    {
        $this->createPostType();
        $this->createAdminColumns();
    }

    /**
     * Handle data submitted by lead form
     * @param array $dataSubmitted
     * @instructions pass $_POST to $dataSubmitted from template file
     */
    public function handleLead ($dataSubmitted = [])
    {
        $fullName = (isset($dataSubmitted['full_name']) ? $dataSubmitted['full_name'] : null);
        $dataSubmitted['full_name'] = (isset($dataSubmitted['first_name']) && isset($dataSubmitted['last_name']) ? $dataSubmitted['first_name'] . ' ' . $dataSubmitted['last_name'] : $fullName);

        $this->addToDashboard($dataSubmitted);
        $this->sendNotifications($dataSubmitted);
    }

    /**
     * adds a lead (post) to WP admin dashboard (database)
     * @param array $leadInfo
     */
    protected function addToDashboard ($leadInfo)
    {

        $fieldArray = [];
        foreach($this->additionalFields as $name => $label){
            $fieldArray['lead_info_' . $name] = (isset($leadInfo[$name]) ? $leadInfo[$name] :  null);
        }

        wp_insert_post(
            [
                'post_content'   => '',
                'post_status'    => 'publish',
                'post_type'      => $this->uglify($this->postType),
                'post_title'     => $leadInfo['full_name'],
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
                'meta_input'     => $fieldArray
            ],
            true
        );
    }

    /**
     * Returns a properly formatted address
     * @param  $street
     * @param  $street2
     * @param  $city
     * @param  $state
     * @param  $zip
     *
     * @return string
     */
    protected function fullAddress ($street, $street2, $city, $state, $zip)
    {
        return $street . ' ' . $street2 . ' ' . $city . ', ' . $state . '  ' . $zip;
    }

    /*
     * Used to manage data retrieved by lead. Used by pretty much everything.
     * Can pass in additional inputs. Arrays are merged to keep from duplicating fields.
     * @param $input
     */
    protected function assembleLeadData ($input = [])
    {
        $default = [
            'full_name'     => 'Name',
            'email_address' => 'Email Address'
        ];

        $this->additionalFields = array_merge($default, $input);
    }

    /*
     * Sends notification email(s)
     * @param array $leadInfo
     */
    protected function sendNotifications ($leadInfo)
    {
        $emailAddress = (isset($leadInfo['email_address']) ? $leadInfo['email_address'] : null);
        $fullName     = (isset($leadInfo['full_name']) ? $leadInfo['full_name'] : null);

        $tableData = '';
        foreach ($this->additionalFields as $key => $var) {
            if(isset($leadInfo[$key])) {
                $tableData .= '<tr><td class="label"><strong>' . $var . '</strong></td><td>' . $leadInfo[$key] . '</td>';
            }
        }

        $this->sendEmail(
            [
                'to'        => $this->adminEmail,
                'from'      => get_bloginfo() . ' <noreply@' . $this->domain . '>',
                'subject'   => $this->postType . ' submitted on website',
                'cc'        => $this->ccEmail,
                'bcc'       => $this->bccEmail,
                'replyto'   => $fullName . '<' . $emailAddress . '>',
                'headline'  => 'You have a new ' . strtolower($this->postType),
                'introcopy' => 'A ' . strtolower($this->postType) . 'was received from the website. Details are below:',
                'leadData'  => $tableData
            ]
        );

        $this->sendEmail(
            [
                'to'        => $fullName . '<' . $emailAddress . '>',
                'from'      => get_bloginfo() . ' <noreply@' . $this->domain . '>',
                'subject'   => 'Your website submission has been received',
                'bcc'       => $this->bccEmail,
                'headline'  => 'Thank you',
                'introcopy' => 'We\'ll review the information you\'ve provided and get back with you as soon as we can.',
                'leadData'  => $tableData
            ]
        );

    }

    /**
     * Creates a custom post type and meta boxes (now dynamic)
     */
    protected function createPostType ()
    {

        $leads = new CustomPostType(
            $this->postType,
            [
                'supports'           => ['title'],
                'menu_icon'          => 'dashicons-star-empty',
                'has_archive'        => false,
                'menu_position'      => null,
                'public'             => false,
                'publicly_queryable' => false,
            ]
        );

        $fieldArray = [];
        foreach($this->additionalFields as $name => $label){
            $fieldArray[$label] = 'locked';
        }

        $leads->addMetaBox(
            'Lead Info', $fieldArray
        );
    }

    /*
     * Creates columns and data in admin panel
     */
    protected function createAdminColumns ()
    {

        //Adds Column labels. Can be enabled/disabled using screen options.
        add_filter('manage_' . $this->uglify($this->postType) . '_posts_columns', function () {

            $additionalLabels = [];
            foreach($this->additionalFields as $name => $label) {
                if($name != 'first_name' && $name != 'last_name' && $name != 'full_name') {
                    $additionalLabels[$name] = $label;
                }
            }

            $defaults = array_merge(
                [
                    'title'         => 'Name',
                    'email_address' => 'Email',
                    'phone_number'  => 'Phone Number',
                ], $additionalLabels
            );

            $defaults['date'] = 'Date Posted'; //always last

            return $defaults;
        }, 0);

        //Assigns values to columns
        add_action('manage_' . $this->uglify($this->postType) . '_posts_custom_column', function ($column_name, $post_ID) {
            if($column_name != 'title' && $column_name != 'date'){
                switch ($column_name) {
                    case 'email_address':
                        $email_address = get_post_meta($post_ID, 'lead_info_email_address', true);
                        echo(isset($email_address) ? '<a href="mailto:' . $email_address . '" >' . $email_address . '</a>' : null);
                        break;
                    case 'phone_number':
                        $phone_number = get_post_meta($post_ID, 'lead_info_phone_number', true);
                        echo(isset($phone_number) ? '<a href="tel:' . $phone_number . '" >' . $phone_number . '</a>' : null);
                        break;
                    default:
                        echo get_post_meta($post_ID, 'lead_info_' . $column_name, true);
                }
            }
        }, 0, 2);
    }

    /*
     * grabs blank template file and fills with content
     * @return string
     */
    protected function createEmailTemplate ($emailData)
    {
        $eol           = "\r\n";
        $emailTemplate = file_get_contents(wp_normalize_path(get_template_directory() . '/inc/Modules/Leads/emailtemplate.php'));
        $emailTemplate = str_replace('{headline}', $eol . $emailData['headline'] . $eol, $emailTemplate);
        $emailTemplate = str_replace('{introcopy}', $eol . $emailData['introcopy'] . $eol, $emailTemplate);
        $emailTemplate = str_replace('{data}', $eol . $emailData['leadData'] . $eol, $emailTemplate);
        $emailTemplate = str_replace('{datetime}', date('M j, Y') . ' @ ' . date('g:i a'), $emailTemplate);
        $emailTemplate = str_replace('{website}', 'www.fbcpsj.org', $emailTemplate);
        $emailTemplate = str_replace('{url}', 'https://fbcpsj.org', $emailTemplate);
        $emailTemplate = str_replace('{copyright}', date('Y') . ' ' . get_bloginfo(), $emailTemplate);
        return $emailTemplate;
    }

    /*
     * actually send an email
     * TODO: Add handling for attachments
     */
    protected function sendEmail (
        $emailData = [
            'subject'   => 'Email from website',
            'headline'  => 'This is an email from the website!',
            'introcopy' => 'If we weren\'t testing, there would be stuff here.',
            'filedata'  => '',
            'fileinfo'  => '',
            'leadData'  => ''
        ]
    ) {
        $eol           = "\r\n";
        $emailTemplate = $this->createEmailTemplate($emailData);
        $headers       = 'From: ' . 'Website <noreply@' . $this->domain . $eol;
        $headers       .= (isset($this->adminCc) ? 'Cc: ' . $this->adminCc . $eol : '');
        $headers       .= (isset($this->adminBcc) ? 'Bcc: ' . $this->adminBcc . $eol : '');
        $headers       .= 'MIME-Version: 1.0' . $eol;
        $headers       .= 'Content-type: text/html; charset=utf-8' . $eol;

        mail($this->adminEmail, $emailData['subject'], $emailTemplate, $headers);
    }
}