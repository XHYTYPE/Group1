//button-login
document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        
    });
});

//btn-contact
jQuery(function($){
    $("#contact-btn").click(function() {
      $("#contactOverlay").fadeIn();
    });
    $("#closeContactForm").click(function() {
      $("#contactOverlay").fadeOut();
    });
    $(".contact-form").click(function(event){
      event.stopPropagation();
    });
  });

  //btn-forgotpass
  jQuery(function($){
    $("#forgotpass").click(function() {
      $("#forgotpassOverlay").fadeIn();
    });
    $("#closeForgotForm").click(function() {
      $("#forgotpassOverlay").fadeOut();
    });
    $(".forgotpass-form").click(function(event){
      event.stopPropagation();
    });
  });

  //btn-edit-info
  jQuery(function($){
    $("#edit-info-btn").click(function() {
      $("#editOverlay").fadeIn();
    });
    $("#closeForgotForm").click(function() {
      $("#editOverlay").fadeOut();
    });
    $(".edit-info-form").click(function(event){
      event.stopPropagation();
    });
  });





