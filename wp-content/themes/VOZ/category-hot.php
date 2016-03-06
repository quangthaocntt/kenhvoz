<?php


get_header(); ?>

        <div class="row nav-socical">
            
            <div class="socical">
                <div class="col-md-8">
                    <span class="slogan">Hài VOZ - Cười đến bất tận </span>
                    <div class="social-love">
                        <ul>
                            <li><span class="facebook-like badge_facebook_render" id="jsid_dom_932369"><fb:like colorscheme="light" action="like" height="40" width="240" show_faces="false" layout="button_count" href="https://facebook.com/9gag" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=111569915535689&amp;color_scheme=light&amp;container_width=0&amp;height=40&amp;href=https%3A%2F%2Ffacebook.com%2F9gag&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240"><span style="vertical-align: bottom; width: 83px; height: 20px;"><iframe width="240px" height="40px" frameborder="0" name="f34c869b72abc92" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" style="border: medium none; visibility: visible; width: 83px; height: 20px;" src="http://www.facebook.com/v2.2/plugins/like.php?action=like&amp;app_id=111569915535689&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6p3So0GhyQP.js%3Fversion%3D41%23cb%3Df212014b036e99a%26domain%3D9gag.com%26origin%3Dhttp%253A%252F%252F9gag.com%252Ff1ccddaff4270d4%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=0&amp;height=40&amp;href=https%3A%2F%2Ffacebook.com%2F9gag&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240" class=""></iframe></span></fb:like></span></li>
                            <li><span class="twitter-follow"><iframe frameborder="0" id="twitter-widget-0" scrolling="no" allowtransparency="true" src="http://platform.twitter.com/widgets/follow_button.f399ce91824b7ff2ece442a414e1a813.en.html#_=1430477241545&amp;dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=9gag&amp;show_count=false&amp;show_screen_name=false&amp;size=m" class="twitter-follow-button twitter-follow-button" title="Twitter Follow Button" data-twttr-rendered="true" style="position: static; visibility: visible; width: 60px; height: 20px;"></iframe></span></li>
                            <li><span class="google-plus-follow"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 80px; height: 20px;" id="___follow_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 80px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1430477241600" name="I0_1430477241600" src="https://apis.google.com/u/0/_/widget/render/follow?usegapi=1&amp;rel=publisher&amp;height=20&amp;annotation=none&amp;origin=http%3A%2F%2F9gag.com&amp;url=https%3A%2F%2Fplus.google.com%2F110969448173982102496%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.OuOrzZ8GQcU.O%2Fm%3D__features__%2Fam%3DIQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCO9uGNmv6wlfXBJwCbYRCdcqx94WQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1430477241600&amp;parent=http%3A%2F%2F9gag.com&amp;pfname=&amp;rpctoken=46159016" data-gapiattached="true"></iframe></div></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 mobile">
<!--                    <a href="#" title="Ứng dụng Hài VOZ cho IOS"><img src="<?php echo get_site_url(); ?>/static/images/iphone-icon.png" /></a>
                    <a href="#" title="Ứng dụng Hài VOZ cho Android"><img  src="<?php echo get_site_url(); ?>/static/images/android-icon.png" /></a>-->
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
                
                <?php
                $args = array(
                            'posts_per_page'   => 10,
                            'offset'           => 0,//bắt đầu từ bài post thứ 0
                            'category'         => the_category_ID($echo, false),
                            'category_name'    => '',
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => array('image'),
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
                                <span title="Lượt xem" class="views ng-binding"><?php echo the_field('view_count'); ?></span>
                                <span title="Lượt bình luận" class="comments ng-binding">4</span>
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
                            <div class="bigVideoIndicator"></div>
                             <?php elseif ($videoType == "vimeo") : ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="fb-like" data-href="https://www.facebook.com/conganvietnam/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    <?php $current_user = wp_get_current_user(); ?>
                </article>
                
                <video>
                    <source src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" >
                    Your browser does not support HTML5 video.
                </video>
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
            </div>
<?php get_sidebar(); ?>
            </div><!--#row -->
<?php get_footer(); ?>