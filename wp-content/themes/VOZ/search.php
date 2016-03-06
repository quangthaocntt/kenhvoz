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
                            <span id="photoTips"  style="display: none;">Ảnh JPG, JPEG, PNG, GIF. Dung lượng không quá 2MB.</span>
                            <span id="videoTips"  style="display: inline;" title="https://www.youtube.com/watch?v=9PNubHdOdpI">Xem mẫu link</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php // if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
                <div class="tips-home">
                    <p><strong>Mẹo:</strong>Gặp bài hay hãy <b>like</b> động viên tác giả nhé <img src="<?php echo get_site_url(); ?>/static/icons/emotions/big_smile.ico"/></p>
		</div>
                <?php
                // The Loop
                while ( have_posts() ) : the_post();
                ?>
                
                <article class="main_inner clearfix"  >

                    <div class="voz-post-info ng-scope">
                        <h2 class="badge-item-title ng-scope">
                            <a target="_blank" href="<?php the_permalink(); ?>" class="ng-binding"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></a>
                        </h2>
                        <span
                            class="post-meta ng-scope">Đăng bởi <a target="_blank" href="/u/88022" class="ng-binding"><?php the_author(); ?></a> <span class="timer ng-binding">15 phút trước</span>
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
                    <div class="voz-img-post-container post-container ">
                        <a target="_blank"   href="<?php the_permalink(); ?>">
                            <?php 
                                $format = get_post_format($post->ID);
                            ?>
                            <?php 
                                if($format == "image"): 
                                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                            ?>
                            <img class="img-responsive " alt="<?php the_title(); ?>" title="<?php the_title(); ?>"  src="<?php echo $feat_image; ?>" >
                            <?php elseif ($format == "link") : ?>
                            <?php 
                                list($videoType, $videoId) = split(':', $post->post_content);
                                if($videoType == "youtube"): 
                            ?>
                            <img class="img-responsive " alt="<?php the_title(); ?>" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg" >
                            <div class="bigVideoIndicator">
                                <img src="<?php echo get_site_url(); ?>/static/images/play-icon.png" class="" style="width:70%;"/>
                            </div>
                             <?php elseif ($videoType == "vimeo") : ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    
                    <!--?php $current_user = wp_get_current_user(); ?-->
                </article>
                
<!--                <video>
                    <source src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" >
                    Your browser does not support HTML5 video.
                </video>-->
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>