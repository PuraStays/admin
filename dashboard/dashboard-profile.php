<?php

  session_start();
  if(!isset($_SESSION["login_status"]))
  {
      printf("<script>location.href='https://www.amecet.in?logout'; </script>");
      exit(); 
  }
  else
  {
    if($_SESSION["login_status"]!='login')
    {
      printf("<script>location.href='https://www.amecet.in?logout'; </script>");
      exit(); 
    }
  }



include_once("admin/includes/db.inc.php");

$db = new DB();
date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');
$Today = date('Y-m-d');

if($db->is_mobile() == 1)
  $Device = 'Mobile';
else
  $Device = 'System';


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="robots" content="FOLLOW, INDEX, ALL"/>
<meta name="distribution" content="Global"/>
<meta name="ALLOW-SEARCH" content="yes"/>
<meta name="AUDIENCE" content="all"/>
<meta name="YahooSeeker" content="index, follow"/>
<meta name="msnbot" content="index, follow"/>
<meta name="googlebot" content="index, follow"/>
<meta name="language" content="English"/>
<meta name="author" content="amecet.in"/>

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title >Student Profile | Aircraft Maintenance Engineering Common Entrance Test (AME CET)</title>
<meta name="description" content="Contact to AME CET regarding any suggestion and query" />
<meta name="keywords" content="query, Student Profile, amecet, ame" />


<!-- Bootstrap CSS -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS-->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Linear icons CSS-->
<link href="assets/linearicons/css/icon-font.min.css" rel="stylesheet">
<!-- Mobile Menu Css -->
<link href="assets/css/meanmenu.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- Animate CSS -->
<link href="assets/animate/animate.css" rel="stylesheet">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
<!-- Pre Loader -->
<!--<div id="dvLoading"></div>-->
<!-- Header Start -->
<?php include_once("includes/header.php");?>
<!-- Header End --> 

<!-- breadcrumb wrapper start -->
<div class="breadcrumb-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <h1>Student Profile</h1>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb wrapper end --> 

<?php

  
	if(isset($_POST['submit']))
	{
		
		$PassCode = $_POST["Password"];		
		$Email = $_SESSION['email'];
    $txn = $_SESSION['txn'];

		$qry = "update registration_new set PassCode = '$PassCode' where txn = '$txn'";
		if($db->_query($qry))
	    {
	    	
	    	$message ='<div class="alert alert-success">  <strong>Success! </strong>Your password has been changed successfully! Thank you</div>';
	    }
	}
	else
	{
		
	}
	
?>
	



  <!-- page-header -->
        <section id="news" class="page-section">
            <div class="container" id="counselling" style="text-align: justify;">
                
                <?php include_once("includes/dashboard-leftmenu.php");?>
                <div class="col-sm-9 col-md-9">
                  <?php
                    session_start();
                    $db = new DB();
                    //var_dump($_SESSION);
                    $email = $_SESSION['email'];
                    $txn = $_SESSION['txn'];
                    $qry = "select * from registration_new where txn = '$txn'";
                    $result = $db->_query($qry);
                    $row = mysqli_fetch_array($result);
                    
                  ?>


             <?php
             if($message !='')
             {
             	echo $message;
             }

             ?>
            <!-- Contact Form -->
            <form class="form-transparent custom-form" id="student_reg_form" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                
                <br />
                <legend>Student's General Details</legend>
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-6 col-xs-12 col-md-6">
                      <div class="form-group label-adjust">
                        <label for="first_name">First Name  <small>*</small></label>
                        <input name="Name" id="name" class="form-control" value="<?= $row['First_Name']; ?>" type="text" placeholder="Name" required="required"  disabled="disabled" >
                      </div>
                    </div>
                    
                      
                      <div class="col-sm-6 col-xs-12 col-md-6">
                      <div class="form-group label-adjust">
                        <label for="Password">Password  <small>*</small></label>
                        <input name="Password" id="Password" class="form-control" value="<?= $row['PassCode']; ?>" type="text" placeholder="Password" required="required">
                      </div>
                    </div>
                      
                      
                    </div>
                  </div>
                

                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-6 col-xs-12 col-md-6">
                      <div class="form-group label-adjust">
                        <label for="student_mobile">Mobile  <small>*</small></label>
                        <input name="Mobile" id="student_mobile" class="form-control required" value="<?= $row['Student_Mobile']; ?>" type="text" placeholder="10 digit Mobile Number" required="required"  disabled="disabled">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 col-md-6">
                      <div class="form-group label-adjust">
                        <label for="student_email">Email Id <small>*</small></label>
                        <input name="Email"  class="form-control" type="email" value="<?= $row['Student_Email']; ?>" placeholder="Email Id" required="required" disabled="disabled">
                      </div>
                    </div>
                  </div>
                </div>


                
              <div class="form-group">

					<button type="submit" onclick="" name="submit" value="Submit" style="width: 165px;"  class="btn btn-dark btn-theme-colored btn-flat" data-loading-text="Please wait...">Update Password</button>
                
              </div>	
              <br /><br />
              <br /><br />
            </form>    
                </div>
        </section>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner page wrapper end -->

<!-- Footer Wrapper Start -->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Wrapper End --> 
<script src="assets/jquery/jquery-3.1.1.min.js"></script> 
<script src="assets/jquery/jquery.meanmenu.js"></script> 
<script src="assets/jquery/plugins.js"></script> 
<script src="assets/number-animation/jquery.animateNumber.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/wow/wow.min.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/custom.js"></script>

<script language="javascript" type="text/javascript">

        function val() {
            //date validation
            if (document.getElementById("Exam_Centre_I").value == "") {
                alert("Please choose Exam Centre (Ist Choice) ")

                document.getElementById("Exam_Centre_I").focus();
                return false;
            }
            
            if (document.getElementById("Exam_Centre_II").value == "") {
                alert("Please choose Exam Centre (IInd Choice) ")

                document.getElementById("Exam_Centre_II").focus();
                return false;
            }
            if (document.getElementById("Exam_Centre_I").value == document.getElementById("Exam_Centre_II").value) {
                alert("Both exam centre must be different. ")

                document.getElementById("Exam_Centre_II").value = "";
                document.getElementById("Exam_Centre_II").focus();
                return false;
            }
            return true;

        }
    </script>
</body>

</html>