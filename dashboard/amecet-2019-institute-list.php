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
                    

                    <h3 style="text-transform: none;">AME CET 2019 Institute List approved by DGCA, Govt of India</h4>
                <div class="tab-pane" id="tab2">
                  <table class="table table-striped" style="text-align: center; vertical-align: middle;">
                        <tbody><tr>
                          <th rowspan="2">SN</th>
                          <th rowspan="2">Institute Name</th>
                          <th rowspan="2" >City, State</th>
                          <th colspan="7" style="text-align: center;">Streams</th>
                          <th></th>
                        </tr>
                        <tr>
                        	<th>B1.1</th>
                        	<th>B1.2</th>
                        	<th>B1.3</th>                        	
                        	<th>B1.4</th>  
                        	<th>B2</th>  
                        	<th>A1</th>  
                        	<th>A4</th>  

                        </tr>
                       


                       <?php
                        $qry2  = "select * from ame_institute where Status = 1 order by Id ASC";
                        $result2 = $db->_query($qry2);

                        $Serial = $low_limit;
                        $serial=0;

                        while($row2 = mysqli_fetch_array($result2))
                         {
                            $serial++;
                            ?> 
                              <tr>
                                <td><?= $serial; ?></td>
                                <td><?= $row2['Institute_Short_Name']; ?></td>
                                <td><?= $row2['City'].', '.$row2['State']; ?></td>
                                <td><?= $row2['Steam2']; ?></td>
                                <td><?= $row2['Steam3']; ?></td>
                                <td><?= $row2['Steam4']; ?></td>
                                <td><?= $row2['Steam5']; ?></td>
                                <td><?= $row2['Steam6']; ?></td>
                                <td><?= $row2['Steam7']; ?></td>
                                <td><?= $row2['Steam10']; ?></td>
                                <td><a style="text-decoration: underline;" target="_blank" href="<?= $row2['Link']; ?>">Read More</td>
                          
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