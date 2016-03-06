<script>
    $(document).on('ready', function(){
        $(window).scroll(function() {
            var elementFixedAds = document.getElementById("ads-fixed");
            var scrollFinalSidebarFlag = document.getElementById("scroll-final-sidebar-flag");
            var elementFixedTop    = scrollFinalSidebarFlag.getBoundingClientRect().top;
            var width = elementFixedAds.offsetWidth;
            if(elementFixedTop < 50){
                elementFixedAds.style.width=width+"px";
                elementFixedAds.style.position="fixed";
            }else{
                elementFixedAds.style.width="100%";
                elementFixedAds.style.position="inherit";
            }
        });
    });
    
</script>

<div class="col-md-4">
    <section id="setting-image-show-style" class="section-control" ng-show="settings.quickSettings">
        <div class="title">
            <h3>Thiết lập nhanh <sup><em>Beta</em></sup></h3>
        </div>
        <ul>
            <li>
                <p>
                    <span class="cell-title">Tự động thu gọn ảnh</span>
                </p>
                <span class="toggle badge-personalise-options on" ng-class="{'on': settings.shortImage, 'off': !settings.shortImage}" ng-click="(settings.shortImage = !settings.shortImage)" onclick="haivoz.changeStateViewImage(this);">
                    <span class="on">On</span>
                    <span class="off">Off</span>
                    <span class="switch"></span>
                </span>
            </li>
        </ul>
        <div class="btn-container">
            <a class="btn size-30 blue" href="#" ng-click="(settings.quickSettings = false)" >Lưu lại</a>
        </div>
    </section>
    <div id="sidebar-haivoz row" style="margin-top: 10px;">
        <div class="fb-page" data-href="https://www.facebook.com/conganvietnam/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/conganvietnam/"><a href="https://www.facebook.com/conganvietnam/">ღ Boy Police Việt Nam ღ</a></blockquote></div>
        </div>
        
        <ul class="sidebar-item-1">
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
                        'author'	   => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true
                );
            // The Query
            query_posts( $args );
            // The Loop
            while ( have_posts() ) : the_post();
            ?>
            <li class="main_inner">                   
                <div class="img-container">                        
                    <a  target="_blank" class="badge-evt" href="<?php the_permalink(); ?>"> 
                        <?php 
                            $format = get_post_format($post->ID);
                        ?>
                        <?php 
                            if($format == "image"): 
                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        ?>
                        <img class="img-responsive  " src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>" />
                        <?php elseif ($format == "link") : ?>
                        <?php 
                            list($videoType, $videoId) = split(':', $post->post_content);
                            if($videoType == "youtube"): 
                        ?>
                        <div style="position: relative">
                        <img class="img-responsive " alt="<?php the_title(); ?>" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg" >
                        <span class="btn-play"><span class="play"></span></span>
                        </div>
                         <?php elseif ($videoType == "vimeo") : ?>
                        <?php endif; ?>
                        <?php endif; ?>
                    </a>                    
                </div>                   
                <div class="info-container">                        
                    <h3>
                        <a target="_blank" class="badge-evt" href="<?php the_permalink(); ?>"><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></a>
                    </h3>                    
                </div>                
            </li>
            <?php endwhile;
            // Reset Query
            wp_reset_query();
            ?>
        </ul>
        <!-- ads fixed start-->
        <div id="scroll-final-sidebar-flag"></div>
        <div id="ads-fixed" style="width: 100%;top: 49px;;background-color: red">
            <div style="background-color: blue;width: 100%;height: 300px;"></div>
        </div>
        <!-- ads fixed end -->
        <div class="clearfix"/>
    </div>
</div>
