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
