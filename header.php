<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div class="container">
        <?
                $q = current_user($sessionid);
                $current_userid = $q[0];
                $current_fname = $q[1];
                $current_student = $q[2];
                $current_admin = $q[3];


                if($current_student == 'Y' && $current_admin == 'N'){
                    $usertype = 's';
                }else if($current_admin == 'Y' && $current_student == 'N'){
                    $usertype = 'a';
                }if($current_student == 'Y' && $current_admin == 'Y'){
                    $usertype = 'b';
                }

				switch ($usertype) {
                    case 's':
						?><h1 class="text-uppercase mb-0">Welcome Student</h1><?
                    break;
                    case 'b':
						?><h1 class="text-uppercase mb-0">Welcome Student Administrator</h1><?
                    break;
                    case 'a':
						?><h1 class="text-uppercase mb-0">Welcome Administrator</h1><?
                    break;
                    default:
						?><h1 class="text-uppercase mb-0">Welcome User</h1><?
                }
				?>

        <hr class="star-light">
    </div>
</header>