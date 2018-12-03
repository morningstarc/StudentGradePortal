<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
$userid = $_GET["userid"];
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
            <div class="p-lg-0">
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <!-- CONTENT -->

             <?
$q_userid = $_GET["userid"];


// Fetech the record to be deleted and display it
$sql = "select userid, fname, lname, password, usertype from Users where userid = '$q_userid'";
//echo($sql);

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

if (!($values = oci_fetch_array ($cursor))) {
  // Record already deleted by a separate session.  Go back.
  Header("Location:user_list.php?sessionid=$sessionid");
}
oci_free_statement($cursor);

$userid = $values[0];
$fname = $values[1];
$lname = $values[2];
$password = $values[3];
$usertype = $values[4];

// Display the record to be deleted.
echo("
  <form class = \"form\" method=\"post\" action=\"user_delete_action.php?sessionid=$sessionid\">
  UserId: <input class= \"form-control\" type=\"text\" readonly value = \"$userid\" size=\"20\" maxlength=\"20\" name=\"userid\"> <br /> 
  First Name: <input class= \"form-control\" type=\"text\" readonly value = \"$fname\" size=\"20\" maxlength=\"30\" name=\"fname\">  <br />
  Last Name: <input class= \"form-control\" type=\"text\" readonly value = \"$lname\" size=\"20\" maxlength=\"30\" name=\"lname\">  <br />
  User Type: <input class= \"form-control\" type=\"text\" readonly value = \"$usertype\" size=\"5\" maxlength=\"1\" name=\"usertype\">  <br />
  Password: <input class= \"form-control\" type=\"text\" readonly value = \"$password\" size=\"20\" maxlength=\"12\" name=\"password\">  <br />
  <button type=\"submit\" name=\"submit\" class=\"btn\">Delete</button>
  </form>
</p>
  <form method=\"post\" action=\"user_list.php?sessionid=$sessionid\">
   <button type=\"submit\" name=\"submit\" class=\"btn\">Go Back</button>
  </form>
  ");
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>




<?  include "footer.php"; ?>
