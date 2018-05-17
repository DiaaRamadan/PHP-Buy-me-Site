$(document).ready(function(){
    'use strict';

     //Calls the selectBoxIt method on your HTML select box and updates the showEffect option
     $(function() {
        $("select").selectBoxIt({ showEffect: "fadeIn" ,
            autoWidth: false
        });
      });

    //Function use to display and hidden the placeholder in focus and blur
    $('[placeholder]').focus(function(){
            $(this).attr('data-text', $(this).attr('placeholder'));
            $(this).attr('placeholder', "");
         }).blur(function(){
            $(this).attr('placeholder',$(this).attr('data-text'));
    });

    //replace the active class in navbar with links
  

   $(".navbar .links li a").click(function () {
        $(this).parent().addClass("active").siblings().removeClass("active");
    });


    //login form display and hidden
   $(".login-link-nav .login-nav").click(function(){
        $(".login-arrow").fadeToggle();
        $(".login-form-nav").fadeToggle();
        $(".register-arrow").fadeOut();
        $(".register-form-nav").fadeOut();
        $(this).toggleClass('login-color');
        $(".login-link-nav .fa-login").toggleClass('login-color');
        $(".login-link-nav .register-nav").removeClass('sign-color');
        $(".login-link-nav .fa-sign").removeClass('sign-color');
   });
   //register form display and hidden
   $(".login-link-nav .register-nav").click(function(){
        $(".register-arrow").fadeToggle();
        $(".register-form-nav").fadeToggle();
        $(".login-arrow").fadeOut();
        $(this).toggleClass('sign-color');
        $(".login-link-nav .fa-sign").toggleClass('sign-color');
        $(".login-link-nav .login-nav").removeClass('login-color');
        $(".login-link-nav .fa-login").removeClass('login-color');
    });

    // Change between fa-plus and fa-minus in catagory page

    $(".toggle-info").click(function(){
        $(this).toggleClass('selected');
        if($(this).hasClass('selected')){
            $('.cat .panel-body').fadeIn(800);
            $(this).html('<i class="fa fa-plus cat-show-hide"></i>')
        }else{
            $('.cat .panel-body').fadeOut(800);
            $(this).html('<i class="fa fa-minus cat-show-hide"></i>')

        }
    });
});