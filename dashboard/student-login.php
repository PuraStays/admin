<?php
ini_set("display_errors", "1");
include_once("admin/includes/db.inc.php");
include_once("includes/authentication.php");
date_default_timezone_set('Asia/Kolkata');

$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');
$Today = date('Y-m-d');



if(isset($_POST['Login']))
{
      $db = new DB();

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
      }   
      
  $Email = $_POST["Email_Id"];
  $Pass = $_POST["Password"];

      


  if($Email!='' && $Pass !='')
  {
      
            $qry = "select * from registration_new where (Student_Email = '$Email' && PassCode = '$Pass' && Status = 1) || (Parents_Email = '$Email' && PassCode = '$Pass'  && Status = 1)";

            $result = $db->_query($qry);

            if(mysqli_num_rows($result)<1)
              {
                $message = '<div class="alert alert-danger"><strong>Sorry!</strong> We did not find any Record Form these details. Please try again!</div>';
              }
              else
              {
                  $row = mysqli_fetch_array($result);
                  
                    
                    session_start();

                    $_SESSION["login_status"] = "login";
                    $_SESSION["username"] = strtoupper($row['First_Name']);
                    $_SESSION["email"] = strtoupper($row['Student_Email']);
                    
                    $_SESSION["txn"] = $row['txn'];
                    

                    $_SESSION["user_type"] = "student"; 

                    $row = mysqli_fetch_array($result);
                    $status = "success";  
                    $qry1 = "insert into student_login_details (username, Mobile, Login_Type, Email,  Registration_No, ip_address, login_time, status, doc) VALUES ('$username', '$Mobile', 'Admit Card Download','$Email', '$Registration_No', '$ip_address', '$DOC','success', '$DOC');";
                    $db->_query($qry1);          
                      
                    printf("<script>location.href='dashboard.php'</script>");
                    exit();
                 
               }

          }
          else
          {        
            $message = '<div class="alert alert-danger"><strong>Sorry!</strong>Unable to Student Login. Please try again after soem time!</div>';

            $qry1 = "insert into student_login_details (username, Mobile, Email,  Registration_No, ip_address, login_time, status, doc) VALUES ('$username', '$Mobile', '$Email', '$Registration_No', '$ip_address', '$DOC','failled', '$DOC');";
            $db->_query($qry1);          
          }
    
  }
  else if(isset($_POST['signin']))
  {

  }
  else
  {
//    $message = 'Please Try Again';
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
<title >Student Login | Aircraft Maintenance Engineering Common Entrance Test (AME CET)</title>
<meta name="description" content="Contact to AME CET regarding any suggestion and query" />
<meta name="keywords" content="query, Student Login, amecet, ame" />


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

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WWK47ZQ');</script>
<!-- End Google Tag Manager -->


</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWK47ZQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->  
<!-- Pre Loader -->
<!--<div id="dvLoading"></div>-->
<!-- Header Start -->
<?php include_once("includes/header.php");?>
<!-- Header End --> 

<!-- breadcrumb wrapper start -->
<div class="breadcrumb-wrapper" style="height: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <h1>Student Login</h1>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb wrapper end --> 

<!-- Inner page wrapper start -->
<div class="inner-page-wrapper">
  <div class="container">
    <div class="row" style="margin-bottom: 50px;">
        
      
      <div class="col-md-4" style="margin-bottom: 30px;">
       <div class="contact-form">
        
        <h4>Login here to download Result Card</h4>
        <p><?php if ($message != "") { echo $message; }?></p>
        <form method="post" action="">
                      <div class="form-group">
                        <input placeholder="Your Email Id" type="email" name="Email_Id" id="Email_Id" value="" required class="form-control form-item" required="required">
                      </div>
                      <input placeholder="Your Password" name="Password" id="Password" required class="form-control form-item" value="" required="required">

                      <a style="padding: 3px; text-decoration: underline; color: #ffc41f; float: right;" href="forgot-password.php">Forget your Password</a> <br />

                      <input type="hidden" name="curr_url" value="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
                      <input type="hidden" name="Query_Type" value="Contact Us">
            
                      <button class="btn btn-1" type="submit" name="Login" onclick="javascript:return validations();">Login</button>        
          </form>
        </div>
        </div>
        <div class="col-md-1" style="margin-bottom: 30px;" ></div>
        <div class="col-md-7">
        
          <h3 class="line-bottom mt-0">Important Information</h3>
             <ul class="list">
                <li>AME CET 2019 result will be declared on 13 May 2019 latest by evening due to the General Election at Delhi.</li>
                
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