<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div class="row content-post ">
    <div class="col-md-8 font-special">
        <?php while ( have_posts() ) : the_post(); ?>
        <div style="border-bottom: 1px solid #ddd;">
            <div id="post-control-bar" class="spread-bar-wrap">
                <div class="spread-bar">                	
                    <div class="facebook-btn">
                        <div class="fb-like" data-href="https://www.facebook.com/conganvietnam/" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                </div>
                <div class="post-next-prev">
                    <a id="prev_post" title="hotkey: ← hoặc K" class="prev-post" href="<?php echo  get_previous_posts_link();  ?>"><span class="prev-arrow"></span><span class="prev-label">Bài Trước</span></a>
                    <a id="next_post" title="hotkey: → hoặc J" class="next-post" href="<?php echo get_next_posts_link();  ?>"><span class="next-label">Bài Sau</span><span class="arrow"></span></a>
                   
                </div>
            </div>
            <?php 
                $format = get_post_format($post->ID);
            ?>
            <?php if ($format == "link") : ?>
            <?php 
                list($videoType, $videoId) = split('@@@@@', $post->post_content);
                if($videoType == "gif"): 
            ?>
            <video class="img-responsive"  muted   loop autoplay style="width: 100%;">
                <source src="<?php echo $videoId ;?>" type="video/mp4" >
                Your browser does not support HTML5 video.
            </video>
            <?php endif; ?>
            <?php endif; ?>
            
            <h1><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h1>
        </div>
        <?php endwhile; ?>
        <div class="badge-entry-info post-afterbar-meta row">
            <p class="left">Đăng bởi <a href="//haivn.com/u/183210" target="_blank" title="Yang"><?php the_author(); ?></a> 10 phút trước</p>
            <p class="right"></p><p class="mod-tools">
            </p><p></p>
            <div class="clearfix"></div>
        </div>
        
        <div id="haivoz-facebook-box" class="haivl-like-box row">
            <div class="fanpage-box col-md-6">
                <h3><img src="//s2.haiivl.com/img/like-icon.png" alt="Like"> Like <a href="https://www.facebook.com/haiivuilam" target="_blank">KênhVOZ trên Facebook</a> để inbox với Admin</h3>
                <div class="hai-like">
                    <div class="fb-like" data-href="https://www.facebook.com/conganvietnam/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
            </div>
            <div class="group-box col-md-6">
                <h3>Tham gia <a target="_blank" href="https://www.facebook.com/groups/haivoz/">Hóng Biến Hội</a> để cập nhật tin hot</h3>
                <div class="btn-join-group"><a class="btn btn-join-group" href="https://www.facebook.com/groups/haivoz/" target="_blank">Hóng Ngay</a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        
        <div class="postComment row">
            <div class="commentBox col-md-12">
                <h2 style="border-bottom: 1px solid #ddd;">Bài viết liên quan</h2>
                <div id=" row">
                    <?php
                    $args = array(
                                'posts_per_page'   => 10,
                                'offset'           => 0,//bắt đầu từ bài post thứ 0
                                'category'         => the_category_ID($echo, false),
                                'category_name'    => '',
                                'orderby'          => 'rand',
                                'order'            => 'DESC',
                                'include'          => '',
                                'exclude'          => '',
                                'meta_key'         => '',
                                'meta_value'       => '',
                                'post_type'        => array('gif'),
                                'post_mime_type'   => '',
                                'post_parent'      => '',
                                'author'	   => '',
                                'post_status'      => 'publish',
                                'suppress_filters' => true
                        );
                    // The Query
                    query_posts( $args );
                    $arrayPostId = array();
                    // The Loop
                    while ( have_posts() ) : the_post();
                    array_push($arrayPostId, $post->ID);
                    list($videoType, $videoId) = split('@@@@@', $post->post_content);
                    ?>
                    <div class="unreadPostsContainer col-md-4">
                        <a href="<?php the_permalink(); ?>">
                            <div style="position: relative;">
                                <div style="position:relative  ;overflow: hidden;height: 135px;">
                                    <img style="width:100%" class="responsivewrapper" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg">
                                </div>
                                <div class="smallVideoIndicator"></div>
                            </div>
                            <p class="blackSmallTitle" title="<?php the_title(); ?>"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></p>
                        </a>
                    </div>
                    <?php endwhile;
                    // Reset Query
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!--comment facebook -->
        <div class="fb-comments" data-href="https://www.facebook.com/conganvietnam/" data-numposts="5"></div>
        <div class="postComment row">
            <div class="commentBox col-md-12">
                <h2 style="border-bottom: 1px solid #ddd;">Phổ biến</h2>
                <div id="detail-recommend-posts row">
                    
                    <?php
                    $args = array(
                                'posts_per_page'   => 12,
                                'offset'           => 0,//bắt đầu từ bài post thứ 0
                                'category'         => the_category_ID($echo, false),
                                'category_name'    => '',
                                'orderby'          => 'rand',
                                'order'            => 'DESC',
                                'include'          => '',
                                'exclude'          => '',
                                'post__not_in'     =>$arrayPostId,
                                'meta_key'         => '',
                                'meta_value'       => '',
                                'post_type'        => array('video','image'),
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
                    
                    <div class="unreadPostsContainer col-md-4">
                        <a href="<?php the_permalink(); ?> ">
                            <?php 
                                $format = get_post_format($post->ID);
                            ?>
                            <?php 
                                if($format == "image"): 
                                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                            ?>
                            <div style="position:relative  ;overflow: hidden;height: 135px;">
                                <img class="img-responsive " src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>" />
                            </div>
                            <?php elseif ($format == "link") : ?>
                            <?php 
                                list($videoType, $videoId) = split('@@@@@', $post->post_content);
                                if($videoType == "youtube"): 
                            ?>
                            <div style="position:relative  ;overflow: hidden;height: 135px;">
                                <img class="img-responsive " alt="<?php the_title(); ?>" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg" >
                                <div class="smallVideoIndicator">
                                    <img width="60%" src="<?php echo get_site_url(); ?>/static/images/play-icon-small.png">
                                </div>
                            </div>
                             <?php elseif ($videoType == "vimeo") : ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <p class="blackSmallTitle"  style="height: 80px" title="<?php the_title(); ?>"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></p>
                        </a>
                    </div>
                    <?php endwhile;
                    // Reset Query
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="footer-links">
            <div class="footer-items-left">© 2015 Kênh VOZ</div>
            <div class="footer-items-right">Bản thử nghiệm</div>
            <div class="clear"></div>
        </div>
    </div>
<?php get_sidebar('image'); ?>
</div>
<?php get_footer(); ?>