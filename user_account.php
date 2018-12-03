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

                <h1 class="text-uppercase mb-0">Account Details</h1>

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
            <div class = "col-md-1"></div>
            <div class = "col-md-10">
                <table class="table">
                    <?

                    $q = current_user($sessionid);
                    $uid = $q[0];
                    //Fetch the record to be updated.
                    $sql = "select userid, fname, lname, password, student, admin from users where userid='$uid'";
                    //echo($sql);

                    $result_array = execute_sql_in_oracle ($sql);
                    $result = $result_array["flag"];
                    $cursor = $result_array["cursor"];

                    if ($result == false){
                        display_oracle_error_message($cursor);
                        die("Query Failed.");
                    }
                    while ($values = oci_fetch_array ($cursor)){
                        $current_userid = $values[0];
                        $current_fname = $values[1];
                        $current_lname = $values[2];
                        $current_password = $values[3];
                        $current_studentflag = $values[4];
                        $current_adminflag = $values[5];
                    }

                    ?>
                    <table class = "table">
                    <tr style = 'font-weight:bold'>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                     <th>Password</th>
                     <th>Student Flag</th>
                     <th>Admin Flag</th>
                        <th>Update Account</th>
                        <th>Reset Password</th>



                   <?  echo ("   <tr style = 'font-style:italic'>
                        <td>$current_userid</td>
                        <td>$current_fname</td>
                        <td>$current_lname</td>
                        <td>$current_password</td>
                        <td>$current_studentflag</td>
                         <td>$current_adminflag</td>
                        <td><a href=\"user_update.php?sessionid=$sessionid&userid=$current_userid\" class=\"btn btn-primary\" role=\"button\">Update Account</a></td>
                        <td><a href=\"user_reset_password_action.php?sessionid=$sessionid&userid=$current_userid\" class=\"btn btn-warning\" role=\"button\">Reset Password to Default</a></td>
                        
                        </tr>     
                        "); ?>
                        <?
                        oci_free_statement($cursor); ?>
                        </table>

                </table>
            </div>
            <div class = "col-md-1"></div>
        </div>
    </div>
</section>





<!-- Footer -->
<?  include "footer.php"; ?>