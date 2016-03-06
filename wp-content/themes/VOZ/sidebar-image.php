<div class="col-md-4">
    <div id="sidebar-haivoz row">
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
                        <img class="img-responsive " alt="<?php the_title(); ?>" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg" >
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
        <div class="clearfix"/>
    </div>
</div>
