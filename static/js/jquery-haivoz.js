/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('ready', function(){
//    $( window ).resize(function() {
////        console.log("Handler for .resize() called.</div>" );
//      });


    $("#menu .menu li").mouseover(function(){
        $(this).addClass("hover");
    }).mouseout(function(){
        $(this).removeClass("hover");
    });
    
    //progress upload start
    $('.avatar-container').on('click',function(){
        
        if ($(this).find('.info').length <= 0) {
            $(this).append('<div class="info"><div class="info-inner"></div></div>');
        }
        
        var $info = $(this).find('.info'),
        $inner= $(this).find('.info-inner'),
        $p    = $(this).attr("class").match(/p-\w+/).toString().substring(2);
        
        $inner.text($p+'%');
        $info.toggleClass('js-active');
    });
    //progress upload end
    $('#remind-modal .btn-close').click(function(){
         $('#remind-modal').modal('toggle');
    });
    
    //handle time show dialog wake up _ start
    var timeoutTime = 180000;
    var timeoutTimer = setTimeout(function(){
        $('#remind-modal').modal({show:true});
    }, timeoutTime);
    $('body').bind('mousemove', function(event) {
        clearTimeout(timeoutTimer);
        timeoutTimer = setTimeout(function(){
            $('#remind-modal').modal({show:true});
        }, timeoutTime);
    });
    //handle time show dialog wake up _ end
});

