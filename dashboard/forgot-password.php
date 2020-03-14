<?php
include_once("admin/includes/db.inc.php");
include_once("includes/authentication.php");
date_default_timezone_set('Asia/Kolkata');

$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');
$Today = date('Y-m-d');



if(isset($_POST['submit']))
{
      $db = new DB();

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
      }   
      

  $UserId = $_POST["UserId"];
  $Name = $_POST["Name"];

  

  if($UserId!='')
  {
            /* Start of Checking is it registered form */
            $qry = "select * from registration_new where First_Name like '%$Name%' && (Student_Mobile = '$UserId' || Student_Email = '$UserId')";
       
            $result = $db->_query($qry);

            if(mysqli_num_rows($result)<1)
              {
                $message = '<div class="alert alert-danger"><strong>Sorry!</strong> We did not find any Registration Form with these details. Please try again!</div>';
              }
              else
              {
                  $row = mysqli_fetch_array($result);


                  $Mobile1 = $row['Mobile1'];
                  $Mobile2 = $row['Mobile2'];
                  $Name = $row['Name'];



                   $sms1 = 'Dear '.$row["First_Name"].', Your AME CET 2019 Registered Email is '.$row["Student_Email"].' & Password is '.$row['PassCode'].'. For more details contact  8800663006 or visit www.amecet.in';

                  $db->_sms($sms1, '8750724589');
                  $db->_sms($sms1, $Mobile1);
                  $db->_sms($sms1, $Mobile2);



                  $message = '<div class="alert alert-success">Password has been sent to your mobile number.</div>';

                  $status = "success";  
                  $qry1 = "insert into student_login_details (username, Mobile, Login_Type, Email,  Registration_No, ip_address, login_time, status, doc) VALUES ('$username', '$Mobile', 'Forgot Password','$Email', '$Registration_No', '$ip_address', '$DOC','success', '$DOC');";
                  $db->_query($qry1);          
                    
                  // printf("<script>location.href='admit-card.php'</script>");       
                  // exit();
                 }
          }
          else
          {        
            $message = '<div class="alert alert-danger"><strong>Sorry!</strong> We did not find any Registration Form with these details. Please try again!</div>';

            $qry1 = "insert into student_login_details (username, Mobile, Login_Type, Email,  Registration_No, ip_address, login_time, status, doc) VALUES ('$username', '$Mobile', 'Forgot Password','$Email', '$Registration_No', '$ip_address', '$DOC','success', '$DOC');";
            $db->_query($qry1);          
          }
       


  }
  else
  {
    $message = '';
  }

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
<title >Forgot Password | Aircraft Maintenance Engineering Common Entrance Test (AME CET)</title>
<meta name="description" content="Contact to AME CET regarding any suggestion and query" />
<meta name="keywords" content="query, Download Your Admit Card, amecet, ame" />


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
        <h1>Forgot your AME CET 2019 Password</h1>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb wrapper end --> 

<!-- Inner page wrapper start -->
<div class="inner-page-wrapper">
  <div class="container">
    <div class="row">
        
      <div class="col-md-4">
       <div class="contact-form">
        
        <H5><?php if ($message != "") { echo $message; }?></H5>
        <h4>Enter your details here..  </h4>
            <form method="post" action="">
                <div class="row">        
                   <div class="col-md-12">
                      <div class="form-group">
                        <input placeholder="Your First Name" name="Name" id="Name" required class="form-control form-item" type="text" value="" required="required">
                      </div>
                   </div>
                   <div class="col-md-12">
                      <div class="form-group">
                        <input placeholder="Registered Email or Mobile" name="UserId" id="UserId" required class="form-control form-item" type="text" value="" required="required">
                      </div>
                   </div>
                  <div class="col-md-12">
                    
                          <input type="hidden" name="curr_url" value="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
                        <button class="btn btn-1" type="submit" name="submit" onclick="javascript:return validations();">Submit</button>        
                         <a style="padding: 3px; text-decoration: underline; color: #ffc41f; float: right;" href="student-login.php">Student Login</a> <br />
                  </div>
                 </div>
                 <br /><br /><br />
                 
                
            </form>
        </div>
        </div>
        <div class="col-md-1">
        </div>
              <div class="col-md-6">
                <h3 class="line-bottom mt-0">How to Recover Your Password </h3>
                   <ul class="list">
                      <li>To get your AME CET Password Please enter your First Name. Eg. if your name is <b>John Michael</b>, enter <b>John</b> as First Name.</li>
                      <li>In Second text box enter one of your registered email or mobile.</li>
                      <li>AME CET 2019 Number will be sent to your registered mobile numbers<strong> within 5 minutes</strong>.</li>
                      <li>In case of any assistance Please contact us on +91 9560058919, +91 8800663006 or send a query.</li>
                   </ul>
              </div>
      </div>
      </div>

              <!-- Widget --> 
            </div>
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
<script src="js/custom.js"></script>

</body>

</html>