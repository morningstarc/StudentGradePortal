<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

$userid = $_POST["userid"];

// Form the sql string and execute it.
$sql = "delete from Users where userid = '$userid'";
//echo($sql);

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  // Error handling interface.
  echo "<B>Deletion Failed.</B> <BR />";

  display_oracle_error_message($cursor);

  die("<i> 

  <form method=\"post\" action=\"user_list.php?sessionid=$sessionid\">
  Read the error message, and then try again:
  <button type = \"submit\">Go Back</button>
  </form>

  </i>
  ");
}

// Record deleted.  Go back.
Header("Location:user_list.php?sessionid=$sessionid");
?>