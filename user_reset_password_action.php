<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

// Obtain information for the record to be updated.
$userid = $_POST["userid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$student = $_POST["student"];
$admin = $_POST["admin"];



// Form the sql string and execute it.
$sql = "update Users set password = '$userid' where userid = '$userid'";
//echo($sql);

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];
if ($result == false){
    display_oracle_error_message($cursor);
    die("Query Failed.");
}

echo ("
  <form class=\"form\" method=\"post\" action=\"user_reset_password?sessionid=$sessionid\">

  <input class=\"form-control\" type=\"hidden\"  value = \"1\" name=\"update_fail\">
  <input class=\"form-control\" type=\"hidden\"  value = \"$userid\" name=\"userid\">
  <input class=\"form-control\" type=\"hidden\"  value = \"$fname\" name=\"fname\">
  <input class=\"form-control\" type=\"hidden\"  value = \"$lname\" name=\"lname\">
  <select class=\"form-control\" type=\"hidden\"  value = \"$student\" name=\"student\">
  <select class=\"form-control\" type=\"hidden\"  value = \"$admin\" name=\"admin\">
  <input class=\"form-control\" type=\"hidden\"  value = \"$password\" name=\"password\">
  
  Read the error message, and then try again:
  <input type=\"submit\" value=\"Go Back\">
  </form>

  ");


// Record updated.  Go back.
Header("Location:manage.php?sessionid=$sessionid");