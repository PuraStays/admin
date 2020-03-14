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




if(isset($_REQUEST['success']))
{
  
  if($_REQUEST['t'])
    {
        if($db->clm_value('Id', 'Counselling_Id', 'online_counselling', $_POST["txnid"]))
        {
          $query = "UPDATE online_counselling SET Status =  '1' WHERE  Counselling_Id = '$_POST[txnid]'";
          
          if($db->_query($query))
          {
            $message = 'Payment done successfully.';


              $Counselling_Id = $_POST["txnid"];

              $qry = "SELECT r.First_Name, r.Last_Name, r.Registration_No, r.Hall_Ticket_No, r.Father_Name, r.City, r.State, oc.Institute_Id, oc.Institute_Name, oc.Stream FROM online_counselling as oc INNER JOIN registration_new as r ON r.Registration_No = oc.Registration_No where oc.Counselling_Id = '$Counselling_Id'";

              $result = $db->_query($qry);
              $row = mysqli_fetch_array($result);

              

              $Registration_No = $row['Registration_No'];
              $Hall_Ticket_No = $row['Hall_Ticket_No'];
              $Institute_Name =  $row['Institute_Name'];
              $Institute_Id =  $row['Institute_Id'];
              $Stream = $row['Stream'];
              $Payment_Amount = $_POST['amount'];
              $Payment_Mode = 'Online';
              $Payment_Status = '1';
              $Status = '1';



            $query = "INSERT INTO amecet_2019_counselling 
                      (
                          Registration_No,
                          Hall_Ticket_No,
                          Institute_Id,
                          Institute_Name,
                          Stream,
                          Seatlock_Status,
                          Payment_Amount,
                          Payment_Mode,
                          Counselling_Mode,
                          Payment_Status,
                          Status,
                          DOU
                      )
                      VALUES
                      (
                          '$Registration_No',
                          '$Hall_Ticket_No',
                          '$Institute_Id',
                          '$Institute_Name',
                          '$Stream',
                          '1',
                          '$Payment_Amount',
                          '$Payment_Mode',
                          '$Counselling_Mode',
                          '$Payment_Status',
                          '$Status',
                          '$DOU'
                    )";

                    $db->_query($query);

          }
          else
          {
            $message = 'Unable to update query. You are advised to call 8800663006';
            exit();
          }
        }
  }
}
elseif(isset($_REQUEST['fail']))
{
  $message= 'Payment Failure. Please Try again !';
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
             if($message !='')
             {
             	//echo $message;

             }

             ?>
            <div class="tab-pane" id="tab2">
                  <table class="table table-striped">
                        <tbody>
                          <?php
                          if(isset($_REQUEST['success']))
                              {
                                ?>
                                <tr style="margin-top: 20px;">
                                  <td width="20%;">Counselling Status: </td>
                                  <td colspan="3"><strong style="color: green;">Congratulations, your online counselling has been done successfully. 
                                    <br />
                                     To download your admission offer letter . <br /><br />

                                     <a style="text-align: underline" href="dashboard.php"><h4>Click here</h4></a>
                                    <br /></strong></td>

                                </tr>

                                <?php
                              }
                        ?>
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
                          <td><strong><?= $row['State']; ?></strong></td>
                        </tr>
                        
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