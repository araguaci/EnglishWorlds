  <?php
    ob_start();
    require_once './inc/header.inc.php';
    $buffer = ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","Register",$buffer);
    echo $buffer;
  ?>
  <div class="container padding-top-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        Registration
      </div>
      <div class="panel-body">
         <form class="" action="index.html" method="post">
           <label for="firstName" class="control-label">Name:</label>
           <div class="row padding-top-10">
             <div class="col-md-6">
               <input type="text" class="form-control" id="firstName" name="name" value="" placeholder="First Name">
             </div>
             <div class="col-md-6">
                <input type="text" class="form-control" id="lastName" name="name" value="" placeholder="Last Name">
             </div>
           </div>
           <label for="address1" class="control-label padding-top-10">Address:</label>
           <div class="row padding-top-10">
             <div class="col-md-12">
               <input type="text" class="form-control" id="address1" placeholder="Address Line 1" name="name" value="">
             </div>
           </div>
           <div class="row padding-top-10">
             <div class="col-md-12">
               <input type="text" class="form-control" id="address2" placeholder="Address Line 2" name="name" value="">
             </div>
           </div>
           <div class="row padding-top-10">
             <div class="col-md-6">
               <label for="city" class="control-label">City:</label>
             </div>
             <div class="col-md-2">
               <label for="stateorregion" class="control-label">State / Region:</label>
             </div>
             <div class="col-md-4">
               <label for="zipcode" class="control-label">Zip Code:</label>
             </div>
           </div>
           <div class="row padding-top-10">
             <div class="col-md-6">
               <input type="text" name="name" value="" class="form-control" id="city" placeholder="Your city">
             </div>
             <div class="col-md2">
               <input type="text" name="name" value="" class="form-control" id="stateorregion" placeholder="Your state / region">
             </div>
             <div class="col-md2">
               <input type="text" name="name" value="" class="form-control" id="zipcode" placeholder="Your zip code">
             </div>
           </div>
         </form>
      </div>
    </div>
  </div>
    <!-- <div id="Registration" style="width: 900px; float: center; margin: 0px auto 0px auto;">
            <h2>Sign Up Below!</h2>
            <form action="index.php" name="Registration" method="POST">
              <input type="text" name="fname" size="25" placeholder="First Name" onKeyup="checkRegister()" onblur="focusRegister()"><span class="glyphicon glyphicon-exclamation-sign hidden" aria-hidden="true" hidden="false"></span><br><br>
              <input type="text" name="lname" size="25" placeholder="Last Name" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="username" size="25" placeholder="Username" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="email" size="25" placeholder="Email Address" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="password" name="password" size="25" placeholder="Password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="password" name="password2" size="25" placeholder="Confirm your password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="birthdate" id="datepicker" value="2 Oct 1994" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <div>I am:
                <label class="radio-inline"><input type="radio" name="optradio" value="m">Male</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="f">Female</label>
              </div><br>
              <input type="submit" id="register" class="btn btn-sm" name="reg" value="Sign Up!" disabled="disabled"> -->
              <?php function fillFields()
              {
                echo '<div class="alert alert-danger" role="alert">Please fill in all of the fields</div>';
              } ?>
            <!-- </form>
    </div> -->
    <script src="./js/pikaday.js"></script>
    <script>
    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(1985, 0, 1),
        maxDate: new Date(2000, 12, 31),
        yearRange: [1985,2000]
    });
    </script>
  </body>
</html>
