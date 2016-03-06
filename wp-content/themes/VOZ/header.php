<?php
session_start(); 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
?>

<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Thao Marky’s Productions Responsive 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_site_url(); ?>/static/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_site_url(); ?>/static/css/bootstrap.min.css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script src="<?php echo get_site_url(); ?>/static/js/jquery.min.js"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/player_youtube_api.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/form_data.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/config-system.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/multi-languages.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/jquery-haivoz.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/function.js" type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/jquery.imageslider.js"  type="text/javascript"></script>
    <script src="<?php echo get_site_url(); ?>/static/js/prefixfree.min.js"  type="text/javascript"></script>
<?php wp_head(); ?>
</head>
<body>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            console.log(systemConfig.appIdFacebook);
            FB.init({
                appId      : systemConfig.appIdFacebook,
                status     : true,
                xfbml      : true,
                version    : 'v2.3' // or v2.0, v2.1, v2.2, v2.3
            });
            
            FB.Event.subscribe('auth.login', function(response) {
                console.log('logged in');
            });

            FB.Event.subscribe('auth.logout', function(response) {
                console.log('logged out');
            });    
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId="+systemConfig.appIdFacebook;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
//        FB.getLoginStatus(function(response) {
//            facebook.statusChangeCallback(response);
//        });overlay-trick
    </script>
    
    
<!--<div style="display: block;height: 100px;">Test đăng nhập</div>
<div id="status">
</div>
<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
    
<fb:login-button scope="public_profile,email" onlogin="facebook.checkLoginState();">
    Đăng nhập
