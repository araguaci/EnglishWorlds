    function validateLoginForm()
    {
      var username = document.forms["loginForm"]["user_login"].value;
      var password = document.forms["loginForm"]["password_login"].value;
      if (username==null || username=="",password==null || password=="")
        {
          var div = document.createElement("div");
          div.className = "alert alert-danger";
          div.style.width = "250px";
          div.innerHTML = "Please fill your login credentials";
          document.loginForm.appendChild(div);
          return false;
          }
    }
    function checkRegister()
    {
        var f = document.forms["Registration"].elements;
        var cansubmit = true;
        for (var i = 0; i < f.length; i++) {
            if (f[i].value.length == 0) cansubmit = false;
        }
        if (cansubmit) {
            document.getElementById('register').disabled = false;
        }
    }
    function focusRegister() {
        var input = document.forms["Registration"].elements;
        var error = false;
        for (var i = 0; i < input.length; i++) {
          if (input[i].value.length == 0) {
            document.getElementsByClassName('glyphicon glyphicon-exclamation-sign hidden');
          }
        }
    }
