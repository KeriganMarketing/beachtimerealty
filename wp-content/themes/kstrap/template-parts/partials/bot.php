<?php

use Includes\Modules\Social\SocialSettingsPage;

/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */
?>
<div class="sticky-footer" >
    <div id="bot">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offices">
                    <h3>Offices</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="address">9902 S. Thomas Dr.<br>
                                Panama City Beach, FL 32408</p>
                            <p class="phone office" ><span class="address-label" >office:</span> 850-381-3156</p>
                            <p class="phone fax" ><span class="address-label" >fax:</span> 850-123-1234</p>
                        </div>
                        <div class="col-md-6">
                            <p class="address">1863 Annabella Dr #A<br>
                                Panama City Beach, FL 32407</p>
                            <p class="phone office" ><span class="address-label" >office:</span> 850-381-3156</p>
                            <p class="phone fax" ><span class="address-label" >fax:</span> 850-123-1234</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/properties/" class="btn btn-primary btn-outlined btn-block btn-reversed">Property Search</a>
                            <a href="/properties/map-search/" class="btn btn-primary btn-outlined btn-block btn-reversed">Map Search</a>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <p><a class="footer-nav-item" href="/our-team/">Our Team</a></p>
                            <p><a class="footer-nav-item" href="/beach-blog/">Beach Blog</a></p>
                            <div class="social">
                                <?php
                                $socialLinks = new SocialSettingsPage();
                                $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                                if (is_array($socialIcons)) {
                                    foreach ($socialIcons as $socialId => $socialLink) {
                                        echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bot-bot">
        <div class="container">
            <div class="row no-gutters justify-content-center justify-content-lg-start align-items-middle">
                <div class="col-md-3 my-auto text-center text-md-left">
                    <div class="footer-logos">
                        <span class="footer-logo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.21 32.84">
                                <path d="M.47,28.93h.61a1.3,1.3,0,0,1,.93.21.94.94,0,0,1,.3.73.84.84,0,0,1-.91.84H1l1.26,2h.5l-1-1.66a1.17,1.17,0,0,0,1-1.23,1.36,1.36,0,0,0-.55-1.1,1.66,1.66,0,0,0-1-.24H.06v4.24H.47V28.93Z"/>
                                <polygon points="4.74 30.42 4.74 28.93 6.52 28.93 6.52 28.52 4.32 28.52 4.32 32.76 6.52 32.76 6.52 32.35 4.74 32.35 4.74 30.84 6.52 30.84 6.52 30.42 4.74 30.42 4.74 30.42"/>
                                <path d="M10.36,31H8.76l.79-2.13L10.36,31ZM8.11,32.76l.51-1.33H10.5L11,32.76h.45L9.81,28.52h-.5L7.67,32.76Z"/>
                                <polygon points="14.57 32.76 14.57 32.35 13.08 32.35 13.08 28.52 12.66 28.52 12.66 32.76 14.57 32.76 14.57 32.76"/>
                                <polygon points="16.67 32.76 16.67 28.93 17.52 28.93 17.52 28.52 15.4 28.52 15.4 28.93 16.25 28.93 16.25 32.76 16.67 32.76 16.67 32.76"/>
                                <path d="M18.4,30.61a2.16,2.16,0,0,0,2.15,2.23,2.12,2.12,0,0,0,1.62-.72,2.16,2.16,0,0,0,.56-1.52,2.13,2.13,0,0,0-.65-1.56,2.09,2.09,0,0,0-1.52-.62,2.07,2.07,0,0,0-1.5.61,2.17,2.17,0,0,0-.66,1.56Zm.43,0a1.87,1.87,0,0,1,.65-1.38,1.64,1.64,0,0,1,1.07-.39,1.8,1.8,0,1,1-1.72,1.78Z"/>
                                <path d="M24.56,28.93h.61a1.3,1.3,0,0,1,.93.21.94.94,0,0,1,.3.73.84.84,0,0,1-.91.84h-.4l1.26,2h.49l-1-1.66a1.17,1.17,0,0,0,1-1.23,1.36,1.36,0,0,0-.55-1.1,1.66,1.66,0,0,0-1-.24H24.14v4.24h.41V28.93Z"/>
                                <path d="M0,0V27H27V0ZM14.35,3.24h3a5.1,5.1,0,0,1,0,10.18h-3ZM11.44,23.6H3.82V3.21h7.61Zm2.92,0V13.49L24.91,23.63Z"/>
                                <path d="M27.45,27.73a.74.74,0,0,0-.54.22.78.78,0,0,0-.23.55.76.76,0,0,0,.23.54.75.75,0,0,0,.54.23A.78.78,0,0,0,28,29a.74.74,0,0,0,.22-.54.76.76,0,0,0-.77-.77Zm.68.77a.65.65,0,0,1-.19.48.7.7,0,0,1-.49.2.69.69,0,0,1-.68-.68A.69.69,0,0,1,27,28a.66.66,0,0,1,.48-.2.68.68,0,0,1,.68.69ZM27.47,28h-.32v.88h.13v-.39h.21l.19.39h.15l-.2-.41a.23.23,0,0,0,.21-.23c0-.17-.12-.24-.37-.24Zm0,.09c.17,0,.25,0,.25.16s-.08.15-.25.15h-.16v-.32Z"/>
                            </svg>
                        </span>
                        <span class="footer-logo" style="width: 58px;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.76 192.76">
                                <polygon points="26.47 148.55 19.37 148.55 19.37 151.36 25.89 151.36 25.89 153.74 19.37 153.74 19.37 157.19 26.79 157.19 26.79 159.56 16.64 159.56 16.64 146.19 26.47 146.19 26.47 148.55 26.47 148.55"/>
                                <path d="M35.45,155.93l1.34,1.26a3.25,3.25,0,0,1-1.51.36c-1.51,0-3.64-.93-3.64-4.67s2.13-4.67,3.64-4.67,3.63.93,3.63,4.67a6,6,0,0,1-.61,2.87l-1.42-1.32-1.44,1.5ZM41.77,159l-1.46-1.37a7.5,7.5,0,0,0,1.4-4.77c0-6.28-4.66-7-6.43-7s-6.43.76-6.43,7,4.66,7,6.43,7a6.9,6.9,0,0,0,3.43-.9l1.59,1.51L41.77,159Z"/>
                                <path d="M54.86,154.89c0,3.51-2.13,5-5.5,5a5.72,5.72,0,0,1-4.25-1.62,4.87,4.87,0,0,1-1-3.24v-8.87h2.85v8.68c0,1.87,1.08,2.68,2.38,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.86v8.7Z"/>
                                <path d="M62.35,149.21h0L64,154.5H60.63l1.72-5.29Zm-2.46,7.59h4.94l.86,2.76h3L64,146.19H60.78L56,159.57H59l.93-2.76Z"/>
                                <polygon points="73.69 157.14 80.34 157.14 80.34 159.56 70.89 159.56 70.89 146.19 73.69 146.19 73.69 157.14 73.69 157.14"/>
                                <polygon points="90.94 153.56 90.94 159.56 88.15 159.56 88.15 146.19 90.94 146.19 90.94 151.25 96.16 151.25 96.16 146.19 98.95 146.19 98.95 159.56 96.16 159.56 96.16 153.56 90.94 153.56 90.94 153.56"/>
                                <path d="M104.27,152.87c0-3.74,2.13-4.67,3.63-4.67s3.64.93,3.64,4.67-2.13,4.67-3.64,4.67-3.63-.93-3.63-4.67Zm-2.79,0c0,6.28,4.66,7,6.42,7s6.43-.76,6.43-7-4.66-7-6.43-7-6.42.76-6.42,7Z"/>
                                <path d="M127.68,154.89c0,3.51-2.13,5-5.5,5a5.73,5.73,0,0,1-4.25-1.62,4.86,4.86,0,0,1-1-3.24v-8.87h2.85v8.68c0,1.87,1.08,2.68,2.39,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.85v8.7Z"/>
                                <path d="M132.79,155.45c0,.74.4,2.16,2.84,2.16,1.32,0,2.8-.32,2.8-1.74,0-1-1-1.32-2.42-1.65l-1.44-.34c-2.17-.5-4.25-1-4.25-3.92,0-1.49.81-4.12,5.14-4.12,4.1,0,5.2,2.68,5.22,4.32H138c-.07-.59-.3-2-2.74-2-1.06,0-2.33.39-2.33,1.6,0,1,.86,1.26,1.41,1.39l3.26.8c1.83.45,3.5,1.2,3.5,3.6,0,4-4.1,4.38-5.27,4.38-4.88,0-5.72-2.81-5.72-4.47Z"/>
                                <polygon points="146.19 159.56 143.4 159.56 143.4 146.19 146.19 146.19 146.19 159.56 146.19 159.56"/>
                                <polygon points="157.35 146.19 159.96 146.19 159.96 159.56 157.16 159.56 151.71 150.02 151.66 150.02 151.66 159.56 149.06 159.56 149.06 146.19 152 146.19 157.3 155.5 157.35 155.5 157.35 146.19 157.35 146.19"/>
                                <path d="M169.31,152.36h5.58v7.21H173l-.28-1.67a4.94,4.94,0,0,1-4.17,2c-3.22,0-6.14-2.31-6.14-7,0-3.65,2-7.1,6.53-7.08,4.11,0,5.73,2.66,5.87,4.51H172a2.94,2.94,0,0,0-2.92-2.2c-2,0-3.84,1.38-3.84,4.8,0,3.65,2,4.6,3.89,4.6a3.3,3.3,0,0,0,3.24-2.94h-3.11v-2.25Z"/>
                                <path d="M18.84,173.2c0-3.74,2.12-4.68,3.63-4.68s3.63.93,3.63,4.68-2.12,4.68-3.63,4.68-3.63-.94-3.63-4.68Zm-2.79,0c0,6.28,4.66,7,6.43,7s6.43-.77,6.43-7-4.66-7-6.43-7-6.43.76-6.43,7Z"/>
                                <path d="M36.55,172.75v-3.93h2.22c1.73,0,2.46.55,2.46,1.85,0,.6,0,2.08-2.09,2.08Zm0,2.31h3.2A4.1,4.1,0,0,0,44,170.79c0-2.62-1.56-4.28-4.15-4.28H33.76v13.38h2.79v-4.83Z"/>
                                <path d="M51.6,172.75v-3.93h2.21c1.73,0,2.46.55,2.46,1.85,0,.6,0,2.08-2.08,2.08Zm0,2.31h3.2a4.1,4.1,0,0,0,4.27-4.27c0-2.62-1.56-4.28-4.15-4.28H48.8v13.38h2.8v-4.83Z"/>
                                <path d="M66.06,173.2c0-3.74,2.12-4.68,3.63-4.68s3.63.93,3.63,4.68-2.13,4.68-3.63,4.68-3.63-.94-3.63-4.68Zm-2.79,0c0,6.28,4.65,7,6.43,7s6.42-.77,6.42-7-4.66-7-6.42-7-6.43.76-6.43,7Z"/>
                                <path d="M83.72,172.4v-3.58H87.2c1.64,0,2,1,2,1.76,0,1.32-.7,1.83-2.16,1.83ZM81,179.89h2.75v-5.24H86.6c2.07,0,2.18.71,2.18,2.53a9,9,0,0,0,.29,2.7h3.09v-.36c-.6-.22-.6-.71-.6-2.66,0-2.5-.6-2.91-1.69-3.4a3.19,3.19,0,0,0,2.06-3.18c0-1.16-.65-3.78-4.21-3.78H81v13.38Z"/>
                                <polygon points="102.36 179.89 99.56 179.89 99.56 168.88 95.52 168.88 95.52 166.51 106.4 166.51 106.4 168.88 102.36 168.88 102.36 179.89 102.36 179.89"/>
                                <path d="M121.39,175.21c0,3.52-2.12,5-5.5,5a5.75,5.75,0,0,1-4.24-1.63,4.83,4.83,0,0,1-1-3.24v-8.87h2.85v8.68c0,1.86,1.08,2.69,2.39,2.69,1.92,0,2.7-.94,2.7-2.56v-8.81h2.85v8.7Z"/>
                                <polygon points="134.92 166.51 137.53 166.51 137.53 179.89 134.73 179.89 129.27 170.35 129.24 170.35 129.24 179.89 126.63 179.89 126.63 166.51 129.57 166.51 134.88 175.82 134.92 175.82 134.92 166.51 134.92 166.51"/>
                                <polygon points="145.41 179.89 142.61 179.89 142.61 166.51 145.41 166.51 145.41 179.89 145.41 179.89"/>
                                <polygon points="156.32 179.89 153.53 179.89 153.53 168.88 149.49 168.88 149.49 166.51 160.37 166.51 160.37 168.88 156.32 168.88 156.32 179.89 156.32 179.89"/>
                                <polygon points="170.93 179.89 168.13 179.89 168.13 174.84 163.51 166.51 166.81 166.51 169.58 172.32 172.24 166.51 175.4 166.51 170.93 174.87 170.93 179.89 170.93 179.89"/>
                                <path d="M95.71,6.84,5.64,51.2V72H15.72v62.5H175V72h12.1V51.2L95.71,6.84Zm59.82,108.87H35.22V58.59L95.71,27.68l59.82,30.91v57.12Z"/>
                                <polygon points="123.26 78.75 67.48 78.75 67.48 58.59 123.26 58.59 123.26 78.75 123.26 78.75"/>
                                <polygon points="123.26 107.66 67.48 107.66 67.48 87.49 123.26 87.49 123.26 107.66 123.26 107.66"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 my-auto mx-auto justify-content-center text-center">
                    <p class="copyright">&copy;<?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>. All Rights Reserved.</p>
                </div>
                <div class="col-md-3 my-auto justify-content-center justify-content-sm-end text-center text-sm-right">
                    <p class="siteby"><svg version="1.1" id="kma" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="14" width="20" viewBox="0 0 12.5 8.7" style="enable-background:new 0 0 12.5 8.7;" xml:space="preserve">
                                <defs><style>.kma{fill:#b4be35;}</style></defs>
                            <path class="kma" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1
                                c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"/>
                            </svg> <a href="https://keriganmarketing.com">Site by KMA</a>.</p>
                </div>
            </div>
        </div><!-- .container -->
    </div>
</div>
</div>
