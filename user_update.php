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
<header class="masthead bg-primary text-white text-center">
    <div class="container">

        <h1 class="text-uppercase mb-0">Update Account</h1>

        <hr class="star-light">
    </div>
</header>
<!-- welcome Section -->
<section class="portfolio" id="login">
    <div class="container">

        <div class="row">
            <div class="p-lg-0">
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <!-- CONTENT -->

             <?
            $q = current_user($sessionid);
            $uid = $q[0];
            // the sql string

              // Verify where we are from, user_list.php or  user_update_action.php.
             if (!isset($_POST["update_fail"])) { // from employee.php
			   $uid = $_GET["userid"];
                  //Fetch the record to be updated.
                 $sql = "select userid, fname, lname, password, student, admin from Users where userid = '$uid'";
                //echo($sql);

                $result_array = execute_sql_in_oracle ($sql);
                $result = $result_array["flag"];
                $cursor = $result_array["cursor"];

                if ($result == false){
                display_oracle_error_message($cursor);
                die("Query Failed.");
                }

                $values = oci_fetch_array ($cursor);
                oci_free_statement($cursor);

                $userid = $values[0];
                $fname = $values[1];
                $lname = $values[2];
                $password = $values[3];
				$student = $values[4];
				$admin = $values[5];
                }
                else { // from user_update_action.php
                // Obtain values of the record to be updated directly.
                $userid = $_POST["userid"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $password = $_POST["password"];
				$student = $_POST["student"];
				$admin = $_POST["admin"];
                }
				if($current_userid == $userid){ 
                // Display the record to be updated.
					echo("
	<form class=\"form\" method=\"post\" action=\"user_update_action.php?sessionid=$sessionid\">
	<div class=\"form-group\">
      <label for=\"form-user-id\">UserId</label>
      <input type=\"text\" value = \"$userid\" maxlength=\"20\" name=\"userid\" class=\"form-control\" id=\"form-user-id\"> 
      <label for=\"form-first-name\">First Name</label>
      <input type=\"text\" value = \"$fname\"  maxlength=\"30\" name=\"fname\" class=\"form-control\" id=\"form-first-name\"> 
      <label for=\"form-last-name\">Last Name</label>
       <input type=\"text\" value = \"$lname\"  maxlength=\"30\" name=\"lname\" class=\"form-control\" id=\"form-last-name\">
       <label for=\"form - password\">Password</label>
       <input type=\"text\" value = \"$password\"  maxlength=\"10\" name=\"password\" class=\"form-control\" id=\"form-password\">
       <label for=\"form-student\">Student</label>
        <select class=\"form-control\" id='student' name='student'>
        <option value='Y'>Y</option>
        <option value='N'>N</option>
        </select>
        <label for=\"form - admin\">Admin</label>
        <select class=\"form-control\" id='admin' name='admin'>
        <option value='Y'>Y</option>
        <option value='N'>N</option>
        </select>
    </div>
        </form>
					");
				} else {
					                // Display the record to be updated.
					echo("
<form class=\"form\" method=\"post\" action=\"user_update_action.php?sessionid=$sessionid\">
                <form class=\"form-group\">
                    <label for=\"form-user-id\">UserId</label>
                    <input type=\"text\" value = \"$userid\" maxlength=\"20\" name=\"userid\" class=\"form-control\" id=\"form-user-id\">
                    <label for=\"form-first-name\">First Name</label>
                    <input type=\"text\" value = \"$fname\"  maxlength=\"30\" name=\"fname\" class=\"form-control\" id=\"form-first-name\">
                    <label for=\"form-last-name\">Last Name</label>
                    <input type=\"text\" value = \"$lname\"  maxlength=\"30\" name=\"lname\" class=\"form-control\" id=\"form-last-name\">
                    <label for=\"form - password\">Password</label>
                    <input type=\"text\" value = \"$password\"  maxlength=\"10\" name=\"password\" class=\"form-control\" id=\"form-password\">
                    <label for=\"form-student\">Student</label>
                    <select class=\"form-control\" value='$student' name='student'>
                        <option>Y</option>
                        <option>N</option>
                    </select>
                    <label for=\"form - admin\">Admin</label>
                    <select class=\"form-control\" value='$admin' name='admin'>
                        <option>Y</option>
                        <option>N</option>
                    </select>

				 
            </br>
        <div class=\"form-row\" >
                <div class=\"col-xs-4 d-inline-block\">
                    <div class=\"input-group\">
                    <span class=\"input-group-btn\">
                    <button type='submit' class=\"btn-sm btn-primary\" type=\"button\">Update</button>
                    </span>
                </div>
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
</form>
        "); }?>

    </div>

            <div class="col-md-4"></div>
        </div>
    </div>
    </div>
</section>





<!-- Footer -->
<?  include "footer.php"; ?>