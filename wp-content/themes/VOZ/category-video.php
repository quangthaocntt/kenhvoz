<?php


get_header(); ?>
        <div  class="row cover">
            <?php
            $args = array(
                        'posts_per_page'   => 5,
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
                        'author'	   => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true
                );
            // The Query
            query_posts( $args );
            $i = 1;
            // The Loop
            while ( have_posts() ) : the_post();
            list($videoType, $videoId) = split(':', $post->post_content);
            if($i == 1):
                $i++;
            ?>
            <div class="col-md-6" >
                <div class="item img-cover-large item-cover">
                    <a class="img-cover-video" href="<?php the_permalink(); ?>" >
                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg"/>
                        <div class="img-shadow"></div>
                    </a>
                    <div class="info cover-large">
                        <a  href="<?php the_permalink(); ?>" class="title">
                            <h4><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h4>
                        </a>
                    </div>
                </div><!-- / item -->
            </div>
            <?php elseif ($i == 2 || $i == 4): $i++;?>
            <div class="col-md-3">
                <div class="item item-cover">
                    <a  href="<?php the_permalink(); ?>" >
                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg"/>
                        <div class="img-shadow"></div>
                    </a>
                    <div class="info">
                        <a  href="<?php the_permalink(); ?>" class="title">
                            <h4><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h4>
                        </a>
                    </div>
                </div><!-- / item -->
            <?php elseif ($i == 3 || $i == 5): $i++;?>
                <div class="item item-cover">
                    <a  href="<?php the_permalink(); ?>" >
                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg"/>
                        <div class="img-shadow"></div>
                    </a>
                    <div class="info">
                        <a data-ga-label="TitleClicked" href="<?php the_permalink(); ?>" class="title">
                            <h4><?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?></h4>
                        </a>
                    </div>
                </div><!-- / item -->
            </div>
            <?php endif; ?>
            <?php endwhile;
            // Reset Query
            wp_reset_query();
            ?>
        </div>
        
        
        
        <div class="row content-post">
            <div class="col-md-8">
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
                            'post_type'        => array('video'),
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
                list($videoType, $videoId) = split(':', $post->post_content);
                ?>
                
                <div class="clearfix">
                    <div >
                        <a href="<?php the_permalink(); ?>" class="img-video-post">
                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $videoId;  ?>/0.jpg"/>
                        </a>
                        <div class="info">
                            <h3>
                                <a  href="<?php the_permalink(); ?>" class="title">
                                    <?php  echo apply_filters('the_replace_character_to_icon_filter',  the_title("", "", false));  ?>    <small>6:32</small>
                                </a>
                            </h3>
                            <div class="meta">
                                <!--<p>Admit it, you look the same at your first time!</p>-->
                                
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
                        </div>
                    </div>
                </div>
                <?php endwhile;
                // Reset Query
                wp_reset_query();
                ?>
                <div class="clearfix"></div>
                <hr/>
            </div>
<?php get_sidebar('video'); ?>
<?php get_footer(); ?>