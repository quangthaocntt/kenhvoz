<?php
get_header(); ?>

        <div class="row nav-socical">
            
            <div class="socical">
                <div class="col-md-9">
                    <span class="slogan">KÊNH VOZ - Kênh giải trí hàng đầu Việt Nam </span>
                    <div class="social-love">
                        <div class="fb-like" data-href="https://www.facebook.com/conganvietnam" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                </div>
                <div class="col-md-3 mobile">
                    <a href="#" class="customize badge-personalise-btn selected"  onclick="jVozDesign.settingShowImage(this);">Thiết lập nhanh<span class="drop-arrow"></span></a>
                    <a class="ios-app" href="#" title="Ứng dụng KÊNH VOZ cho IOS"><img src="<?php echo get_site_url(); ?>/static/images/iphone-icon.png" /></a>
                    <a class="android-app" href="#" title="Ứng dụng KÊNH VOZ cho Android"><img  src="<?php echo get_site_url(); ?>/static/images/android-icon.png" /></a>
                </div>
            </div>
        </div>
        <div class="row content-post">
            <div class="col-md-8">
                <?php get_search_form(); ?>
            </div>
<?php get_sidebar(); ?>
        </div><!--#row -->
<?php get_footer(); ?>