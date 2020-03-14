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

date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');
$Curr_Time = date('Y-m-d H:i:s');
//$Curr_Time = '2019-05-18 10:47:28';


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
}

if($row2['Counselling_Start_Date'] <= $Curr_Time && $row2['Counselling_End_Date'] >= $Curr_Time)
  {
    $counselling_button = '<a href="counselling-start.php" class="btn btn-1" style="padding: 15px 15px 5px 15px; width: 280px;" ><h4>START YOUR COUNSELLING</h4></a>';
  }
  else
  {
    
    echo 'Sorry !!';
    echo '<a href="online-counselling.php">Back</a>';
    exit();

  }


function left_seats($institute, $stream, $Total_Seats)
  {
    $db = new DB();
    $qry = "select count(1) as Allocated_Seats  from amecet_2019_counselling where Institute_Id = '$institute' && Stream = '$stream' && Seatlock_Status = 1";  
    $result = $db->_query($qry);
    $row = mysqli_fetch_array($result);
    


    
    $seats = $Total_Seats - $row['Allocated_Seats'];


    if($seats>0)
    {
      return($seats);
    }
    else
    {
     return(0); 
    }

  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5">
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#counselling-btn {
    border: 1px solid #ccc;
    padding: 5px 10px 5px 10px;
    min-width: 50px;
    background-color: green;
    color: #fff;
}
#counselling-btn-red {
    border: 1px solid #ccc;
    padding: 5px 10px 5px 10px;
    min-width: 50px;
    background-color: red;
    color: #fff;
}

