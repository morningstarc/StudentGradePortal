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

        <h1 class="text-uppercase mb-0">Course List</h1>

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
               <!-- -->



               <table class = "table">
                <tr style = 'font-weight:bold'>
				<th>Course Number</th>
				<th>Pre-Requisite</th>
				<th>Course Title</th>
				<th>Course Description</th>
				<th>Details</th>





				<?
				// Interpret the query requirements

					// Form the query and execute it
					$sql = "select  coursenumber, prereq, coursetitle, coursedescription from Courses";

					$result_array = execute_sql_in_oracle ($sql);
					$result = $result_array["flag"];
					$cursor = $result_array["cursor"];

					if ($result == false){
						display_oracle_error_message($cursor);
						die("Client Query Failed line 158 user_list.");
					}


                // Fetch the result from the cursor one by one
					while ($values = oci_fetch_array ($cursor)) {
                        $coursenumber = $values[0];
                        $prereq = $values[1];
                        $coursetitle = $values[2];
                        $coursedescription = $values[3];

            echo("
						<tr> 
						<td>$coursenumber</td> 
						<td>$prereq</td> 
						<td>$coursetitle</td> 
						<td>$coursedescription</td> 

						<td><a href=\"section_list.php?sessionid=$sessionid&coursenumber=$coursenumber\" class=\"btn-sm btn-primary\" role=\"button\">Sections</a></td> 
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