</fb:login-button>
<div id="contentFacebook"></div>-->
    
    
    <div id="menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/wordpress"><img style="height:40px;display: inline-block;margin-top: -10px;" src="<?php echo get_site_url(); ?>/static/images/hai voz.png"></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="menu">
                    <?php 
                        $args = array(
                                'type'                     => 'post',
                                'child_of'                 => 0,
                                'parent'                   => '',
                                'orderby'                  => 'name',
                                'order'                    => 'ASC',
                                'exclude'                  => '',
                                'taxonomy'                 => 'category'
                        ); 
                        
                        $categories = get_categories($args);
                        foreach ($categories as $cat) {
                            if($cat->parent == 0){
                                $argsChild = array(
                                        'type'                     => 'post',
                                        'child_of'                 => $cat->term_id,
                                        'parent'                   => '',
                                        'orderby'                  => 'name',
                                        'order'                    => 'ASC',
                                        'exclude'                  => '',
                                        'taxonomy'                 => 'category'
                                ); 
                                $categoriesChild = get_categories($argsChild);
                                if($cat->slug=="story"){
                                    if(count($categoriesChild)>0){
                                        echo '<li><a href="'.get_category_link( $cat->cat_ID ).'"  class="hot"  >'.$cat->description.'<i class="has-dropdown"></i></a><ul class="dropdown-menu-web">';
                                        foreach ($categoriesChild as $catChild) {
                                            $pieces = split('-', $catChild->slug);
                                            if( $pieces[0]== "full"){
                                                echo '<li class="menu-item-view-all"><a style="color:#03D43B !important;text-decoration: underline !important;" href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }else{
                                                echo '<li><a href="'.get_category_link( $catChild->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }
                                        }
                                        echo '</ul></li>';
                                    }else{
                                         echo '<li><a class="hot" href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'</a></li>';
                                    }
                                   
                                }else if($cat->slug== "news"){
                                    if(count($categoriesChild)>0){
                                        echo '<li><a href="'.get_category_link( $cat->cat_ID ).'"  class="new"  >'.$cat->description.'<i class="has-dropdown"></i></a><ul class="dropdown-menu-web">';
                                        foreach ($categoriesChild as $catChild) {
                                            $pieces = split('-', $catChild->slug);
                                            if( $pieces[0]== "full"){
                                                echo '<li class="menu-item-view-all"><a style="color:#03D43B !important;text-decoration: underline !important;" href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }else{
                                                echo '<li><a href="'.get_category_link( $catChild->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }
                                        }
                                        echo '</ul></li>';
                                    }else{
                                         echo '<li><a class="new" href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'</a></li>';
                                    }
                                }else if($cat->slug== "story-image"){
                                    if(count($categoriesChild)>0){
                                        echo '<li><a href="'.get_category_link( $cat->cat_ID ).'"  class="doc"  >'.$cat->description.'<i class="has-dropdown"></i></a><ul class="dropdown-menu-web">';
                                        foreach ($categoriesChild as $catChild) {
                                            $pieces = split('-', $catChild->slug);
                                            if( $pieces[0]== "full"){
                                                echo '<li class="menu-item-view-all"><a style="color:#03D43B !important;text-decoration: underline !important;" href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }else{
                                                echo '<li><a href="'.get_category_link( $catChild->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }
                                        }
                                        echo '</ul></li>';
                                    }else{
                                         echo '<li><a class="doc" href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'</a></li>';
                                    }
                                }else if($cat->slug=="blog"){
                                    if(count($categoriesChild)>0){
                                        echo '<li><a href="'.get_category_link( $cat->cat_ID ).'" class="blog" >'.$cat->description.'<i class="has-dropdown"></i></a><ul class="dropdown-menu-web">';
                                        foreach ($categoriesChild as $catChild) {
                                            $pieces = split('-', $catChild->slug);
                                            if( $pieces[0]== "full"){
                                                echo '<li class="menu-item-view-all"><a style="color:#03D43B !important;text-decoration: underline !important;" href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }else{
                                                echo '<li><a href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }
                                            
                                        }
                                        echo '</ul></li>';
                                    }else{
                                         echo '<li><a class="blog" href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'</a></li>';
                                    }
                                }else{
                                    if(count($categoriesChild)>0){
                                        echo '<li><a  href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'<i class="has-dropdown"></i></a> </span><ul class="dropdown-menu-web">';
                                        foreach ($categoriesChild as $catChild) {
                                            $pieces = split('-', $catChild->slug);
                                            if( $pieces[0]== "full"){
                                                echo '<li class="menu-item-view-all"><a style="color:#03D43B !important;text-decoration: underline !important;" href="'.get_category_link( $cat->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }else{
                                                echo '<li><a href="'.get_category_link( $catChild->cat_ID ).'" >'.$catChild->description.'</a></li>';
                                            }
                                        }
                                        echo '</ul></li>';
                                    }else{
                                         echo '<li><a href="'.get_category_link( $cat->cat_ID ).'" >'.$cat->description.'</a></li>';
                                    }
                                }
                            }
                        }
                    ?>
                    <li style="cursor: pointer;" ><a   target="_blank" onclick="jVozDesign.linkToForum();">Forums</a></li>
                </ul> 
                
                <!-- user function -->
                <div class="user-function navbar-right" >
                    <div  class="notification" >
                        <a rel="nofollow" href="#" class="bell">
                            <span href="#" class="badge hide" >0</span>
                        </a>
                    </div>
                    <?php if(is_user_logged_in()): ?>
                    <?php $current_user = wp_get_current_user(); ?>
                    <div class="avatar" >
                        <img class="img-responsive img-thumbnail" src="https://graph.facebook.com/<?php echo $current_user->user_login ?>/picture" height="40" width="40"/>
                    </div>
                    <div class="setting">	
                        <ul>
                            <li>
                                <a class="me" href="#" >
                                    <?php
                                        echo $current_user->display_name ;
                                    ?>
                                </a>
                                <ul class="list-settings round-corner">
                                    <span class="overlay-trick"></span>
                                    <li class="list-anchor"></li>
                                    <li><a href="<?php  echo get_permalink( get_page_by_path('profile')); ?>">Trang cá nhân</a></li>
                                    <li><a href="<?php  echo get_permalink( get_page_by_path('user-setting')); ?>">Thiết lập</a></li>
                                    <li><a href="#" onclick="haivoz.fbLogout();"  >Thoát</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php else: ?>
                    <div class="login"><a  onclick="haivoz.openLogin();" style="cursor: pointer">Đăng nhập</a></div>
                    <?php endif; ?>
                    
                    <div class="upload">
                        <a rel="nofollow"  href="<?php  echo get_permalink( get_page_by_path('upload')); ?>" class="upload" id="jsid-upload-menu">Upload</a>
                    </div>
                </div>
                <a id="headbar-search" class="badge-header-search" href="<?php echo get_search_link(); ?>">
                    <input type="text">
                </a>
                <a id="headbar-top-user" class="badge-header-top-user" href="<?php  echo get_permalink( get_page_by_path('top-user')); ?>"><span>Top thành viên</span></a>
            </div>
            
            
        </nav>
    </div>
    <div class="clearfix"></div>
    
    
    <div id="main">
        
        