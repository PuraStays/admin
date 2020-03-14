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
<title >Online Counselling | AME CET 2019</title>
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
        <h1>AME CET 2019 Online Counselling</h1>
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
                <div class="col-sm-6 col-md-6">
                    <div class="single-page" style="padding-top: 20px;">
                    <div class="margin-top-30 paddint-top-20"></div>
                    
                    <?php
                      $db = new DB();
                      $txn = $_SESSION['txn'];
                      $qry = "select * from registration_new where txn = '$txn'";

                      $qry = "SELECT RES.Id, REG.Registration_No, REG.First_Name, REG.Last_Name, REG.Student_Email, REG.PassCode, REG.Student_Mobile, REG.Parents_Mobile, REG.resultcard_download, RES.AIR, RES.Marks, RES.Attendance, RES.AIR FROM amcet_result_2019 AS RES LEFT JOIN registration_new REG ON RES.Regno = REG.Registration_No where REG.Status = 1 & RES.Status = 1 && REG.txn = '$txn' order by RES.AIR ASC";

			              $result = $db->_query($qry);
			              
			              if(mysqli_num_rows($result)>0)
			              {
			              $row = mysqli_fetch_array($result);

			              $qry2 =  "select * from amecet_2019_counselling_dates where Air_From <= ".$row['AIR']." && Air_To >= ".$row['AIR']." && Status = 1";
			              $result2 = $db->_query($qry2);
			              $row2 = mysqli_fetch_array($result2);
                    ?>
                      
								<h3>Online Counselling Process</h3>
						    	<ul>
				                    <li>To Join Online Counselling "<strong>START YOUR COUNSELLING</strong>" button will be active between <b><?= $row2['Counselling_Start_Date']; ?>'</b>' to <b><?= $row2['Counselling_End_Date']; ?> </b></li>
				                    <li>You have to click on  "<strong>START YOUR COUNSELLING</strong>" button. </li>
				                    <li>There you can check the availability of seats in AME institutes with streams</li>
				                    <li>You have to choose one seat only.</li>
				                    <li>After choosing the seat you have to submit INR 25,000/- as counselling fees to confirm your seat through Debit/Credit Card or Net Banking.</li>
				                    
				                    <li>Your seat will be confirmed in that institute which you have chosen.</li>
				                    
				                    <li>After submission of counselling fees the <strong>Seat Alloutment Letter</strong> will be generated for that institute. </li>
				                    <li>After successful counselling you are able to download <b>Seat Alloutment Letter</b>, <b>Fee Receipt</b>, <b> Required document List for admission. </b> </li>

				                </ul>
				                <h4>Note: This counselling fees will be adujsted in institute semester fees.<br />
				                </h4>


                </div>
				</div>
				<div class="col-sm-3 col-md-3">
					 <table class="table table-striped">
	                        <tbody>
	                        <tr>
	                            <td colspan="2" style="text-align: center;">
	                              <br /><br />
	                              <a disabled="disabled" href="" class="btn btn-1" style="padding: 15px 15px 5px 15px; width: 280px;" ><h4>START YOUR COUNSELLING</h4></a>

	                            </td>
	                        </tr>
	                        <tr>
	                        		<td>
	                        			<br /><br />
	                        			For any Query/Help regarding your Online Counselling Call  Us <br />
	                        			<b>Helpdesk: </b>   8130805906 
	                        		</td>
	                        </tr>
	                              
	                        </tbody>
	                    </table>
				</div>
            </div>
        		<?php 
			    		}
			    		else
			    		{
			    			echo 'Unable to show online counselling details. Please call Helpdesk: 9560058919';
			    		}
			        ?>
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