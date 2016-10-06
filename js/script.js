function validateLoginForm()
    {
      var username = document.forms["loginForm"]["user_login"].value;
      var password = document.forms["loginForm"]["password_login"].value;
      if (username==null || username=="",password==null || password=="")
        {
          // Set bootstrap warning.
        alert("Please check all fields");
        return false;
        }
    }
