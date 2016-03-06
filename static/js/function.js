/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//function play() {
//    var video = document.getElementById("Video1");
//    if (video.paused) {
//        video.play();
//    } 
//}
//    
//function pause() {
//    var video = document.getElementById("Video1");
//    if (!video.paused) {
//        video.pause();
//    }
//}
//    
//function restart() {
//    var video = document.getElementById("Video1");
//    video.currentTime = 0;
//}
//    
//function skip(value) {
//    var video = document.getElementById("Video1");
//    video.currentTime += value;
//}  
//video control_end

var viewImageSmall = 1;
var offset = 1;
var loadingItemPost = 0;
var haivoz = {
    readCookie: function ()
    {
        var allcookies = document.cookie;
        document.write ("All Cookies : " + allcookies );
        
        // Get all the cookies pairs in an array
        cookiearray = allcookies.split(';');
        
        // Now take key value pair out of this array
        for(var i=0; i<cookiearray.length; i++){
            name = cookiearray[i].split('=')[0];
            value = cookiearray[i].split('=')[1];
            document.write ("Key is : " + name + " and Value is : " + value);
        }
    },
    WriteCookie:function ()
    {
        if( document.myform.customer.value == "" ){
            console.log("Enter some value!");
            return;
        }
        cookievalue= escape(document.myform.customer.value) + ";";
        document.cookie="name=" + cookievalue;
        document.write ("Setting Cookies : " + "name=" + cookievalue );
    },
    openLogin: function () {
        document.getElementById("overlay-container").style.display = "table";
    },
    closeModel: function() {
        document.getElementById("overlay-container").style.display = "none";
    },
    fbLogout : function(){
        var data = {action : "logout"};
        var type = "POST";
        this.callFunction(type,data,function(data){
            location.reload();
        });
    },
    fbLogin : function(){
        
       
        
    },
    login : function(username, password){
        console.log(username + ":" +password);
        var data = {action : "login",username:username, password:password};
        var type = "POST";
        this.callFunction(type,data,function(data){
            console.log("success:"+data);
//            location.reload();
        });
    },
    uploadImage : function(){
        var imageUrlLocation = document.getElementById("photo_file_upload").value;
        console.log(imageUrlLocation);
    },
    validateImageUpload : function(){
        
        var imageUrlLocation = document.getElementById("photo_file_upload");
        var file = imageUrlLocation.files[0];
        console.dir(file);
    },
    uploadContentPostAndImage : function (formData){
        var type = "POST";
        console.dir(formData);
//        $("#uploading-state-id").show();
        var count_uploading = 0;
        $("#my-avatar-container").attr('class', 'avatar-container');
        $("#my-avatar-container").addClass("p-" + count_uploading);
        $("#myRotator").modal({ backdrop: 'static', keyboard: false });
        var intervalUpload = setInterval(function(){
            if(count_uploading < 100){
                count_uploading ++;
            }else{
                count_uploading = 100;
                clearInterval(intervalUpload);
            }
            $("#my-avatar-container").attr('class', 'avatar-container');
            $("#my-avatar-container").addClass("p-" + count_uploading);
        }, 1000);
        $.ajax({
                url: 'http://localhost/wordpress/wp-admin/admin-ajax.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                type: 'post',
                success: function(data){
                     $("#uploading-state-id").hide();
                    if(data != ""){
                        console.log("PostId : " + data);
                        //change status uploading start
                        count_uploading = 100;
                        $("#my-avatar-container").attr('class', 'avatar-container');
                        $("#my-avatar-container").addClass("p-" + count_uploading);
                        clearInterval(intervalUpload);
                        setTimeout(function(){
                            $("#myRotator").modal('toggle');
                            jVozDesign.modalVoz(languages.messageTitle,languages.messagePostSuccess);
//                          window.location = systemConfig.linkRedirect;
                        }, 1000);
                        //change status uploading end
                        
                    }else{
                        jVozDesign.modalVoz(languages.messageTitle,languages.messagePostFail);
                    }
                }
        });
        
    },
    uploadContentPostAndVideo : function(content , idVideoTube){
        var data = {action : "uploadContentPostAndVideo",content:content,idVideoTube:idVideoTube};
        var type = "POST";
//        $("#uploading-state-id").show();
        var count_uploading = 0;
        $("#my-avatar-container").attr('class', 'avatar-container');
        $("#my-avatar-container").addClass("p-" + count_uploading);
        $("#myRotator").modal({ backdrop: 'static', keyboard: false });
        var intervalUpload = setInterval(function(){
            if(count_uploading < 100){
                count_uploading ++;
            }else{
                count_uploading = 100;
                clearInterval(intervalUpload);
            }
            $("#my-avatar-container").attr('class', 'avatar-container');
            $("#my-avatar-container").addClass("p-" + count_uploading);
            
        }, 1000);
        this.callFunction(type,data,function(data){
            $("#uploading-state-id").hide();
            if(data != ""){
                console.log("PostId : " + data);
                //change status uploading start
                count_uploading = 100;
                $("#my-avatar-container").attr('class', 'avatar-container');
                $("#my-avatar-container").addClass("p-" + count_uploading);
                clearInterval(intervalUpload);
                setTimeout(function(){
                    $("#myRotator").modal('toggle');
                    jVozDesign.modalVoz(languages.messageTitle,languages.messagePostSuccess);
//                  window.location = systemConfig.linkRedirect;
                }, 1000);
                
                //change status uploading end
                
            }else{
                jVozDesign.modalVoz(languages.messageTitle,languages.messagePostFail);
            }
        });
    },
    loginWithFacebook : function(userId, name , email, firstName,lastName, link){
        console.log("loginWithFacebook : " + name + "--" +email + "--" +firstName + "--" +lastName + "--" +link + "--" +userId );
        var data = {action : "loggedWithFacebook",username:userId,fullname:name,email:email,firstName:firstName,lastName:lastName,link:link };
        var type = "POST";
        this.callFunction(type,data,function(data){
            console.log("loginWithFacebook : " + data);
            if(data == "true0"){
                window.location = systemConfig.linkRedirect;
                console.log("thành công!");
            }else{
                jVozDesign.modalVoz(languages.messageTitle,languages.messageLoginNotSuccess);
            }
        });
    },
    callFunction : function (type, data, callback){
        $.ajax ({
            type: type,
            url: "http://localhost/wordpress/wp-admin/admin-ajax.php",
            data: data,
            success: callback
        });
    },
    changeStateViewImage:function (item){
        if(viewImageSmall == 1){
            $(item).removeClass("on");
            viewImageSmall = 0;
            $(".image-container").removeClass("add-cover-bottom");
            $(".cover-bottom-icon").hide();
        }else{
            $(item).addClass("on");
            viewImageSmall = 1;
            $(".image-container").addClass("add-cover-bottom");
            $(".cover-bottom-icon").show();
        }
    },loadItemPost:function(){
        var data = {action : "loadItemPost",offset:offset * 10,postsPerPage:10};
        var type = "POST";
        if(loadingItemPost == 0){
            loadingItemPost == 1;
            alert(loadingItemPost);
            $("#icon-load-item-post").show();
            haivoz.callFunction(type,data,function(data){
                $("#icon-load-item-post").hide();
                console.log("loadItemPost : " + data);
                var dataTemp = data.substring(0, data.length-1);
                if(dataTemp != "" || (dataTemp.length > 4 && dataTemp.substring(dataTemp.length -3 , dataTemp.length) != "NOK")){
                    offset = offset + 1;
                    $('.content-post .col-md-8 .content-item-post').append(dataTemp);
                }
                loadingItemPost == 0;
            });
        }
        
    }
    
}

