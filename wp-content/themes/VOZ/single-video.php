<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
     
get_header(); ?>
<script>
    $(document).on('ready', function(){
        $( window ).resize(function() {
            console.log("Handler for .resize() called.</div>" );
            $("#player").css("height",$("#player").width()*56.25/100 +"px");
        });
        $("#prev_post span.prev-label").click(function(){
            $('.list_video').find('.playing').prev().trigger('click');
        });
        $("#next_post span.next-label").click(function(){
            $('.list_video').find('.playing').next().trigger('click');
        });
    });
</script>
    

<div class="content-post-video-banner"   > 
    
    <div class="row content-post " >
        <div class="col-md-8 font-special" style="margin-top: 10px;">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php 
            $arrayExclude = array(get_the_ID());
            list($videoType, $videoId) = split('@@@@@', $post->post_content); 
            if($videoType == "youtube"): 
        ?>
            <div >
                <a href="#" >
                    <!--<embed id="playerid" class="img-responsive"  height="360px" frameborder="0" webkitallowfullscreen mozallowfullscreen  allowfullscreen="true" allowscriptaccess="always" quality="high"  src="https://www.youtube.com/v/<?php echo $videoId; ?>?enablejsapi=1&version=3&playerapiid=ytplayer&rel=0&showinfo=0" type="application/x-shockwave-flash">-->
                    <div id="player" > </div>
                    <?php 
                    echo '<script type="text/javascript">youtubeAPI.onYouTubePlayerAPIReady("'.$videoId.'");</script>';
                    ?>
                </a>
                
                <h1 id="titleVideoMain" style="color:#FFFFFF;margin:0;padding:0;margin-bottom: 10px;"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h1>
            </div>
        <?php elseif ($videoType == "vimeo") : ?>
        <?php endif; ?>
        <?php endwhile; ?>
        </div>
        <div class="list_video col-md-4">
            
            <div class="badge-grid-item badge-post-item-a8BZ1z " data-hashed-id="a8BZ1z">
                <?php while ( have_posts() ) : the_post(); 
                    list($videoType, $videoId) = split('@@@@@', $post->post_content); 
                ?>
                
                <div class="item clearfix post-playlist  playing row " videoId="<?php echo $videoId;  ?>" onclick="youtubeAPI.reloadVideo(this)">
                        <div class="col-md-4 image-item-list " style="position: relative">
                            <img style="width:100%" class="responsivewrapper" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg">
                        </div>    
                    
                    <div class="info col-md-8">
                        <a class="title" href="#" data-ga-label="TitleClicked"><h4><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h4></a>
                        <div class="meta"><p>5:13</p></div>
                    </div>
                </div>
                <?php endwhile; ?>
                
                <?php
                
                $args = array(
                            'posts_per_page'   => 50,
                            'offset'           => 0,//bắt đầu từ bài post thứ 0
                            'category'         => the_category_ID($echo, false),
                            'category_name'    => '',
                            'orderby'          => 'rand',
                            'order'            => 'DESC',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => array('video'),
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'post__not_in'     => $arrayExclude,
                            'author'           => '',
                            'post_status'      => 'publish',
                            'suppress_filters' => true
                    );
                // The Query
                query_posts( $args );
                // The Loop
                while ( have_posts() ) : the_post();
                list($videoType, $videoId) = split('@@@@@', $post->post_content);
                ?>
                
                <div class="item clearfix post-playlist   row " videoId="<?php echo $videoId;  ?>" onclick="youtubeAPI.reloadVideo(this)">
                    <!--<a href="<?php the_permalink(); ?>" data-ga-label="ImageClicked">-->
                        <div class="col-md-4 image-item-list " style="position: relative">
                            <img style="width:100%" class="responsivewrapper" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg">
                        </div>    
                    <!--</a>-->
                    
                    <div class="info col-md-8">
                        <a class="title" href="#" data-ga-label="TitleClicked"><h4><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h4></a>
                        <div class="meta"><p>5:13</p></div>
                    </div>
                </div>
                
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
                
            </div>
        </div>
        
        <div  class="spread-bar-wrap control-next-prev" >
            <div class="post-next-prev">
                <a id="prev_post" title="hotkey: ← hoặc K" class="prev-post" href="#"><span class="prev-arrow"></span><span class="prev-label">Bài Trước</span></a>
                <a id="next_post" title="hotkey: → hoặc J" class="next-post" href="#"><span class="next-label">Bài Sau</span><span class="arrow"></span></a>
            </div>
        </div>
        <div class="quick-setting" style="float: right">
            <p>
                <span class="cell-title">Tự động phát</span>
            </p>
            <span class="toggle badge-personalise-options on" ng-class="{'on': settings.shortImage, 'off': !settings.shortImage}" ng-click="(settings.shortImage = !settings.shortImage)" onclick="youtubeAPI.changeStateAutoPlayVideo(this)">
                <span class="on">On</span>
                <span class="off">Off</span>
                <span class="switch"></span>
            </span>
        </div>
    </div>
</div>
<div class="row content-post">
    <div class="col-md-8">
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
        <!--comment facebook -->
        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5"></div>
        
        <div class="postComment row">
            <div class="commentBox col-md-12">
                <h2 style="border-bottom: 1px solid #ddd;">Bài viết liên quan</h2>
                <div id=" row">
                    <?php
                    $args = array(
                                'posts_per_page'   => 3,
                                'offset'           => 0,//bắt đầu từ bài post thứ 0
                                'category'         => the_category_ID($echo, false),
                                'category_name'    => '',
                                'orderby'          => 'rand',
                                'order'            => 'DESC',
                                'include'          => '',
                                'exclude'          => '',
                                'meta_key'         => '',
                                'meta_value'       => '',
                                'post_type'        => array('video'),
                                'post_mime_type'   => '',
                                'post_parent'      => '',
                                'post__not_in'     => $arrayExclude,
                                'author'	   => '',
                                'post_status'      => 'publish',
                                'suppress_filters' => true
                        );
                    // The Query
                    query_posts( $args );
                    // The Loop
                    while ( have_posts() ) : the_post();
                    array_push($arrayExclude, $post->ID);
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
                                'meta_key'         => '',
                                'meta_value'       => '',
                                'post_type'        => array('video','image'),
                                'post_mime_type'   => '',
                                'post_parent'      => '',
                                'post__not_in'     => $arrayExclude,
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
    <?php get_sidebar('video'); ?>
<?php get_footer(); ?>