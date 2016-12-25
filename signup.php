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
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
              <?php function fillFields() {
                echo '<div class="alert alert-danger" role="alert">Please fill in all of the fields</div>';
              } ?>
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
