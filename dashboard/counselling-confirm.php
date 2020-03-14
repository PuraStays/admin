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


$txn = $_SESSION['txn'];
$institute = $_REQUEST['institute'];
$Stream = $_REQUEST['Stream'];
$Counselling_Id = $_REQUEST['cid'];
$Registration_No = $db->clm_value('Registration_No', 'txn', 'registration_new', ''.$txn.'');
$Institute_Name =  $db->clm_value_2('Institute_Short_Name', 'Id', 'Status', 'ame_institute', $institute, '1');



$qry1 = "insert into online_counselling 
  (
    txn,
    Registration_No,
    Counselling_Id,
    Institute_Id,
    Institute_Name,
    Stream,
    Status,
    DOC,
    DOU
  )
  values
  (
    '$txn',  
    '$Registration_No',
    '$Counselling_Id',
    '$institute',
    '$Institute_Name',
    '$Stream',
    '0',
    '$DOC',
    '$DOU'
  );";


    $db->_query($qry1);



    $db = new DB();
    //var_dump($_SESSION);
    $email = $_SESSION['email'];
    
    
    $qry = "select * from registration_new where txn = '$txn'";
    $result = $db->_query($qry);
    $row = mysqli_fetch_array($result);
    
    $Mobile = $row['Student_Mobile'];
    $Name = $row['First_Name'].' '.$row['Last_Name'];
    $Email_Id = $row['Student_Email'];
    $Amount = 25000;





   //payment gateway 
          $SALT = "C1RfhTTg";
          $MERCHANT_KEY = "PETuvV"; 

          $PAYU_BASE_URL = "https://secure.payu.in";
        
          $hash = '';
          $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
          


          //$hashVarsSeq = explode('|', $hashSequence);
          $hash_string = '';  
          
          /*
          foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
          }
          */
          
          $hash_string = $MERCHANT_KEY.'|'.$Counselling_Id.'|'.$Amount.'|'."Online Registration".'|'.$Name.'|'.$Email_Id.'|'.'|'.'|'.'|'.'|'.'|'.'|'.'|'.'|'.'|'.'|';
          $hash_string .= $SALT;
          
          //hash
          $hash = strtolower(hash('sha512', $hash_string));

          //action
          $action = $PAYU_BASE_URL . '/_payment';

          $response['Amount'] = $Amount;  
          $response['MERCHANT_KEY'] = 'PETuvV'; 
          $response['txn'] = $Counselling_Id;
          $response['firstname'] = $Name;
          $response['email'] = $Email_Id;
          $response['phone'] = $Mobile;
          $response['productinfo'] = "Online Registration";
          $response['surl'] = "http://52.76.246.184/dashboard/counselling-pay-return.php?success&t=".$Counselling_Id;
          $response['furl'] = "http://52.76.246.184/dashboard/counselling-pay-return.php?fail";
          $response['service_provider'] = "payu_paisa";
          $response['action'] = $action;
          $response['hash'] = $hash;
          $response['Status'] = '1';  

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
        <h1>Seat Confirmation</h1>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb wrapper end --> 


  <!-- page-header -->
        <section id="news" class="page-section">
            <div class="container" id="counselling" style="text-align: justify;">
                
                <?php include_once("includes/dashboard-leftmenu.php");?>
                <div class="col-sm-9 col-md-9">
                  <?php
                    

                    $institute_id = $_REQUEST['institute'];
                    $Institute_Short_Name =  $db->clm_value_2('Institute_Short_Name', 'Id', 'Status', 'ame_institute', $institute_id, '1');

                    $Stream = $_REQUEST['Stream'];

                  ?>


             <?php
             if($message !='')
             {
             	echo $message;
             }

             ?>
            <div class="tab-pane" id="tab2">
                  <table class="table table-striped">
                        <tbody>
                        <tr>
                          <td width="20%;">Candidate Name: </td>
                          <td><strong><?= $row['First_Name'].' '.$row['Last_Name']; ?></strong></td>
                          <td width="20%;">Father Name: </td>
                          <td><strong><?= $row['Father_Name']; ?></strong></td>
                        </tr>

                        <tr>
                          <td width="20%;">Registration No: </td>
                          <td><strong><?= $row['Registration_No']; ?></strong></td>
                          <td width="20%;">Hall Ticket No: </td>
                          <td><strong><?= $row['Hall_Ticket_No']; ?></strong></td>
                        </tr>
                        <tr>
                          <td width="20%;">City: </td>
                          <td><strong><?= $row['City']; ?></strong></td>
                        
                          <td width="20%;">State: </td>
                          <td><strong><?= $row['State']; ?></strong></td>
                        </tr>
                        <tr>
                          <td width="20%;">Institute: </td>
                          <td><strong><?= $Institute_Short_Name; ?></strong></td>
                        
                          <td width="20%;">Stream: </td>
                          <td><strong><?= $Stream; ?></strong></td>
                        </tr>
                        <form action="<?= $response['action']; ?>" method="post" id="validate_form" class="form-transparent" >

                  <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                  <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                  <input type="hidden" name="txnid" value="<?php echo $Counselling_Id ?>" />
                  <input type="hidden" name="amount" value="<?= $Amount; ?>" readonly />
                  <input type="hidden" name="firstname" id="firstname" value="<?= $Name; ?>" readonly />
                  <input type="hidden" name="email" id="email" value="<?= $Email_Id?>" readonly />
                  <input type="hidden" name="phone" value="<?= $Mobile; ?>" readonly />
                  <input type="hidden" name="productinfo" value="<?= $response['productinfo'];?>" />
                    
                  <input type="hidden" name="surl" value="<?= $response['surl']; ?>" />
                  <input type="hidden" name="furl" value="<?= $response['furl']; ?>" />
                  
                  

                  <input type="hidden" name="lastname" id="lastname" value="" />
                  <input type="hidden" name="address1" value="" />
                  <input type="hidden" name="address2" value="" />
                    
                  <input type="hidden" name="city" value="" />
                  <input type="hidden" name="state" value="" />
                    
                  <input type="hidden" name="country" value="" />
                  <input type="hidden" name="zipcode" value="" />
                    
                  <input type="hidden" name="udf1" value="" />
                  <input type="hidden" name="udf2" value="" />

                  <input type="hidden" name="udf3" value="" />
                  <input type="hidden" name="udf4" value="" />

                  <input type="hidden" name="udf5" value="" />
                  <input type="hidden" name="pg" value="" />

                  <table class="" style="margin-top: 30px;">
                    
                    <b>Counselling Fee: : </b><input style="padding: 3px; background-color: #fff;" type="text" readonly="readonly" required="required"  value="25000"></td></tr>
                    <tr> <td> 
                      <a class="btn btn-dark btn-theme-colored btn-flat mr-5" href="counselling-start.php">Back</a> &nbsp; 
                      <input type="submit" style="width: 220px;" class="btn btn-dark btn-theme-colored btn-flat mr-5"  name="submit" value="Pay Counselling Fees"></td></tr>
                  </table>
            </form>

                  </tbody></table>
                </div>
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

</body>

</html>