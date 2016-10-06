function validateLoginForm()
    {
      var username = document.forms["loginForm"]["user_login"].value;
      var password = document.forms["loginForm"]["password_login"].value;
      if (username==null || username=="",password==null || password=="")
        {
          // Set bootstrap warning.
          var div = document.createElement("div");
          div.className = "alert alert-danger";
          div.role = "alert";
          div.style.width = "100px";
          div.style.height = "100px";
          div.style.background = "red";
          div.style.color = "white";
          div.innerHTML = "Hello";
          document.body.appendChild(div);
          alert("Please check all fields");
          return false;
          }
    }
