<?
include "utility_functions.php";

// Get the client id and password and verify them
$userid = $_POST["userid"];
$password = $_POST["password"];

$sql = "select userid " .
       "from Users " .
       "where userid='$userid'
         and password ='$password'";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

if($values = oci_fetch_array ($cursor)){
  oci_free_statement($cursor);

  // found the client
  $userid = $values[0];

  // create a new session for this client
  $sessionid = md5(uniqid(rand()));

  // store the link between the sessionid and the clientid
  // and when the session started in the session table

  $sql = "insert into LoginSession " .
    "(sessionid, userid, sessiondate) " .
    "values ('$sessionid', '$userid', sysdate)";

  $result_array = execute_sql_in_oracle ($sql);
  $result = $result_array["flag"];
  $cursor = $result_array["cursor"];

  if ($result == false){
    display_oracle_error_message($cursor);
    die("Failed to create a new session");
  }
  else {

      // insert OK - we have created a new session
	  header("Location:manage.php?sessionid=$sessionid");
  }
}
else {
  // client username not found
  die ('Login failed.  Click <A href="index.html">here</A> to go back to the login page.');
}
?>