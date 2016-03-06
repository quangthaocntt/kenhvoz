<?php


get_header(); ?>
<script>
    $(document).on('ready', function(){

        $("#setting-image-show-style .btn-container a").click(function(){
            $(".mobile a.customize").removeClass("selected");
            $("#setting-image-show-style").hide();
        });
        $(".mobile .android-app,.mobile .ios-app").click(function(){
             jVozDesign.modalVoz(languages.messageTitle,languages.messageAppNotSupport);
        });
        
        //handle slide image _ start
        $(".js-imageslider").show(0);
        $('.js-imageslider').imageslider({
            slideItems: '.my-slider-item',
            slideContainer: '.my-slider-list',
    //        slideDistance: 1,
    //        slideDuratin: 1,
            resizable: true,
            pause: true
        });
        //handle slide image _ end
    });
    
</script>
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
                    <a class="ios-app" href="#" title="Ứng dụng KÊNH VOZ cho IOS"><img src="<?php echo get_site_url();?>/static/images/iphone-icon.png" /></a>
                    <a class="android-app" href="#" title="Ứng dụng KÊNH VOZ cho Android"><img  src="<?php echo get_site_url();?>/static/images/android-icon.png" /></a>
                </div>
            </div>
        </div>



        <div class="my-slider js-imageslider" style="display: none">
            <ul class="my-slider-list" >
                <?php
                $args = array(
                            'posts_per_page'   => 15,
                            'offset'           => 0,//bắt đầu từ bài post thứ 0
                            'category'         => the_category_ID($echo, false),
                            'category_name'    => '',
                            'orderby'          => 'rand',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => array('gif','image','story','video'),
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'author'	   => '',
                            'post_status'      => 'publish',
                            'suppress_filters' => true
                    );
                // The Query
                query_posts( $args );
                // The Loop
                while ( have_posts() ) : the_post();
                $format = get_post_format($post->ID);
                if($format == "image"): 
                list($url, $width, $height) = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), "full");
                ?>
                <li class="my-slider-item">
                    <a href="<?php the_permalink(); ?>"  target="_blank">
                        <img src="<?php echo $url; ?>" style="width: 200px;" title="<?php  echo  the_title("", "", false);  ?>" alt="<?php  echo  the_title("", "", false);  ?>">
                        <span class="title"><?php  echo  the_title("", "", false);  ?></span>
                    </a>
                </li>
                <?php elseif ($format == "link") : ?>
                <?php 
                    list($videoType, $videoId) = split('@@@@@', $post->post_content);
                    if($videoType == "youtube"): 
                ?>
                <li class="my-slider-item">
                    <a href="<?php the_permalink(); ?>"  target="_blank">
                        <img src="http://img.youtube.com/vi/<?php echo $videoId; ?>/0.jpg" style="width: 200px;" title="<?php  echo  the_title("", "", false);  ?>" alt="<?php  echo  the_title("", "", false);  ?>">
                        <span class="title"><?php  echo  the_title("", "", false);  ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
            </ul>
        </div>

        <div class="row content-post index-page">
            <div class="col-md-8">
                <div class="badge-page page">
                    <section id="settings" ng-controller="SettingCtrl" ng-init="Setting.getInfo()" class="ng-scope">
                        <ul class="form-nav">
                            <li>
                                <a class="selected" href="/settings/account">Tài khoản</a>
                            </li>
                            <li>
                                <a href="/settings/password">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a href="/settings/profile">Thông tin cá nhân</a>
                            </li>
                        </ul>
                        
                        <form id="setting" name="setting" ng-submit="Setting.saveInfo('account')" class="ng-pristine ng-valid ng-valid-maxlength ng-valid-email">
                            <input type="hidden" name="_csrf" value="HF16451w-sBpML-P-r-IFMcy2XS7aKT7GCIY">
                            <h2>Tài khoản</h2>
                            <div class="field">
                                <label>Tên đầy đủ</label>
                                <input type="text" name="login_name" ng-model="profile.full_name" value="Quang Thảo" maxlength="50" ng-disabled="profile.actived.fullname" class="ng-pristine ng-untouched ng-valid ng-valid-maxlength">
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <input type="email" name="email" ng-model="profile.email" value="quangthaocntt@gmail.com" maxlength="200" class="ng-pristine ng-untouched ng-valid ng-valid-email ng-valid-maxlength">
                                <p class="tips">Email không hiển thị công khai.</p>
                            </div>
                            <div class="field">
                                <label>Ngày gia nhập</label>
                                <input type="text" value="17-02-2015" maxlength="200" disabled="">
                                <p class="tips">Ngày gia nhập haivl</p>
                            </div>
                            <div class="btn-container">
                                <input type="submit" value="Lưu lại">
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </section>
                    <div class="clearfix"></div>
                </div>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>