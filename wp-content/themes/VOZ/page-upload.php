<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<script>
    $(document).on('ready', function(){
        $("#leftCol .tabBar .tab").eq(0).click(function(){
            $("#leftCol .tabBar .tab").eq(0).addClass("active");
            $("#leftCol .tabBar .tab").eq(1).removeClass("active");
            $("#form-upload-image").show();
            $(".field-video").hide();
            $("#type-post").val(1);
        });
        $("#leftCol .tabBar .tab").eq(1).click(function(){
            $("#leftCol .tabBar .tab").eq(1).addClass("active");
            $("#leftCol .tabBar .tab").eq(0).removeClass("active");
            $("#form-upload-image").hide();
            $(".field-video").show();
            $("#type-post").val(2);
        });
    });
    
</script>
<div class="row content-post page-upload-content">
    <div class="col-md-8">
        <div id="leftCol">
            <div class="tabBar">
                <div class="tab active">
                    <a  style=" display: block;"><span class="icon photo"></span>Đăng ảnh</a>
                </div>
                <div class="tab">
                    <a  style="display: block;"><span class="icon video"></span>Đăng video</a>
                </div>
            </div>
            <div style="position: relative" class="submitForm">
                <h1 class="title">Đăng ảnh mới</h1>
                <div class="content form_photo">
                        <input type="hidden" value="1" id="type-post">
                        <form id="form-upload-image" method="post" enctype="multipart/form-data" action=""  >
                        <div class="field clearfix">
                            <label>Chọn file ảnh<i class="required">*</i></label>
                            <input type="file" name="image" class="file" id="photo_file_upload">
                            <p class="info">
                                Chỉ hỗ trợ upload ảnh GIF, JPG hoặc PNG, Giới hạn dung lượng: 1024 KB.<br>
                                Giới hạn chiều rộng: 99999 PX, Giới hạn chiều cao: 99999 PX
                            </p>
                        </div>
                        </form>
                        <div class="field field-video"  style="display: none">
                            <label>Link youtube<i class="required">*</i></label>
                            <input id="videoLink" type="text" maxlength="180" placeholder="Copy link Video & Ctrl + V dán vào đây" value="" name="title" class="text">
                            <p class="info">
                                Tiêu đề hoặc mô tả thú vị sẽ thu hút nhiều vote và chia sẻ hơn.
                            </p>
                        </div>
                        <div class="field">
                            <label>Tiêu đề bài viết<i class="required">*</i></label>
                            <input id="titlePost" type="text" maxlength="180" placeholder="Nhập tiêu đề (Trên 3 kí tự &amp; không quá 150 kí tự)" value="" name="title" class="text" >
                            <p class="info">
                                Tiêu đề hoặc mô tả thú vị sẽ thu hút nhiều vote và chia sẻ hơn.
                            </p>
                        </div>
                        
                        <div class="field">
                            <input type="checkbox" value="1" name="issex">
                            <strong>Hình này có nội dung nhạy cảm !!!</strong>
                        </div>
                        <div class="field">
                            <input type="checkbox" value="1" name="isme">
                            <strong>Hình này do tui tự làm (Chỉ tick nếu ảnh do bạn tự chế, tự chụp, tự vẽ ...) !!!</strong>
                        </div>
                        <div class="field">
                            <label>Nguồn của ảnh</label>
                            <input type="text" maxlength="300" placeholder="Nhập nguồn (Trên 3 kí tự &amp; không quá 200 kí tự)" value="" name="source" id="source" class="text tipped">
                        </div>
                        
                        
                        <div style="font-weight:bold; color:#FF0000;" class="field">
                            * Bài đăng được bình chọn HAY sẽ được đưa lên TRANG CHỦ đấy !
                        </div>
                        
                        
                        <div class="gray-line"></div>
                        <button title="Đăng ngay và luôn" style="border: 0px;cursor: pointer;" id="btnSubmit" type="button" onclick="jVozDesign.uploadPost();"><img src="http://vuivatva.vn/images/submit.png"></button>
                        <a href="<?php echo get_site_url(); ?>" title="Hủy bỏ" style="border: 0px;cursor: pointer;" id="btnCancel"><img src="http://vuivatva.vn/images/cancel.png"></a>
                        
                        <div class="clear">
                        </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>

<?php get_sidebar('page'); ?>
</div><!--#row -->
<?php get_footer(); ?>