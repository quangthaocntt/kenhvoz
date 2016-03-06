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
                    <section id="list-view-2" class="haivl-list-view-element variant-right">
                        <div class="header-page">
                            <h2>Top Danh Hài</h2>
                            <div class="hai-top-control">
                                <a class="item-control" kenhvoz-href="/top-user/all">Tất cả</a> /<a class="item-control" kenhvoz-href="/top-user/week">Trong tuần</a> /<a class="item-control" kenhvoz-href="/top-user/month">Trong tháng</a>
                            </div>
                            <div class="tips">
                                <p><strong>Mẹo:</strong> <span>Đăng nhập KênhVOZ bằng facebook để được tặng ĐIỂM</span></p>
                            </div>
                        </div>
                        <div id="kenhvoz-list-content" style="clear:both;">
                            <div class="danh-hai-content">
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/8587" title="Thảo Trang" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_8ddcee35-3d75-4995-8e59-f5e5a8b8d18a.jpg" src="//s3.haivn.com/s_8ddcee35-3d75-4995-8e59-f5e5a8b8d18a.jpg">
                                        <div class="info">
                                            <span class="full-name">Thảo Trang</span>
                                            <span class="point-count">23832</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126774" title="HaiKeo" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_e694a9ed-77eb-46bd-9db3-06c0571cc84c.jpg" src="//s3.haivn.com/s_e694a9ed-77eb-46bd-9db3-06c0571cc84c.jpg">
                                        <div class="info">
                                            <span class="full-name">HaiKeo</span>
                                            <span class="point-count">13349</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/101392" title="Park Ji Sung" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_fe6d3936-91fe-42f5-ad8c-478c35291e6e.jpg" src="//s3.haivn.com/s_fe6d3936-91fe-42f5-ad8c-478c35291e6e.jpg">
                                        <div class="info">
                                            <span class="full-name">Park Ji Sung</span>
                                            <span class="point-count">12170</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/69642" title="Huong Min" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_296df8fb-7d7e-4795-b4c2-d627bb4cfcdd.jpg" src="//s3.haivn.com/s_296df8fb-7d7e-4795-b4c2-d627bb4cfcdd.jpg">
                                        <div class="info">
                                            <span class="full-name">Huong Min</span>
                                            <span class="point-count">11582</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/129092" title="Super Troll => Lier" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ab11302f-8042-4245-aff3-7e2b0080bc93.jpg" src="//s3.haivn.com/s_ab11302f-8042-4245-aff3-7e2b0080bc93.jpg">
                                        <div class="info">
                                            <span class="full-name">Super Troll =&gt; Lier</span>
                                            <span class="point-count">9912</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/33640" title="ÆĎÍßùÔì√åΘ£öň" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_082d7549-e70b-4a8e-833f-d9918c65d9ff.png" src="//s3.haivn.com/s_082d7549-e70b-4a8e-833f-d9918c65d9ff.png">
                                        <div class="info">
                                            <span class="full-name">ÆĎÍßùÔì√åΘ£öň</span>
                                            <span class="point-count">9459</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/110597" title="Sơn Thái Nguyễn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_5d131e1a-9b84-440a-a497-e6fd95b6f3f5.jpg" src="//s3.haivn.com/s_5d131e1a-9b84-440a-a497-e6fd95b6f3f5.jpg">
                                        <div class="info">
                                            <span class="full-name">Sơn Thái Nguyễn</span>
                                            <span class="point-count">9371</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/94641" title="củ lạc tròn vo" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_2878c41b-376c-4f22-847e-7453f91dcf02.jpg" src="//s3.haivn.com/s_2878c41b-376c-4f22-847e-7453f91dcf02.jpg">
                                        <div class="info">
                                            <span class="full-name">củ lạc tròn vo</span>
                                            <span class="point-count">7774</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/75724" title="Cô Cô" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_5e764033-0c76-4a17-a16b-7a618bf30a88.jpg" src="//s3.haivn.com/s_5e764033-0c76-4a17-a16b-7a618bf30a88.jpg">
                                        <div class="info">
                                            <span class="full-name">Cô Cô</span>
                                            <span class="point-count">7724</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/124844" title="Bảo Ngọc" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_294213b9-ba14-4c7d-ae9d-cf8ca54f45c7.jpg" src="//s3.haivn.com/s_294213b9-ba14-4c7d-ae9d-cf8ca54f45c7.jpg">
                                        <div class="info">
                                            <span class="full-name">Bảo Ngọc</span>
                                            <span class="point-count">7584</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/178866" title="Bich Phuong Nguyen Thi" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_520cf9c5-3b55-430c-b8a7-f86f6f433026.jpg" src="//s3.haivn.com/s_520cf9c5-3b55-430c-b8a7-f86f6f433026.jpg">
                                        <div class="info">
                                            <span class="full-name">Bich Phuong Nguyen Thi</span>
                                            <span class="point-count">7425</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/114741" title="Duli" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_2a9609a3-8102-4349-a2bd-fb5c6221f09b.jpg" src="//s3.haivn.com/s_2a9609a3-8102-4349-a2bd-fb5c6221f09b.jpg">
                                        <div class="info">
                                            <span class="full-name">Duli</span>
                                            <span class="point-count">7085</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/127058" title="Linh Vương" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_9f5c750c-4319-4e18-a9e6-53d5ec10762a.jpg" src="//s3.haivn.com/s_9f5c750c-4319-4e18-a9e6-53d5ec10762a.jpg">
                                        <div class="info">
                                            <span class="full-name">Linh Vương</span>
                                            <span class="point-count">6957</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/147921" title="Nguyễn Ngọc Ánh" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_1e64a6db-e6cc-4c3e-9265-68bdb0758ffd.jpg" src="//s3.haivn.com/s_1e64a6db-e6cc-4c3e-9265-68bdb0758ffd.jpg">
                                        <div class="info">
                                            <span class="full-name">Nguyễn Ngọc Ánh</span>
                                            <span class="point-count">6658</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/158111" title="The Ocean" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_0beccd87-2f9b-4938-bb05-d2a3cb68c6c0.jpg" src="//s3.haivn.com/s_0beccd87-2f9b-4938-bb05-d2a3cb68c6c0.jpg">
                                        <div class="info">
                                            <span class="full-name">The Ocean</span>
                                            <span class="point-count">6455</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/114991" title="Vũ Đức Hiếu" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_fed6b2e3-4351-4345-a477-b6edb8b4d3df.jpg" src="//s3.haivn.com/s_fed6b2e3-4351-4345-a477-b6edb8b4d3df.jpg">
                                        <div class="info">
                                            <span class="full-name">Vũ Đức Hiếu</span>
                                            <span class="point-count">6411</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/102877" title="ÑhØc CØñ" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_7434841a-40b1-4251-b27d-9e3e7aa67d5a.jpg" src="//s3.haivn.com/s_7434841a-40b1-4251-b27d-9e3e7aa67d5a.jpg">
                                        <div class="info">
                                            <span class="full-name">ÑhØc CØñ</span>
                                            <span class="point-count">6310</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/117909" title="NamH" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_24f454a1-9ce5-4687-af75-a55c3d1bf5b3.jpg" src="//s3.haivn.com/s_24f454a1-9ce5-4687-af75-a55c3d1bf5b3.jpg">
                                        <div class="info">
                                            <span class="full-name">NamH</span>
                                            <span class="point-count">6145</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/127293" title="Huyền Trâm" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ed665a0b-0837-45fc-8262-ae309a29381c.jpg" src="//s3.haivn.com/s_ed665a0b-0837-45fc-8262-ae309a29381c.jpg">
                                        <div class="info">
                                            <span class="full-name">Huyền Trâm</span>
                                            <span class="point-count">6109</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/169047" title="Po Po" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_54a275fe-8855-4f0b-a52d-ee1393c74ab9.jpg" src="//s3.haivn.com/s_54a275fe-8855-4f0b-a52d-ee1393c74ab9.jpg">
                                        <div class="info">
                                            <span class="full-name">Po Po</span>
                                            <span class="point-count">5745</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/125355" title="Ngô Đình Luật" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_de91edf1-d18d-4160-aca2-8c83f4515f9a.jpg" src="//s3.haivn.com/s_de91edf1-d18d-4160-aca2-8c83f4515f9a.jpg">
                                        <div class="info">
                                            <span class="full-name">Ngô Đình Luật</span>
                                            <span class="point-count">5649</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/7760" title="vừa có kinh" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_422de0cd-de01-4ef0-b1b4-c5fc0f192f64.jpg" src="//s3.haivn.com/s_422de0cd-de01-4ef0-b1b4-c5fc0f192f64.jpg">
                                        <div class="info">
                                            <span class="full-name">vừa có kinh</span>
                                            <span class="point-count">5623</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/6073" title="Âu Dương Phong" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_4398e68d-aa7d-4f11-8f4a-6ef5c30ac5c6.jpg" src="//s3.haivn.com/s_4398e68d-aa7d-4f11-8f4a-6ef5c30ac5c6.jpg">
                                        <div class="info">
                                            <span class="full-name">Âu Dương Phong</span>
                                            <span class="point-count">5147</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/138414" title="Hoàng Thiên Triều" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_13a9c15f-a057-474c-9995-26650a61430c.jpg" src="//s3.haivn.com/s_13a9c15f-a057-474c-9995-26650a61430c.jpg">
                                        <div class="info">
                                            <span class="full-name">Hoàng Thiên Triều</span>
                                            <span class="point-count">5121</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/160365" title="Fjck Party" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_28409ada-1b1d-44b6-8dc5-d9a6ef6903fe.jpg" src="//s3.haivn.com/s_28409ada-1b1d-44b6-8dc5-d9a6ef6903fe.jpg">
                                        <div class="info">
                                            <span class="full-name">Fjck Party</span>
                                            <span class="point-count">5106</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126710" title="Nguyen Tuan Phat" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_767df0a0-eaf2-4a1e-b3a4-b95dd15c2bd9.jpg" src="//s3.haivn.com/s_767df0a0-eaf2-4a1e-b3a4-b95dd15c2bd9.jpg">
                                        <div class="info">
                                            <span class="full-name">Nguyen Tuan Phat</span>
                                            <span class="point-count">4942</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/111941" title="Nhi Bi" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ec89fc3c-4e73-41b5-905d-0ecaf915bdbd.jpg" src="//s3.haivn.com/s_ec89fc3c-4e73-41b5-905d-0ecaf915bdbd.jpg">
                                        <div class="info">
                                            <span class="full-name">Nhi Bi</span>
                                            <span class="point-count">4887</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/51274" title="Mr.Soul" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_10cf59fa-0046-4178-b2a2-09a2a8196b6f.jpg" src="//s3.haivn.com/s_10cf59fa-0046-4178-b2a2-09a2a8196b6f.jpg">
                                        <div class="info">
                                            <span class="full-name">Mr.Soul</span>
                                            <span class="point-count">4513</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126694" title="Henho9x" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ad80f226-6a81-4770-9680-051891ba820b.jpg" src="//s3.haivn.com/s_ad80f226-6a81-4770-9680-051891ba820b.jpg">
                                        <div class="info">
                                            <span class="full-name">Henho9x</span>
                                            <span class="point-count">4373</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/178889" title="Hùng Cr7" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b8297448-9821-4e07-be7c-5293a31b17dd.png" src="//s3.haivn.com/s_b8297448-9821-4e07-be7c-5293a31b17dd.png">
                                        <div class="info">
                                            <span class="full-name">Hùng Cr7</span>
                                            <span class="point-count">4369</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/4209" title="Duc Hai" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b67172b0-0d70-41c8-984e-669785926204.jpg" src="//s3.haivn.com/s_b67172b0-0d70-41c8-984e-669785926204.jpg">
                                        <div class="info">
                                            <span class="full-name">Duc Hai</span>
                                            <span class="point-count">4353</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/179020" title="khanhvypham92" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_haiivl.png" src="//s3.haivn.com/s_haiivl.png">
                                        <div class="info">
                                            <span class="full-name">khanhvypham92</span>
                                            <span class="point-count">4307</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/169034" title="Hoàng Đen" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f536aedd-d368-4056-b6ae-5ac3a772b78c.jpg" src="//s3.haivn.com/s_f536aedd-d368-4056-b6ae-5ac3a772b78c.jpg">
                                        <div class="info">
                                            <span class="full-name">Hoàng Đen</span>
                                            <span class="point-count">4271</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/112471" title="Jinn Chono" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_1113da3a-b751-4f54-825a-8bf07d1733d7.jpg" src="//s3.haivn.com/s_1113da3a-b751-4f54-825a-8bf07d1733d7.jpg">
                                        <div class="info">
                                            <span class="full-name">Jinn Chono</span>
                                            <span class="point-count">4250</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126708" title="Nguyen Cong" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_eb741ed7-7541-4904-9803-58529771dd65.jpg" src="//s3.haivn.com/s_eb741ed7-7541-4904-9803-58529771dd65.jpg">
                                        <div class="info">
                                            <span class="full-name">Nguyen Cong</span>
                                            <span class="point-count">4231</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/178888" title="Hùng Phạm" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_haiivl.png" src="//s3.haivn.com/s_haiivl.png">
                                        <div class="info">
                                            <span class="full-name">Hùng Phạm</span>
                                            <span class="point-count">4173</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/178885" title="Phương Bếu" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_haiivl.png" src="//s3.haivn.com/s_haiivl.png">
                                        <div class="info">
                                            <span class="full-name">Phương Bếu</span>
                                            <span class="point-count">4142</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/178886" title="Thế Hùng" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_haiivl.png" src="//s3.haivn.com/s_haiivl.png">
                                        <div class="info">
                                            <span class="full-name">Thế Hùng</span>
                                            <span class="point-count">4137</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/34263" title="Mùn Meo" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ac3a7d04-6775-4e1c-824d-e592b3603469.jpg" src="//s3.haivn.com/s_ac3a7d04-6775-4e1c-824d-e592b3603469.jpg">
                                        <div class="info">
                                            <span class="full-name">Mùn Meo</span>
                                            <span class="point-count">4121</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/42260" title="Bất Tử" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_76622027-5533-41bd-aa39-67f121b7b341.jpg" src="//s3.haivn.com/s_76622027-5533-41bd-aa39-67f121b7b341.jpg">
                                        <div class="info">
                                            <span class="full-name">Bất Tử</span>
                                            <span class="point-count">3973</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/118966" title="Hằng Mốn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_443566ec-5bfa-44c0-8dac-a0a87d2c739e.jpg" src="//s3.haivn.com/s_443566ec-5bfa-44c0-8dac-a0a87d2c739e.jpg">
                                        <div class="info">
                                            <span class="full-name">Hằng Mốn</span>
                                            <span class="point-count">3868</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/139158" title="Tử Sa" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_946bbc48-f5ad-4b8b-8fd8-458751f394e1.jpg" src="//s3.haivn.com/s_946bbc48-f5ad-4b8b-8fd8-458751f394e1.jpg">
                                        <div class="info">
                                            <span class="full-name">Tử Sa</span>
                                            <span class="point-count">3694</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/115186" title="Kênh xa lộ" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_20f31319-f658-4ec6-b1ba-eb02e91040b5.jpg" src="//s3.haivn.com/s_20f31319-f658-4ec6-b1ba-eb02e91040b5.jpg">
                                        <div class="info">
                                            <span class="full-name">Kênh xa lộ</span>
                                            <span class="point-count">3614</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/38582" title="Rayal Hsu" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_2641f7ff-be25-4cbb-9530-ceca647e53e6.jpg" src="//s3.haivn.com/s_2641f7ff-be25-4cbb-9530-ceca647e53e6.jpg">
                                        <div class="info">
                                            <span class="full-name">Rayal Hsu</span>
                                            <span class="point-count">3610</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/115501" title="Gia Hân" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_8976fc5e-0430-490b-bb7b-0dea818f5bd8.jpg" src="//s3.haivn.com/s_8976fc5e-0430-490b-bb7b-0dea818f5bd8.jpg">
                                        <div class="info">
                                            <span class="full-name">Gia Hân</span>
                                            <span class="point-count">3604</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/154064" title="Xuli'ss Vÿ Mï's" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_6e161c26-5f32-4510-95ee-2de3abebbbd7.jpg" src="//s3.haivn.com/s_6e161c26-5f32-4510-95ee-2de3abebbbd7.jpg">
                                        <div class="info">
                                            <span class="full-name">Xuli'ss Vÿ Mï's</span>
                                            <span class="point-count">3461</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/104598" title="Tùng Bơ" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_116ff99e-e660-4b71-abde-335b799ec5d8.jpg" src="//s3.haivn.com/s_116ff99e-e660-4b71-abde-335b799ec5d8.jpg">
                                        <div class="info">
                                            <span class="full-name">Tùng Bơ</span>
                                            <span class="point-count">3410</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/105962" title="Min Hâm" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_e59e274b-95dc-4bec-99d5-530fb4220b76.jpg" src="//s3.haivn.com/s_e59e274b-95dc-4bec-99d5-530fb4220b76.jpg">
                                        <div class="info">
                                            <span class="full-name">Min Hâm</span>
                                            <span class="point-count">3372</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/49972" title="Joker" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_911c304d-6031-4421-bc68-73a110c2a47d.png" src="//s3.haivn.com/s_911c304d-6031-4421-bc68-73a110c2a47d.png">
                                        <div class="info">
                                            <span class="full-name">Joker</span>
                                            <span class="point-count">3341</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/125509" title="Hân Đồng Văn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_163d4892-e805-4b8c-822f-23b4d200d069.JPG" src="//s3.haivn.com/s_163d4892-e805-4b8c-822f-23b4d200d069.JPG">
                                        <div class="info">
                                            <span class="full-name">Hân Đồng Văn</span>
                                            <span class="point-count">3321</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/88056" title="Mai Quoc Cuong" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ccabfeee-5964-40b0-a501-76ce665864ce.png" src="//s3.haivn.com/s_ccabfeee-5964-40b0-a501-76ce665864ce.png">
                                        <div class="info">
                                            <span class="full-name">Mai Quoc Cuong</span>
                                            <span class="point-count">3262</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/94575" title="Gia Yen" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b91b94a1-145a-4afa-ba36-ea58214a7be8.jpg" src="//s3.haivn.com/s_b91b94a1-145a-4afa-ba36-ea58214a7be8.jpg">
                                        <div class="info">
                                            <span class="full-name">Gia Yen</span>
                                            <span class="point-count">3249</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/132596" title="Duy Thái" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_8f509c7a-6754-44bc-a85a-9878014dcd8a.jpg" src="//s3.haivn.com/s_8f509c7a-6754-44bc-a85a-9878014dcd8a.jpg">
                                        <div class="info">
                                            <span class="full-name">Duy Thái</span>
                                            <span class="point-count">3151</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/137026" title="Oẳn tù tì" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b55b5f91-30bd-4fbc-83fe-2037ee97a4be.jpg" src="//s3.haivn.com/s_b55b5f91-30bd-4fbc-83fe-2037ee97a4be.jpg">
                                        <div class="info">
                                            <span class="full-name">Oẳn tù tì</span>
                                            <span class="point-count">3118</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/32407" title="๖ۣۜPhước ๖ۣۜLê ๖ۣۜMinh" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_ad492c73-9987-491d-b6e1-417dfd11b211.jpg" src="//s3.haivn.com/s_ad492c73-9987-491d-b6e1-417dfd11b211.jpg">
                                        <div class="info">
                                            <span class="full-name">๖ۣۜPhước ๖ۣۜLê ๖ۣۜMinh</span>
                                            <span class="point-count">3108</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/102541" title="Đạt Nguyễn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_3fae1773-6bbd-4166-b96d-e42e21edbc3f.jpg" src="//s3.haivn.com/s_3fae1773-6bbd-4166-b96d-e42e21edbc3f.jpg">
                                        <div class="info">
                                            <span class="full-name">Đạt Nguyễn</span>
                                            <span class="point-count">3096</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/123900" title="69&amp;96" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f5e77be6-64b3-4345-9199-693fb59ab9af.jpg" src="//s3.haivn.com/s_f5e77be6-64b3-4345-9199-693fb59ab9af.jpg">
                                        <div class="info">
                                            <span class="full-name">69&amp;96</span>
                                            <span class="point-count">3041</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/72042" title="Nguyễn Ngọc Đính" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_4fa259a5-070a-4bb9-94fa-a72ebc0d4e29.jpg" src="//s3.haivn.com/s_4fa259a5-070a-4bb9-94fa-a72ebc0d4e29.jpg">
                                        <div class="info">
                                            <span class="full-name">Nguyễn Ngọc Đính</span>
                                            <span class="point-count">3021</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/27668" title="Pĥướç Høàñq" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_2751b159-58e5-4ad3-9159-bbdeb84c0b33.jpg" src="//s3.haivn.com/s_2751b159-58e5-4ad3-9159-bbdeb84c0b33.jpg">
                                        <div class="info">
                                            <span class="full-name">Pĥướç Høàñq</span>
                                            <span class="point-count">2978</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/120161" title="Tiểu Nhân" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_50241bcf-8378-418c-b7cb-63f0bf9e7e19.jpg" src="//s3.haivn.com/s_50241bcf-8378-418c-b7cb-63f0bf9e7e19.jpg">
                                        <div class="info">
                                            <span class="full-name">Tiểu Nhân</span>
                                            <span class="point-count">2928</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/50033" title="Peter nguyen" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_cc179b70-49fd-4621-af25-d41eb2db1f63.png" src="//s3.haivn.com/s_cc179b70-49fd-4621-af25-d41eb2db1f63.png">
                                        <div class="info">
                                            <span class="full-name">Peter nguyen</span>
                                            <span class="point-count">2914</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/52330" title="Huỳnh Minh Đương" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_8786bf5c-9fd2-4e73-8435-63970925e9fd.jpg" src="//s3.haivn.com/s_8786bf5c-9fd2-4e73-8435-63970925e9fd.jpg">
                                        <div class="info">
                                            <span class="full-name">Huỳnh Minh Đương</span>
                                            <span class="point-count">2907</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/127555" title="Góc Tối" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_722f3d41-0db1-4da3-ab43-54325872e01b.jpg" src="//s3.haivn.com/s_722f3d41-0db1-4da3-ab43-54325872e01b.jpg">
                                        <div class="info">
                                            <span class="full-name">Góc Tối</span>
                                            <span class="point-count">2879</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/177004" title="Hài Trung Quốc" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_5c9a8050-d64d-4013-a790-aea146859861.jpg" src="//s3.haivn.com/s_5c9a8050-d64d-4013-a790-aea146859861.jpg">
                                        <div class="info">
                                            <span class="full-name">Hài Trung Quốc</span>
                                            <span class="point-count">2866</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/1613" title="Lê Tự Thiên Ý" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_517a1414-7943-4674-bdd8-8d4bf4fb85f6.jpg" src="//s3.haivn.com/s_517a1414-7943-4674-bdd8-8d4bf4fb85f6.jpg">
                                        <div class="info">
                                            <span class="full-name">Lê Tự Thiên Ý</span>
                                            <span class="point-count">2851</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/181941" title="BaoBei" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b247bdd3-f83a-4dd2-8567-5138e21f5114.jpg" src="//s3.haivn.com/s_b247bdd3-f83a-4dd2-8567-5138e21f5114.jpg">
                                        <div class="info">
                                            <span class="full-name">BaoBei</span>
                                            <span class="point-count">2830</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/129223" title="Sơn Nguyễn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f12cae69-eba7-4c03-9e5f-dec2595e22a8.jpg" src="//s3.haivn.com/s_f12cae69-eba7-4c03-9e5f-dec2595e22a8.jpg">
                                        <div class="info">
                                            <span class="full-name">Sơn Nguyễn</span>
                                            <span class="point-count">2804</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126711" title="Minh Trần Bình" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_36758280-dafa-455f-bf3e-55227a70a502.jpg" src="//s3.haivn.com/s_36758280-dafa-455f-bf3e-55227a70a502.jpg">
                                        <div class="info">
                                            <span class="full-name">Minh Trần Bình</span>
                                            <span class="point-count">2751</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/161213" title="Nguyễn Văn Trường" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_6d5ce094-c111-49f8-b233-05fcbc884f45.jpg" src="//s3.haivn.com/s_6d5ce094-c111-49f8-b233-05fcbc884f45.jpg">
                                        <div class="info">
                                            <span class="full-name">Nguyễn Văn Trường</span>
                                            <span class="point-count">2745</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/8244" title="hentai" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_6879c658-024d-42e1-8c73-ae8b59109d0a.jpg" src="//s3.haivn.com/s_6879c658-024d-42e1-8c73-ae8b59109d0a.jpg">
                                        <div class="info">
                                            <span class="full-name">hentai</span>
                                            <span class="point-count">2679</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/32580" title="Cao Tri" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b4ec3a79-19f9-4c6d-b4a4-c9e1a3896d78.jpg" src="//s3.haivn.com/s_b4ec3a79-19f9-4c6d-b4a4-c9e1a3896d78.jpg">
                                        <div class="info">
                                            <span class="full-name">Cao Tri</span>
                                            <span class="point-count">2676</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/152280" title="Tony Tèo" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_fa1b0114-11c0-4d23-b3d4-50e395d2574f.jpg" src="//s3.haivn.com/s_fa1b0114-11c0-4d23-b3d4-50e395d2574f.jpg">
                                        <div class="info">
                                            <span class="full-name">Tony Tèo</span>
                                            <span class="point-count">2672</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/123051" title="VnLive" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_0e5ad959-0e01-42b4-b22e-1fb1312d44d8.png" src="//s3.haivn.com/s_0e5ad959-0e01-42b4-b22e-1fb1312d44d8.png">
                                        <div class="info">
                                            <span class="full-name">VnLive</span>
                                            <span class="point-count">2669</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/63323" title="ßoysâurăng" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_3393bf06-df25-4568-8de4-bb0fa382234b.jpg" src="//s3.haivn.com/s_3393bf06-df25-4568-8de4-bb0fa382234b.jpg">
                                        <div class="info">
                                            <span class="full-name">ßoysâurăng</span>
                                            <span class="point-count">2624</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/121409" title="Trần Thị Diệu Ngọc" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_7dc7fe73-fedf-4977-8560-434382a6ad95.jpg" src="//s3.haivn.com/s_7dc7fe73-fedf-4977-8560-434382a6ad95.jpg">
                                        <div class="info">
                                            <span class="full-name">Trần Thị Diệu Ngọc</span>
                                            <span class="point-count">2582</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/67081" title="NXT" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_437f1d85-1064-4f72-97ec-d5b56a448e57.jpg" src="//s3.haivn.com/s_437f1d85-1064-4f72-97ec-d5b56a448e57.jpg">
                                        <div class="info">
                                            <span class="full-name">NXT</span>
                                            <span class="point-count">2560</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/99126" title="Vô Diện" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_6038cf40-a79d-4fd7-a246-e3e558f08a2b.jpg" src="//s3.haivn.com/s_6038cf40-a79d-4fd7-a246-e3e558f08a2b.jpg">
                                        <div class="info">
                                            <span class="full-name">Vô Diện</span>
                                            <span class="point-count">2549</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/8568" title="Trần Ngọc Dũ" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_bea8ba52-b0a0-495a-88e7-2c5a62510f11.PNG" src="//s3.haivn.com/s_bea8ba52-b0a0-495a-88e7-2c5a62510f11.PNG">
                                        <div class="info">
                                            <span class="full-name">Trần Ngọc Dũ</span>
                                            <span class="point-count">2532</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/127265" title="Tên Không" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_44aa5fb5-48a6-4ddb-92d7-812164c86ebe.jpg" src="//s3.haivn.com/s_44aa5fb5-48a6-4ddb-92d7-812164c86ebe.jpg">
                                        <div class="info">
                                            <span class="full-name">Tên Không</span>
                                            <span class="point-count">2488</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/68326" title="Chí Chóe" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_82e8b011-dfe9-4e1e-a007-14de528a1978.jpg" src="//s3.haivn.com/s_82e8b011-dfe9-4e1e-a007-14de528a1978.jpg">
                                        <div class="info">
                                            <span class="full-name">Chí Chóe</span>
                                            <span class="point-count">2480</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/78240" title="Em Thưa Cô" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_3f3682c9-9dcc-4d61-ab5a-aeacccfae32d.jpg" src="//s3.haivn.com/s_3f3682c9-9dcc-4d61-ab5a-aeacccfae32d.jpg">
                                        <div class="info">
                                            <span class="full-name">Em Thưa Cô</span>
                                            <span class="point-count">2470</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/97480" title="Hữu Công Hoàng" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f2024b82-ca53-4d43-9904-a933fb819a4f.jpg" src="//s3.haivn.com/s_f2024b82-ca53-4d43-9904-a933fb819a4f.jpg">
                                        <div class="info">
                                            <span class="full-name">Hữu Công Hoàng</span>
                                            <span class="point-count">2456</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/127619" title="Puss In Boots" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_508f939c-e159-4b31-bbd9-31f2bc8c1258.jpg" src="//s3.haivn.com/s_508f939c-e159-4b31-bbd9-31f2bc8c1258.jpg">
                                        <div class="info">
                                            <span class="full-name">Puss In Boots</span>
                                            <span class="point-count">2453</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/165778" title="Super quẩy" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f1d3593b-5101-4266-9219-32d3c5b44f95.jpg" src="//s3.haivn.com/s_f1d3593b-5101-4266-9219-32d3c5b44f95.jpg">
                                        <div class="info">
                                            <span class="full-name">Super quẩy</span>
                                            <span class="point-count">2450</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/167295" title="Viet Key" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_55e906bf-5f2e-42b3-9896-376010a26815.jpg" src="//s3.haivn.com/s_55e906bf-5f2e-42b3-9896-376010a26815.jpg">
                                        <div class="info">
                                            <span class="full-name">Viet Key</span>
                                            <span class="point-count">2450</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/193495" title="Trần Thanh Kiệt" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_0d2ae3ea-6de3-4549-92ad-89ba62a74c5c.png" src="//s3.haivn.com/s_0d2ae3ea-6de3-4549-92ad-89ba62a74c5c.png">
                                        <div class="info">
                                            <span class="full-name">Trần Thanh Kiệt</span>
                                            <span class="point-count">2420</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/183206" title="Karry" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_fe07af59-e13d-4395-9007-d03d44ab174a.jpg" src="//s3.haivn.com/s_fe07af59-e13d-4395-9007-d03d44ab174a.jpg">
                                        <div class="info">
                                            <span class="full-name">Karry</span>
                                            <span class="point-count">2410</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/32645" title="Thành Çôn's" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_a3a908ee-dba7-426b-9944-9ad2b676b6df.jpg" src="//s3.haivn.com/s_a3a908ee-dba7-426b-9944-9ad2b676b6df.jpg">
                                        <div class="info">
                                            <span class="full-name">Thành Çôn's</span>
                                            <span class="point-count">2394</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/183209" title="Qianxi" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_b7a04bbb-f5f5-48ab-93c5-920819da8c35.png" src="//s3.haivn.com/s_b7a04bbb-f5f5-48ab-93c5-920819da8c35.png">
                                        <div class="info">
                                            <span class="full-name">Qianxi</span>
                                            <span class="point-count">2377</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/183210" title="Yang" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_fe33e69c-d85e-48ec-ae1e-6fbc8f2abc74.jpg" src="//s3.haivn.com/s_fe33e69c-d85e-48ec-ae1e-6fbc8f2abc74.jpg">
                                        <div class="info">
                                            <span class="full-name">Yang</span>
                                            <span class="point-count">2364</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/126826" title="Anh KToàn" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_7d5c7eed-8fd9-46ed-8b86-2f0068dda458.jpg" src="//s3.haivn.com/s_7d5c7eed-8fd9-46ed-8b86-2f0068dda458.jpg">
                                        <div class="info">
                                            <span class="full-name">Anh KToàn</span>
                                            <span class="point-count">2354</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/67667" title=".......DI....E" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_269b619a-e6bb-463f-9918-c85d454645cf.jpg" src="//s3.haivn.com/s_269b619a-e6bb-463f-9918-c85d454645cf.jpg">
                                        <div class="info">
                                            <span class="full-name">.......DI....E</span>
                                            <span class="point-count">2353</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/31336" title="Hiếp Song Giết" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_4e69e7bd-64d7-4a02-8ba2-3250fcc2cd27.jpg" src="//s3.haivn.com/s_4e69e7bd-64d7-4a02-8ba2-3250fcc2cd27.jpg">
                                        <div class="info">
                                            <span class="full-name">Hiếp Song Giết</span>
                                            <span class="point-count">2350</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/31852" title="James Bond" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_f2e3325b-4b52-4c3f-bd84-1e267c36b2eb.jpg" src="//s3.haivn.com/s_f2e3325b-4b52-4c3f-bd84-1e267c36b2eb.jpg">
                                        <div class="info">
                                            <span class="full-name">James Bond</span>
                                            <span class="point-count">2339</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/101635" title="Silently" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_4542978f-3e93-440a-af25-e89bebd6da11.jpg" src="//s3.haivn.com/s_4542978f-3e93-440a-af25-e89bebd6da11.jpg">
                                        <div class="info">
                                            <span class="full-name">Silently</span>
                                            <span class="point-count">2301</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/172029" title="Phương Thuý" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_40343196-c350-43f1-803c-cf700946c164.jpg" src="//s3.haivn.com/s_40343196-c350-43f1-803c-cf700946c164.jpg">
                                        <div class="info">
                                            <span class="full-name">Phương Thuý</span>
                                            <span class="point-count">2293</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/112856" title="3 chú heo con" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_364d9dbf-a51f-4fe7-a65e-70900619d6b5.png" src="//s3.haivn.com/s_364d9dbf-a51f-4fe7-a65e-70900619d6b5.png">
                                        <div class="info">
                                            <span class="full-name">3 chú heo con</span>
                                            <span class="point-count">2264</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/75934" title="Đẹp Trai Học Giỏi (Có Vk Xinh)" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_06f9eb17-7b28-405c-9cce-0a9b109a919a.jpg" src="//s3.haivn.com/s_06f9eb17-7b28-405c-9cce-0a9b109a919a.jpg">
                                        <div class="info">
                                            <span class="full-name">Đẹp Trai Học Giỏi (Có Vk Xinh)</span>
                                            <span class="point-count">2260</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="danh-hai">
                                    <a kenhvoz-href="/u/183208" title="KaRo" target="_blank">
                                        <img class="top-avatar" ng-src="//s3.haivn.com/s_d4eba691-c572-4010-a591-943013f3e0ff.jpg" src="//s3.haivn.com/s_d4eba691-c572-4010-a591-943013f3e0ff.jpg">
                                        <div class="info">
                                            <span class="full-name">KaRo</span>
                                            <span class="point-count">2259</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>