var facebook ={
   statusChangeCallback: function (response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            console.log('------------OK-------------');
            console.dir(response);
            FB.api('/me', function(response) {
                console.dir(response);
                console.log('Successful login for: ' + response.name);
                haivoz.loginWithFacebook(response.id,response.name,response.email, response.first_name , response.last_name,response.link);
            });
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            console.log('Please log into this app');
            this.login();
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            console.log('Please log into Facebook');
            this.login();
        }
    },
    
    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    checkLoginState: function () {
        console.log("checkLoginState");
        FB.getLoginStatus(function(response) {
            facebook.statusChangeCallback(response);
        });
    },
    login: function (){
        FB.login(function(response) {
           if (response.authResponse) {
              // proceed
           } else {
              // not auth / cancelled the login!
           }
        });
    }
}
var autoPlayNextVideo = 1;
var player;
var youtubeAPI = {
//     : new YT.Player('player',null),
    onYouTubePlayerAPIReady: function (videoId) {
//        console.log("onYouTubePlayerAPIReady:" +videoId );
        setTimeout(function(){
            player = new YT.Player('player', {
                height: "100%",
                width: "100%",
                videoId: videoId,//'0Bmhjf0rKe8',
                playerVars: {
                    showinfo: 0,
                    //                modestbranding:1,
                    nologo:1,
                    iv_load_policy:3,
                    autoplay:1,
                    rel:0
                },
                events: {
                    onReady: youtubeAPI.onPlayerReady,
                    onStateChange: youtubeAPI.onPlayerStateChange
                }
            });
        }, 1000);
        $("#player").css("height",$("#player").width()*56.25/100 +"px");
    },
    // autoplay video
    onPlayerReady:function (event) {
        event.target.playVideo();
    },
    // when video ends
    onPlayerStateChange:function (event) { 
//        console.log("done:" + autoPlayNextVideo);
        if(event.data === 0 && autoPlayNextVideo ==1) {  
//            console.log("done:" + autoPlayNextVideo);
            setTimeout(function(){
                $('.list_video').find('.playing').next().trigger('click');
            }, 1000);
        }
    },
    reloadVideo: function (item){
        player.loadVideoById($(item).attr("videoId"));
        $(".list_video").find("div").removeClass("playing");
        $(item).addClass("playing");
        var container = $('.list_video'),
            scrollTo = $(item);

        container.animate({
            scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
        });
        $("#titleVideoMain").html($(item).find("h4").html());
        
    },
    changeStateAutoPlayVideo:function (item){
        if(autoPlayNextVideo == 1){
            $(item).removeClass("on");
            autoPlayNextVideo = 0;
        }else{
            $(item).addClass("on");
            autoPlayNextVideo = 1;
        }
    }
}