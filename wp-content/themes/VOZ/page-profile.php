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
                <div class="main-wrap">
                    <section id="list-view-2" class="haivl-list-view-element variant-right ng-scope" >
                        <div class="header-page">
                            <h2>Trang cá nhân</h2>
                            <div class="tips">
                                <p><strong>Mẹo:</strong> <span>KênhVOZ đang ở giai đoạn thử nghiệm. Rất mong nhận được ủng hộ, góp ý (<a href="http://fb.com/kenhvoz" target="_blank">fb.com/kenhvoz</a>)</span></p>
                            </div>
                        </div>
                        <div id="kenhvoz-list-content" class="haivl-collection badge-entry-collection pin-post-info ng-isolate-scope" style="clear:both">
                            <div class="blank-state comment" ng-init="Post.readyLoad=true;Post.error=true">
                                <h3>Chưa có/Đã hết nội dung</h3>
                                <div class="btn-container">
                                    <a class="btn" href="/hot" ng-click="Modal.open('upload')">Đăng bài bù vào ngay</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>