<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);
$course = $_GET['coursenumber'];
?>
<?  include "htmlheader.php"; ?>
<body id="page-top">

<!-- Navigation -->
<?  include "nav.php"; ?>

<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div class="container">

        <h1 class="text-uppercase mb-0">Section List</h1>
        <h3>Course <? echo $course; ?></h3>

        <hr class="star-light">
    </div>
</header>

<!-- welcome Section -->

<? //get current user for enrollment
$q = current_user($sessionid);
$uid = $q[0];
 ?>
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
				<th>Section ID</th>
				<th>Semester ID</th>
				<th>Time</th>
				<th>Capacity</th>
				<th>Remaining Seats</th>
				<th>Enroll</th>





				<?
				// Interpret the query requirements

					// Form the query and execute it
					$sql = "select  sectionid, semesterid, tm, capacity from Sections where coursenumber = '$course'";

					$result_array = execute_sql_in_oracle ($sql);
					$result = $result_array["flag"];
					$cursor = $result_array["cursor"];

					if ($result == false){
						display_oracle_error_message($cursor);
						die("Client Query Failed line 158 user_list.");
					}


                // Fetch the result from the cursor one by one
					while ($values = oci_fetch_array ($cursor)) {
                        $sectionid = $values[0];
                        $semesterid = $values[1];
                        $tm = $values[2];
                        $capacity = $values[3];

            echo("
						<tr> 
						<td>$sectionid</td> 
						<td>$semesterid</td> 
						<td>$tm</td> 
						<td>$capacity</td> 
						<td></td>

						<td><a href=\"enroll_action.php?sessionid=$sessionid&sectionid=$sectionid&userid=$uid\" class=\"btn-sm btn-info\" role=\"button\">Enroll</a></td> 
						</tr> 
				");
                   }
					echo"</table>";




                oci_free_statement($cursor);

                ?>

            </table>
           </div>
           <div class = "col-md-1"></div>
       </div>
    </div>
</section>





<!-- Footer -->
<?  include "footer.php"; ?>