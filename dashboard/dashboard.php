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
//include_once("includes/authentication.php");
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
<title >Studnet Dashboard | AME CET 2019</title>
<meta name="description" content="Contact to AME CET regarding any suggestion and query" />
<meta name="keywords" content="query, Dashboard, amecet, ame" />


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
<!-- Header Start -->
<?php include_once("includes/header.php");?>
<!-- Header End --> 

<!-- breadcrumb wrapper start -->
<div class="breadcrumb-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <h1>Student Dashboard</h1>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb wrapper end --> 

  <?php

          session_start();
          $db = new DB();
          //var_dump($_SESSION);
          $email = $_SESSION['email'];
          $txn = $_SESSION['txn'];
          $qry = "select * from registration_new where txn = '$txn' order by Status DESC limit 1";
          $result = $db->_query($qry);
          $row = mysqli_fetch_array($result);
          //var_dump($row);

  ?>


  <!-- page-header -->
        <section id="news" class="page-section">
            <div class="container" id="counselling" style="text-align: justify;">
                
                <?php include_once("includes/dashboard-leftmenu.php");?>
                <div class="col-sm-9 col-md-9">

                    <div class="single-page" style="padding-top: 20px;">
                    <div class="margin-top-30 paddint-top-20"></div>
                    

                    <h3 style="text-transform: none;">AME CET 2019 Events & Status</h4>
                <div class="tab-pane" id="tab2">
                  <table class="table table-striped">
                        <tbody><tr>
                          <th>Events</th>
                          <th>Dates</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                          <td>Registration Form</td>
                          <td>15 Nov, 2018 to 15 Apr, 2019</td>
                          <td>
                            <?php

                              if(!isset($row['Id']))
                              {
                                  echo '<b  style="color: red;">Not Filled</b>'; 
                              }
                              else
                              {
                                if($row['Status']==1)
                                {
                                  echo '<b  style="color: green;">Successful</b>';
                                }
                                else
                                {
                                  echo '<b  style="color: red;">Un-Successful <br /> (Payment Pending)</b>'; 
                                }
                              }
                            ?>
                              
                          </td>
                          <td>
                              <?php
                                if(!isset($row['Id']))
                                {
                                    echo '<a href="dashboard-registration-form.php">Register Now</a>';
                                }
                                else
                                {
                                  if($row['Status']==1)
                                    {
                                      echo '<a href="registration-slip.php?success&t='.$row['txn'].'">Download</a>';
                                    }
                                    else
                                    {
                                      echo '<a target="_blank" href="dashboard-registration-form.php">Pay Now</a>';
                                    }
                                }
                              ?>
                            </td>
                        </tr>
                        <tr>
                          <td>Download of Admit Card</td>
                          <td>18 Apr, 2019</td>
                          
                                                    <td>
                            <?php

                              if($row['Hall_Ticket_No']==0)
                              {
                                  echo '<b  style="color: red;">Not Uploaded</b>'; 
                              }
                              else
                              {
                                
                                  echo '<b  style="color: green;">Successful</b>';
                              }
                            ?>
                              
                          </td>
                          <td>
                              <?php
                                if($row['Hall_Ticket_No']==0)
                                {
                                    echo '-';
                                }
                                else
                                {
                                      echo '<a target="_blank" href="admit-card.php?txn='.$row['txn'].'">Download</a>';
                                }
                              ?>
                            </td>  
                        </tr>
                        <tr>
                          <td>AME CET 2019 Exam</td>
                          <td> 5 May, 2019</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <td>Result</td>
                          <td>13 May, 2019</td>
                          <td><b  style="color: green;">Successful</b></td>
                          <td><a target="_blank" href="result-card.php">Download</a></td>
                        </tr>
                        <tr>
                          <td>Counselling Letter</td>
                          <td>13 May, 2019</td>
                          <td><b  style="color: green;">Successful</b></td>
                          <td><a target="_blank" href="counselling-letter.php">Download</a></td>
                        </tr>
                        <tr>
                          <td>Counselling Process</td>
                          <td>13 May, 2019</td>
                          <td><b  style="color: green;">Successful</b></td>
                          <td><a target="_blank" href="ame-cet-2019-online-counselling-process.php">Download</a></td>
                        </tr>
                        <tr>
                          <td>AME Institute List</td>
                          <td>13 May, 2019</td>
                          <td><b  style="color: green;">Successful</b></td>
                          <td><a target="_blank" href="amecet-2019-institute-list.php">Download</a></td>
                        </tr>
                        
                        <?php
                           $qry2 = "select * from amecet_2019_counselling where Registration_No = '$row[Registration_No]' && Status = 1";
                           $result2 =  $db->_query($qry2);
                           $row2 = mysqli_fetch_array($result2);
                           if(mysqli_num_rows($result2) > 0)
                           {

                            

                            

                            ?>

                            <tr>
                                <td>Seat Alloutment Letter</td>
                                <td><?= $row2['DOU']; ?></td>
                                <td><b  style="color: green;">Successful</b></td>
                                <td><a target="_blank" href="seat-alloutment-letter.php?t=<?= $row['txn']; ?>">Download</a></td>
                            </tr>
                            <tr>
                                <td>Fee Structure</td>
                                <td><?= $row2['DOU']; ?></td>
                                <td><b  style="color: green;">Successful</b></td>
                                <td><a target="_blank" href="upload/<?= $db->clm_value("Fee_Structure", 'Id', "ame_institute", $row2['Institute_Id']);?>">Download</a></td>
                            </tr>
                            
                            <tr>
                                <td>Fee Receipt</td>
                                <td><?= $row2['DOU']; ?></td>
                                <td><b  style="color: green;">Successful</b></td>
                                <td><a target="_blank" href="amecet-2019-fee-receipt.php?t=<?= $row['txn']; ?>">Download</a></td>
                            </tr>
                          



                            <?php
                           }
                           else
                           {
                          ?>
                            <tr>
                                <td>Online Counselling</td>
                                <td>-</td>
                                <td><b  style="color: green;">-</b></td>
                                <td><a href="online-counselling.php">Click here</a></td>
                            </tr>
                           <?php    
                           }
                        ?>
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
<script src="js/custom.js"></script>

</body>

</html>