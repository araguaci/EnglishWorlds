$(document).ready(function(){
  $('#login').click(function(){
    var username = $('#username').val();
    var password = $('#password').val();

    if ($.trim(username).length > 0 && $.trim(password).length > 0) {
      $.ajax({
        url:"login.php",
        method:"POST",
        data:{username:username, password:password},
        cache: false,
        beforeSend:function(){
          $('#login').val("Connecting...");
        },
        success:function(data){
          if (data) {
            $("body").load("home.php").hide().fadeIn(1500);
          } else {
            // Shake animation effect
            var options = {
              distance: '40',
              direction: 'left',
              times:'3'
            }
            $("#box").effect("shake", options, 800);
            $('#login').val("Login");
            $('#error').html("<span class='text-danger'>Invalid username or Password</span>");
          }
        }
      });
    } else {
      return false;
    }
  });
});