</style>


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
        $db = new DB();

        if($_REQUEST['current_page'])
          {
            $low_limit = ($_REQUEST['current_page']-1)*15;
          } 
          else
          {
            $low_limit = 0;
          }
          $SerialNo = $low_limit;

          if(isset($_REQUEST['Submit']) or isset($_REQUEST['current_page']))
              {
                $qry = "select * from ame_institute where  ";
                 if($s_Institute_Short_Name!=''){$qry = $qry."Institute_Short_Name LIKE '%$s_Institute_Short_Name%' && ";}
                 $qry = $qry. " Status  = 1  order by Institute_Short_Name ASC";
                $qry_with_limit = $qry." limit $low_limit,15";
              }
          else
            {
              $qry = "select * from ame_institute where Status = 1 order by Position ASC";
              $qry_with_limit = $qry."  limit $low_limit,15";
            }
        
        $result = $db->_query($qry_with_limit);
        $total_count =mysqli_num_rows($db->_query($qry));
        $Serial = $low_limit;

      ?>


  <!-- page-header -->
        <section id="news" class="page-section">
            <div class="container" id="counselling" style="text-align: justify;">
                
                <?php include_once("includes/dashboard-leftmenu.php");?>
                <div class="col-sm-9 col-md-9">

                    <div class="single-page" style="padding-top: 20px;">
                    <div class="margin-top-30 paddint-top-20"></div>
                    <?php $Counselling_Id = $db->getToken(30); ?>
                    

                <h3 style="text-transform: none; text-align: center;" >Online Counselling Start</h4>
                <br />
                
                <div class="tab-pane" id="tab2">
                <table class="table table-bordered table-striped" style="width: 100%">
                    <thead class="thead-dark">
                      <tr>
                            <th class="align-middle" rowspan="4">SN</th>
                            <th class="align-middle" rowspan="4">Institute</th>
                            <th class="align-middle" rowspan="4">City, State</th>
                            <th class="align-middle"  style="text-align: center;" colspan="10">Streams</th>
                            
                            </tr>
                           
                      <tr>
                            <th  style="text-align: center;">B1.1</th>
                            <th  style="text-align: center;">B1.2</th>
                            <th  style="text-align: center;">B1.3</th>
                            <th  style="text-align: center;">B1.4</th>
                            <th  style="text-align: center;">B2</th>
                            <th  style="text-align: center;">A1</th>
                            
                            <th  style="text-align: center;">A4</th>
                            </tr>
                      </tr>
                    </thead>
                    <tbody>
                  <?php

                    $total_Stats = 0;
                    $total_Stream1 = 0;
                    $total_Stream2 = 0;
                    $total_Stream3 = 0;
                    $total_Stream4 = 0;
                    $total_Stream5 = 0;
                    $total_Stream6 = 0;
                    $total_Stream7 = 0;
                    $total_Stream8 = 0;
                    $total_Stream9 = 0;
                    $total_Stream10 = 0;


                    while($row = mysqli_fetch_array($result))
                    {



                      $Serial++;
                      ?>
                        <tr>
                          <td  style="text-align: center;"><?= $Serial; ?></td>
                          <td  style="text-align: center;"><?= $row['Institute_Short_Name']; ?></td>
                          <td  style="text-align: center;"><?= $row['City'].', '.$row['State']; ?></td>
                          
                          <td  style="text-align: center;">
                            <?php
                              if(left_seats($row['Id'], 'B1.1', $row['Steam2'])>0)
                              {
                                ?>
                                  <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=B1.1&cid=<?= $Counselling_Id;?>"><b ><?= left_seats($row['Id'], 'B1.1', $row['Steam2']); ?></b></a>    
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                            
                          </td>
                          <td  style="text-align: center;">

                            <?php
                              if(left_seats($row['Id'], 'B1.2', $row['Steam3'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=B1.2&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'B1.2', $row['Steam3']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                            
                            <td  style="text-align: center;">

                            <?php
                              if(left_seats($row['Id'], 'B1.3', $row['Steam4'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=B1.3&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'B1.3', $row['Steam4']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                          </td>

                            <td  style="text-align: center;">

                            <?php
                              if(left_seats($row['Id'], 'B1.4', $row['Steam5'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=B1.4&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'B1.4', $row['Steam5']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                          </td>
  
                            <td  style="text-align: center;">
                            <?php
                              if(left_seats($row['Id'], 'B2', $row['Steam6'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=B2&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'B2', $row['Steam6']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                               echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                          </td>
                            <td  style="text-align: center;">
                            <?php
                              if(left_seats($row['Id'], 'A1', $row['Steam7'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=A1&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'A1', $row['Steam7']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                          </td>
                            <td  style="text-align: center;">
                            <?php
                              if(left_seats($row['Id'], 'A4', $row['Steam10'])>0)
                              {
                                ?>
                                      <a id="counselling-btn" href="counselling-confirm.php?institute=<?= $row['Id']; ?>&Stream=A4&cid=<?= $Counselling_Id;?>"><b><?= left_seats($row['Id'], 'A4', $row['Steam10']); ?></b></a>  
                                <?php
                              }
                              else
                              {
                                echo '<b id="counselling-btn-red" >0</b>';
                              }
                            ?>
                          </td>

                          
                         <!--
                          <td class="actions">
                             <?php
                                if( $row['Status'] == "1" )
                                  { 
                                    echo '<a Mobile="Make Deactive" class="glyphicon glyphicon-ok" onclick="return Deactive('.$row['Id'].')" ></a> &nbsp;';
                                  }           
                                elseif( $row['Status'] == "0")
                                  {
                                     echo '<a Mobile="Make Active" class="glyphicon glyphicon-remove" onclick="return Active('.$row['Id'].')" ></a> &nbsp;';
                                  }

                                  echo '<a Mobile="Edit" class="fa fa-pencil-square-o" onclick="return Edit('.$row['Id'].')" ></a> &nbsp;';  

                                  echo '<a class="glyphicon glyphicon-trash" onclick="return Delete('.$row['Id'].')" ></a> &nbsp; ';
                              ?>
                          </td>
                        -->
                        </tr>
                      <?php 
                    }
                    ?>
                    </tbody>
                  </table>
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