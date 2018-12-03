<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);

?>
<?  include "htmlheader.php"; ?>
<body id="page-top">

<!-- Navigation -->
<?  include "nav.php"; ?>

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
           <div class = "col-md-1"></div>
           <div class = "col-md-10">
            <table class="table">
               <!-- -->



               <table class = "table">
                <tr style = 'font-weight:bold'>
				<th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Password</th>
				<th>Student Flag</th>
				<th>Admin Flag</th>
				<th>Update User</th>
                <th>Reset Password to Default</th>
				<th>Delete User</th>




				<? if($usertype == 'a' || $usertype == 'b'){
                    echo("
  <div class=\"form-row\" >
  
    <div class=\"col-xs-4 d-inline-block\">
      <form class='form-inline' method='post' action='user_list.php?sessionid=$sessionid'>
        <div class=\"input-group\">
          <input type=\"text\" size=\"10\" maxlength=\"10\" name=\"q_userid\"> &nbsp;
          <span class=\"input-group-btn\">
            <button type='submit' class=\"btn-sm btn-primary\" type=\"button\">Search</button>
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
            <button type='submit' class=\"btn-sm btn-info\" type=\"button\">Add User</button>
          </span>
        </div>
      </form>
    </div>
    
  </div>
            </br>    
				");
				// Interpret the query requirements
				$q_userid = $_POST["q_userid"];

				$whereClause = " 1=1 ";


				if (isset($q_userid) and trim($q_userid) != "") {
  				$whereClause .= " and userid = '$q_userid'";
				}





					// Form the query and execute it
					$sql = "select userid, fname, lname, password, student, admin from Users where $whereClause order by lname";
					//echo($sql);

					$result_array = execute_sql_in_oracle ($sql);
					$result = $result_array["flag"];
					$cursor = $result_array["cursor"];

					if ($result == false){
						display_oracle_error_message($cursor);
						die("Client Query Failed line 158 user_list.");
					}


                // Fetch the result from the cursor one by one
					while ($values = oci_fetch_array ($cursor)){
						$userid = $values[0];
						$fname = $values[1];
						$lname = $values[2];
						$password = $values[3];
						$student = $values[4];
						$admin = $values[5];


						echo "<tr> ".
						"<td>$userid</td> ".
						"<td>$fname</td> ".
						"<td>$lname</td> ".
						"<td>$password</td> ".
						"<td>$student</td> ".
						"<td>$admin</td> ".

						"<td><a href=\"user_update.php?sessionid=$sessionid&userid=$userid\" class=\"btn btn-primary\" role=\"button\">Update User</a></td> ".
						"<td><a href=\"user_reset_password_action.php?sessionid=$sessionid&userid=$userid\" class=\"btn btn-warning\" role=\"button\">Reset Password</a></td> ".
						"<td><a href=\"user_delete.php?sessionid=$sessionid&userid=$userid\" class=\"btn btn-danger\" role=\"button\">Delete User</a></td> ".
						"</tr>";
					}
						oci_free_statement($cursor);
						echo "</table>";
				}
				?>
            </table>
           </div>
           <div class = "col-md-1"></div>
       </div>
    </div>
</section>





<!-- Footer -->

<?  include "footer.php"; ?>