var jVozDesign = {
    _maxTitle:120,
    _maxSizeFile:1,
    _imagePost:1,
    _linkPost:2,
    _validFileExtensions : [".jpg", ".jpeg", ".bmp", ".gif", ".png"], 
    //control component in upload form
    changeTypePost: function (type){
        if(type != null){
            $("#type-post").val(type);
            if(type == this._imagePost){
                $("#imageUploadPanel").show();
                $("#linkUploadPanel").hide();
                $("#photoTips").show();
                $("#videoTips").css("display","none");
                $("#clickSubmitVideo").removeClass('active');
                $("#clickSubmitPhoto").addClass('active');
            }else if(type == this._linkPost){
                $("#imageUploadPanel").hide();
                $("#linkUploadPanel").show();
                $("#photoTips").hide();
                $("#videoTips").show();
                $("#clickSubmitVideo").addClass('active');
                $("#clickSubmitPhoto").removeClass('active');
            }
            
        }
    },
    uploadPost : function (){
        this.isUserLoggedIn(function(){
            var typePost = $("#type-post").val();
            console.log("typePost:" + typePost);
            if(Number(typePost) == jVozDesign._imagePost){
                 jVozDesign.uploadContentPostAndImage();
            }else if(Number(typePost) == jVozDesign._linkPost){
                console.log("uploadContentPostWithLinkVideo0");
                jVozDesign.uploadContentPostWithLinkVideo();
            }
        });
    },
    isUserLoggedIn:function(callback){
        var data = {action : "isUserLoggedIn"};
        var type = "POST";
        haivoz.callFunction(type,data,function(data){
            console.log("data(isUserLoggedIn):" + data);
            if(data == "true0"){
                callback();
            }else{
                jVozDesign.modalVoz(languages.messageTitle,languages.messageNotLoggedIn);
            }
        });
    },
    //upload image
    uploadContentPostAndImage : function (){
        var title = $('#titlePost').val();
        var file = document.getElementById("photo_file_upload").files[0];
        var filename = document.getElementById("photo_file_upload").value;
        console.log( " title : " +title);
        if(this.validateTitlePost(title) && this.validateFileUpload(file, filename) ){
            jVozDesign.modalConfirmVoz(languages.messageTitleConfirm,languages.messageConfirm,function(){
                var formElement = document.getElementById("form-upload-image");
                var formData = new FormData();
                formData.append("fileUpload", file);
                formData.append("title", title);
                formData.append("action", "uploadContentPostAndImage");
                haivoz.uploadContentPostAndImage(formData);
            });
        }
    },
//    upload link video
    uploadContentPostWithLinkVideo : function () {
        console.log("uploadContentPostWithLinkVideo");
        var title = $('#titlePost').val();
        var urlTube = $('#videoLink').val();
        if(this.validateTitlePost(title) && this.validateUrlPost(urlTube)){
            if(this.validateYoutubeUrl(urlTube)){
                var content = urlTube.split("=")[1].split("&")[0];
                content = "youtube@@@@@"+content;
                jVozDesign.modalConfirmVoz(languages.messageTitleConfirm,languages.messageConfirm,function(){
                    haivoz.uploadContentPostAndVideo(title,content);
                });
            }else{
                jVozDesign.modalVoz(languages.messageTitle,languages.messageFormatVideoUrlNotSupport);
            }
        }
    },
    validateTitlePost : function(content){
        if(content == null || content.trim() == '' ){
             $('#titlePost').focus();
             jVozDesign.modalVoz(languages.messageTitle,languages.messageTitlePostIsNull);
            return false;
        }
        if(content.trim().length >this._maxTitle ){
             $('#titlePost').focus();
            jVozDesign.modalVoz(languages.messageTitle,languages.messageTitleTooMaxLength);
            return false;
        }
        return true;
    },
    validateUrlPost : function(url){
        if(url == null || url.trim() == ""){
            jVozDesign.modalVoz(languages.messageTitle,languages.messageUrlPostNull);
            $('#videoLink').focus();
            return false;
        }
        return true;
    },
    validateYoutubeUrl : function(url){
        var matches = url.match(/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/);
        if (matches) {
            return true;
        } else {
            return false;
        }
    },
    validateFileUpload : function(file, filename){
        if(file == null){
            jVozDesign.modalVoz(languages.messageTitle,languages.messageNotSelectFile);
            return false;
        }else{
            if (filename.length > 0) {
                var blnValid = false;
                for (var j = 0; j < this._validFileExtensions.length; j++) {
                    var sCurExtension = this._validFileExtensions[j];
                    if (filename.substr(filename.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    jVozDesign.modalVoz(languages.messageTitle,languages.messageSorry + filename + languages.messageInvalidExtensions + this._validFileExtensions.join(", "));
                    return false;
                }
            }
            if((file.size/(1024*1024)) > this._maxSizeFile){//byte
                jVozDesign.modalVoz(languages.messageTitle,languages.messageTooSizeFile + this._maxSizeFile + "MB");
                return false;
            }
            return true;
        }
    },
    videoYoutubeExist: function(url) {
        $.ajax({
            url: "https://www.googleapis.com/youtube/v3/videos",
            type: "GET",
            xhrFields: {
                withCredentials: true
            },
            cache: false,
            data: {
                id: function() {
                    var url = url;
                    var regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(\S+)?$/;
                    return (url.match(regex)) ? RegExp.$1 : false;
                },
                part:'snippet',
                key:'AIzaSyCGC8aOQSv0uugJtZvj5sgVI-jTT72R4Jo'
            },
            dataFilter: function(response) {
                if(response){
                    response = jQuery.parseJSON(response);
                    if(response && response.pageInfo && response.pageInfo.totalResults && (response.pageInfo.totalResults > 0)){
                        return true;
                    }
                }
                return false;
            }
        });
    },
    videoClick:function(videoId){
        youtubeAPI.onYouTubePlayerAPIReady(videoId);
    },
    settingShowImage:function(element){
        if($(element).hasClass("selected")){
            $("#setting-image-show-style").hide();
            $(element).removeClass("selected");
        }else{
            $("#setting-image-show-style").show();
            $(element).addClass("selected");
            
        }
    },
    modalVoz:function(modalHeader, modalContent){
        $('#myModal .modal-title').text(modalHeader);
        $('#myModal .modal-body').html(modalContent);
        $('#myModal').modal({show:true});
    },
    modalConfirmVoz:function(modalHeader, modalContent , callback){
        $('#myModalConfirm .modal-title').text(modalHeader);
        $('#myModalConfirm .modal-body').html(modalContent);
        $('#myModalConfirm').modal({show:true});
        $('#myModalConfirm .modal-footer .yes').unbind("click");
        $('#myModalConfirm .modal-footer .yes').click(function(){
            callback();
        });
    },
    loadItemPost:function(){
        haivoz.loadItemPost();
    },
    linkToForum:function(){
        window.open('https://vozforums.com/','_blank');
    }
}