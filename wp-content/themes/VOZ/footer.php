        
    </div> <!-- main -->
    
    
    
    
    
<!--    dialog login-->
    <div  id="overlay-container" class="overlay-scroll-container ng-scope" ng-if="showModal">
        <section class="modal signup badge-overlay-signin ng-scope" ng-include="'/app/views/user/reg.html'" ng-if="modalReg">
            <a class="btn-close badge-overlay-close ng-scope" href="#" onclick="haivoz.closeModel();">X</a>
            <section id="signup" class="ng-scope">
                <h2>Đăng nhập</h2>
                <p class="lead">Đăng nhập ngay không cần đăng ký</p>
                <div class="social-signup" >
                    <p class="tips-1 ng-scope">Bấm nút Đăng nhập ở dưới để tiếp tục.</p>
                    <div ng-if="(loginStatus == 1)" style="text-align: center;" class="ng-scope">
                        <a href="#" class="btn-connect-option facebook" onclick="facebook.checkLoginState();" >Đăng nhập</a>
                    </div>
                </div>
                <form class="badge-login-form ng-pristine ng-valid">
                    <p class="lead">Đăng nhập bằng email và mật khẩu.</p>
                    <div class="field">
                        <label for="login-email-name">Email</label>
                        <input id="user_login" type="text" autofocus="autofocus" ng-model="user.email" class="ng-pristine ng-valid">
                    </div>
                    <div class="field">
                        <label for="login-email-password">Mật khẩu</label>
                        <input id="password" type="password" name="password"  class="ng-pristine ng-valid">
                    </div>
                    <div class="btn-container">
                        <input type="submit" value="Đăng nhập" onclick="haivoz.login(document.getElementById('user_login').value , document.getElementById('password').value );" />
                    </div>
                </form>
            </section>
        </section>
    </div>
    <div class="clearfix"></div>
    
    <!--Dialog bootrap-->
    <button id="boostrap-alert" type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    
    <div id="myModalConfirm" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary yes">OK</button>
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                </div>
            </div>
        
        </div>
    </div>
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        
        </div>
    </div>
    
    <div id="myRotator" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div id="my-avatar-container" class="avatar-container p-0">
                <!--?php if(is_user_logged_in()): ?-->
                <!--?php $current_user = wp_get_current_user(); ?-->
                <!--<img src="https://graph.facebook.com/..><!--?php echo $current_user->user_login ?--><!--picture" alt="" class="avatar-uploading"/-->
                <!--?php endif; ?-->
                    <img src="<?php echo get_site_url(); ?>/static/images/icon-upload.png" alt="" class="avatar-uploading"/>
                <!--?php end; ?-->
                
            </div>
            <div class="title-uploading" style="height:100px;width:100px;margin:auto auto;font-weight:bold;color:#fff;">
                <p>Uploading...</p>
            </div>
        </div>
    </div>
    
    <div id="remind-modal" class="modal fade" role="dialog">
        <div class="modal-dialog ">
            <a class="btn-close badge-btn-close" >✖</a>
            <section id="idle">
            <h2>Thức dậy đi!</h2>
            <p class="lead">Thím đã ngủ quên <span class="badge-idle-popup-idleTime">3 phút</span>. Tiếp tục xem các bài đăng mới nào !!!</p>
            <div class="content">
                <div class="lhs">
                    <section class="badge-block-ad block-ad">
                        <div class="thumbnail">
                            <img src="//s1.haivn.com/1.0/attachment/ny.png">	
                        </div>
                    </section>
                </div><!-- / lhs -->
                <div class="rhs">
                    <section class="ticker">
                        <h3>Bài đăng phổ biến</h3>
                        <ul id="jsid-idle-popup-posts">
                            <li>	                                
                                <a href="http://9gag.com/gag/aydxK0p?ref=idlePopup" target="_blank">
                                    <div class="thumbnail">	                                        
                                        <img src="//s1.haivn.com/1.0/attachment/ny.png">	
                                    </div>	                                    
                                    <div class="info">	                                        
                                        <h3>So, who should win the Oscar for Best Actor this year?</h3>	
                                    </div><!-- / into -->
                                </a>	                         
                            </li>
                            <li>	     
                                <a href="http://9gag.com/gag/aeGMepW?ref=idlePopup" target="_blank">
                                    <div class="thumbnail">	
                                        <img src="http://img-9gag-fun.9cache.com/photo/aeGMepW_220x145.jpg">	    
                                    </div>	     
                                    <div class="info">	      
                                        <h3>If you can play a song that the whole planet could hear, that would be?</h3>
                                    </div><!-- / into -->	                  
                                </a>	                         
                            </li>
                            <li>	                            
                                <a href="http://9gag.com/gag/aRAj1mG?ref=idlePopup" target="_blank">	   
                                    <div class="thumbnail">	                              
                                        <img src="http://img-9gag-fun.9cache.com/photo/aRAj1mG_220x145.jpg">	
                                    </div>	   
                                    <div class="info">	        
                                        <h3>Anyone would spend a month in a haunted house for that kinda money. But would you do this?</h3>	
                                    </div><!-- / into -->	
                                </a>	                 
                            </li>
                            <li>	      
                                <a href="http://9gag.com/gag/avPOGBE?ref=idlePopup" target="_blank">	
                                    <div class="thumbnail">	                   
                                        <img src="http://img-9gag-fun.9cache.com/photo/avPOGBE_220x145.jpg">	    
                                    </div>	                            
                                    <div class="info">	                                
                                        <h3>So who will win... let's vote Sides. Not individual, only sides</h3>
                                    </div><!-- / into -->	         
                                </a>	                      
                            </li>
                        </ul>
                    </section>
                </div>
            </div><!-- / content -->
        </section>
        </div>
    </div>
    
    </body>
</html>