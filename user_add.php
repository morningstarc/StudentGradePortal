<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);


?>
<?  include "htmlheader.php"; ?>
<body id="page-top">

<!-- Navigation -->
<?  include "nav.php"; ?>

<!-- Header -->
<?  include "header.php"; ?>
<!-- welcome Section -->
<section class="portfolio" id="login">
    <div class="container">


        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <!-- CONTENT -->

             <?
// Get values for the record to be added if from emp_add_action.php
$userid = $_POST["userid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$password = $_POST["password"];

// display the insertion form.
echo("
    
  <form method=\"post\" action=\"user_add_action.php?sessionid=$sessionid\">
      <div class=\"form-group\">
      <label for=\"form-user-id\">UserId (Required, up to 10 digits):</label>
      <input type=\"text\" value = \"$userid\" size=\"20\" maxlength=\"20\" name=\"userid\" placeholder=\"User ID...\" class=\"form-control\" id=\"form-user-id\"> 
      <label for=\"form-first-name\">First Name</label>
      <input type=\"text\" value = \"$fname\" size=\"30\" maxlength=\"30\" name=\"fname\" placeholder=\"First name...\" class=\"form-control\" id=\"form-first-name\"> 
      <label for=\"form-last-name\">Last Name</label>
       <input type=\"text\" value = \"$lname\" size=\"30\" maxlength=\"30\" name=\"lname\" placeholder=\"Last name...\" class=\"form-control\" id=\"form-last-name\">
       <label for=\"form-password\">Password</label>
       <input type=\"text\" value = \"$password\" size=\"5\" maxlength=\"1\" name=\"password\" placeholder=\"Password...\" class=\"form-control\" id=\"form-password\">
       <label for=\"form-student\">Student</label>
        <select class=\"form-control\" value='$student'>
        <option>Y</option>
        <option>N</option>
        </select>
        <label for=\"form-admin\">Admin</label>
        <select class=\"form-control\" value='$admin'>
        <option>Y</option>
        <option>N</option>
        </select>
        </div>
  ");
echo ("
<div class=\"form-row\" >
  
    <div class=\"col-xs-4 d-inline-block\">
      <form class='form-inline' method='post' action='user_add_action.php?sessionid=$sessionid'>
        <div class=\"input-group\">
          <span class=\"input-group-btn\">
            <button type='submit' class=\"btn-sm btn-primary\" type=\"button\">Add User</button>
          </span>
        </div>
      </form>
    </div>
    
    <div class=\"col-xs-4 d-inline-block\">
      <form class='form-inline' method='post' action='manage.php?sessionid=$sessionid'>
        <div class=\"input-group\">
          <span class=\"input-group-btn\">
            <button type='submit' class=\"btn-sm btn-warning\" type=\"button\">Go Back</button>
          </span>
        </div>
      </form>
    </div>
    
     <div class=\"col-xs-4 d-inline-block\">
      <form class='form-inline' method='post' action='user_add.php?sessionid=$sessionid'>
        <div class=\"input-group\">
          <span class=\"input-group-btn\">
            <button type='reset' class=\"btn-sm btn-danger\" type=\"button\">Reset</button>
          </span>
        </div>
      </form>
    </div>
    
  </div>

"); ?>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>





<!-- Footer -->
<?  include "footer.php"; ?>