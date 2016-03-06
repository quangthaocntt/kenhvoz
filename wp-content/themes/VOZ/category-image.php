<?php


get_header(); ?>
<script>
    $(document).on('ready', function(){
        //$('video');
        //auto load post
        $(window).scroll(function() {
             //control play and pause video _ start
            var videos = document.getElementsByClassName("item-video-home");
            for (var i = 0; i < videos.length; i++) { 
                if (isScrolledIntoView(videos[i])) {
                    videos[i].play();
                    $(videos[i]).next("span").hide();
                }else {
                    videos[i].pause();
                    $(videos[i]).next("span").show();
                }
            }
        });
       
        function isScrolledIntoView( element ) {
            var elementTop    = element.getBoundingClientRect().top,
            elementBottom = element.getBoundingClientRect().bottom;

            return elementTop >= 0 && elementBottom <= window.innerHeight;
        };
        //control play and pause video _ start

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
                <div style="display: block;position: relative;border: 1px solid #d8d8d8;border-radius: 3px;margin: 10px;padding: 10px;background: #f8f8f8 none repeat ">
                    <div class="text-upload">
                        <input id="titlePost"  type="text" title="Nội dung..." placeholder="Tiêu đề bài đăng !!!"/>
                    </div>
                    <div style="padding: 0px 5px ; display: none" class="whiteTextbox focus" id="imageUploadPanel" >
                        <form id="form-upload-image" method="post" enctype="multipart/form-data"  action="upload.php">
                            Chọn file ảnh để đăng kèm: <input type="file" name="file-upload" class="file" style="display: inline-block !important" id="photo_file_upload" onchange="haivoz.validateImageUpload();">
                        </form>
                    </div>
                    <div class="boxAnchor" style=""></div>
                    <div class="whiteTextbox focus" id="linkUploadPanel">
                        <input id="videoLink" type="text" placeholder="Copy link Video &amp; Ctrl + V dán vào đây" style="display:block;" value="" name="url" class="whiteTextbox" id="photo_post_url">
                        <div title="Hỗ trợ Zing TV, Vimeo, YouTube" class="supportedLogo"></div>
                    </div>
                    <div class="boxAnchor" style="margin-left: 42px;"></div>
                    <input type="hidden" value="2" id="type-post" />
                    <div id="submitTool">
                        <div class="postType clearfix">
                            <a title="Đăng hình" id="clickSubmitPhoto" class="submit loginRequired" postType = "1" onclick="jVozDesign.changeTypePost($(this).attr('postType'));"></a>
                            <a title="Đăng clip" id="clickSubmitVideo" class="submit loginRequired active"  postType = "2" onclick="jVozDesign.changeTypePost($(this).attr('postType'));"></a>
                            <img  id="uploading-state-id" src="<?php echo get_site_url(); ?>/static/images/uploading.gif" style="width: 70px;margin-top: -12px; display: none" />
                        </div>
                        <div class="submit-upload">
                            <input type="button" style="margin-right: 0px; margin-left: auto; float: right" value="Ngay và luôn" class="button blue-button" id="btnSubmit" onclick="jVozDesign.uploadPost();"/>
                        </div>
                        <div class="tips">
                            <span id="photoTips"  style="display: none;">Ảnh JPG, JPEG, PNG, GIF. Dung lượng không quá 1MB.</span>
                            <span id="videoTips"  style="display: inline;" title="https://www.youtube.com/watch?v=9PNubHdOdpI">Xem mẫu link</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php // if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
                <div class="tips-home">
                    <p><strong>Mẹo:</strong>Gặp bài hay hãy <b>like</b> động viên tác giả nhé <img src="<?php echo get_site_url(); ?>/static/icons/emotions/big_smile.ico"/></p>
		</div>
                <div class="content-item-post">
                    <?php
                    $posts_per_page = 50;
                    $p = get_query_var( 'page', 0 );
                    $args = array(
                                'posts_per_page'   => $posts_per_page,
                                'offset'           => ($p*$posts_per_page),//bắt đầu từ bài post thứ 0
                                'category'         => the_category_ID($echo, false),
                                'category_name'    => '',
                                'orderby'          => 'date',
                                'order'            => 'DESC',
                                'include'          => '',
                                'exclude'          => '',
                                'meta_key'         => '',
                                'meta_value'       => '',
                                'post_type'        => array('gif','image'),
                                'post_mime_type'   => '',
                                'post_parent'      => '',
                                'author'	   => '',
                                'post_status'      => 'publish',
                                'suppress_filters' => true
                        );
                    // The Query
                    query_posts( $args );
                    // The Loop
                    $post_count = 0;
                    while ( have_posts() ) : the_post();
                    $post_count ++;
                    ?>
                    <article class="main_inner clearfix"  >

                        <div class="voz-post-info ng-scope">
                            <h2 class="badge-item-title ng-scope">
                                <a target="_blank" href="<?php the_permalink(); ?>" class="ng-binding"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></a>
                            </h2>
                            <span
                                class="post-meta ng-scope">Đăng bởi <a target="_blank" href="/u/88022" class="ng-binding"><?php the_author(); ?></a> <span class="timer ng-binding">
                                    <?php 
                                        $post_time =  get_the_time( "U", $post->ID ); 
                                        echo apply_filters('the_voz_convert_post_time', $post_time );
                                    ?> 
                                </span>
                            </span>
                            <span class="stats ng-scope">
                                <span class="view-comments left">
    <!--                                <span title="Lượt xem" class="views ng-binding"><?php echo the_field('view_count'); ?></span>
                                    <span title="Lượt bình luận" class="comments ng-binding">4</span>-->
                                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                    <div class="fb-send" data-href="<?php the_permalink(); ?>"></div>
                                </span>
                            </span>
                        </div>
                        <div class="voz-img-post-container post-container gif-post">
                            <a  target="_blank"   href="<?php the_permalink(); ?>">
                                <?php 
                                    $format = get_post_format($post->ID);
                                ?>
                                <?php 
                                    if($format == "image"): 
                                    list($url, $width, $height) = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID),"full");
                                ?>
                                <span class="image-container add-cover-bottom">
                                <img class="img-responsive cover-bottom-image " alt="<?php the_title(); ?>" title="<?php the_title(); ?>"  src="<?php echo $url; ?>" >
                                </span>
                                <?php  if(($height/$width)>=2): ?>
                                <span class="cover-bottom-icon expand-post read-more">Xem đầy đủ<span class="shadow drop-arrow"></span></span>
                                <?php endif; ?>
                                <?php elseif ($format == "link") : ?>
                                <?php 
                                    list($videoType, $videoId) = split('@@@@@', $post->post_content);
                                    if($videoType == "youtube"): 
                                ?>
                                <img class="img-responsive " alt="<?php the_title(); ?>" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg" >
                                <span class="badge-youtube-play">&#9658;</span>
                                <?php elseif ($videoType == "gif") : ?>
                                <video class="img-responsive item-video-home"  muted   loop >
                                    <source src="<?php echo $videoId ;?>" type="video/mp4" >
                                    Your browser does not support HTML5 video.
                                </video>
                                <span class="badge-gif-play">GIF</span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </div>

                    </article>
                
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
                </div>
<!--                <div id="icon-load-item-post" style="position: relative;text-align: center;">
                    <img style="width:10%;" src="<?php echo get_site_url(); ?>/static/images/load-item-post.gif" />
                    <strong>Loading...</strong> 
                </div>-->
                
                <div id="paging-buttons" class="paging-buttons">
                    <?php  if($p == 0): ?>
                    <a class="previous disabled">« Trang trước</a>
                    <?php else: ?>
                    <a href="http://localhost/wordpress?page=<?php echo ($p - 1); ?>" class="previous">« Trang trước</a>
                    <?php endif; ?>
                    <?php if($post_count < $posts_per_page): ?>
                    <a  class="older disabled">Trang sau »</a>
                    <?php else: ?>
                    <a href="http://localhost/wordpress?page=<?php echo ($p + 1); ?>" class="older">Trang sau »</a>
                    <?php endif; ?>
                </div>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>