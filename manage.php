<?
include "utility_functions.php";

$sessionid = $_GET["sessionid"];
verify_session($sessionid);
?>

<?  include "htmlheader.php"; ?>
<body id="page-top">

<?  include "nav.php"; ?>
<?  include "header.php"; ?>
<!-- Student -->
<?if($usertype == 's'){   ?>
<section class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-7">
                <div class="box-header">
                    <i class="fa-2x fa fa-user-circle"></i>
                    <h5>Shortcuts</h5>
                </div>
                    <div class="btn-group-box">
                        <? echo ("<a href=\"user_account.php?sessionid=$sessionid\"><button class=\"btn\"><i class=\"fa-2x fa fa-user\"></i><br/>My Account</button></a> "); ?>
                        <? echo ("<a href=\"course_list.php?sessionid=$sessionid\"><button class=\"btn\"><i class=\"fa-2x fa fa-search\"></i><br/>Search Courses</button></a> "); ?>
                        <button class="btn"><i class="fa-2x fa fa-calendar-plus"></i><br/>Course Enrollment</button>
                        <button class="btn"><i class="fa-2x fa fa-graduation-cap"></i><br/>My Courses</button>

                    </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</section>




<? }else if($usertype == 'b' || $usertype == 'a'){ ?>
<!-- admin or student admin -->
<section class="container">
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-7">
                    <div class="box-header">
                        <i class="fa-2x fa fa-user-circle"></i>
                        <h5>Shortcuts</h5>
                    </div>
                    <div class="box-content">
                        <div class="btn-group-box">
                           <? echo ("<a href=\"user_account.php?sessionid=$sessionid\"><button class=\"btn\"><i class=\"fa-2x fa fa-user\"></i><br/>My Account</button></a> "); ?>
                           <? echo ("<a href=\"user_list.php?sessionid=$sessionid\"><button class=\"btn\"><i class=\"fa-2x fa fa-search\"></i><br/>Search Students</button></a> "); ?>
                            <? echo ("<a href=\"user_add.php?sessionid=$sessionid\"><button class=\"btn\"><i class=\"fa-2x fa fa-user-plus\"></i><br/>Add New Student</button></a> "); ?>
                            <button class="btn"><i class="fa-2x fa fa-pencil"></i><br/>Enter Grades</button>
                        </div>
                    </div>
                </div>
            <div class="col-md-3"></div>
        </div>


</section>
<? } ?>
<!-- welcome Section -->






<!-- Footer -->
<?  include "footer.php"; ?>
