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

$timezone = new DateTimeZone("Asia/Kolkata" );
$date = new DateTime();
$date->setTimezone($timezone);
$Curr_Time = $date->format('Y-m-d H:i:s');


$txn = $_SESSION['txn'];
//  $txn = $_REQUEST['txn'];
$qry = "select * from registration_new where txn = '$txn'";


 $db = new DB();
 $result = $db->_query($qry);

  if(mysqli_num_rows($result)<1)
  {

    mysqli_num_rows($result);
    exit();
  }
  else
  {

    $row = mysqli_fetch_array($result);
    if($row['Hall_Ticket_No']==0)
    {
      echo '<br />';
      echo '<h4>Unable to download your admit card. Please Contact Helpdesk 9560058919 or 011 40109443.</h4>';
      echo '<a href="https://www.amecet.in/student-login.php">Student Login</a>';
      exit();

    }



    $Registration_No =  $row["Registration_No"];

    $qry1 = "select * from amcet_result_2019 where RegNo = '$Registration_No'";
    $result1 = $db->_query($qry1);

    
    if(mysqli_num_rows($result1)<1)
    {
      echo $message = '<h4>Result uploading is in progress. You may try after some time or send query to us.</h4>';
      exit();
    }
    else
    {
      $row1 = mysqli_fetch_array($result1);  
      $qry_u = "UPDATE registration_new SET resultcard_download = resultcard_download + 1 WHERE txn = '$_SESSION[txn]'";
      if($db->_query($qry_u))
      {
        $message = 'Result Card download successfully !';
      }
      else
      {
        $message = 'please try again !';
      }  
    }
    

  }
  
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta content="NOINDEX, NOFOLLOW" name="ROBOTS">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<!-- Page Title -->
<title>AME CET 2019 Result Card</title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">


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



<style>
    #wrapper{
    }
    .main-content{
    text-transform: uppercase;

    }
    .admit_card_table{
      color: #000;
      border-bottom:2px solid #ccc;
    }
    .admit_card_table tr th{
      padding-bottom: 20px;
      font-size: 24px;
      border-bottom:2px solid #aaa;
    }
    .admit_card_table tr td{
      padding: 2px;
      font-size: 15px;
      text-align: left;
      border-bottom:2px solid #aaa;
      width: 25%;
    }
    .instructions{
      font-size: 13px;
    }

</style>
<script>
function myFunction() {
    window.print();
}
</script>

</head>
<div id="wrapper">

  <!-- Start main-content -->
  <div class="main-content">
          <div style="width: 1000px; margin: auto;">
              <div style="text-align: right; text-transform: none; font-size: 20px;">
                  <a >Admit Card </a>| 
                  <a onclick="myFunction()" href="javascript:void(null)">Print</a> |
                  <a href="http://52.76.246.184/dashboard/dashboard.php">Back</a> |
                  <a href="javascript:void(null)">Call Now +91 8800663006</a>
              </div>

              <div style="text-align: center;">
                <a><img height="150px;" src="https://www.amecet.in/images/logo.png" alt="aircraft maintenance engineer course"></a>
                <h1 style="margin: 5px 0 0 0; padding: 0">AME CET 2019 Result Card</h1>
              </div>

              
              
              
              <br /><br />
              
              <div style="border: 1px solid #333; padding: 2px;">
                    <table class="admit_card_table" width="100%" style="text-align: left;">
                          <tr>
                            <th colspan="2" style=" text-transform:none;">Registration No.: <?= $row['Registration_No']; ?></th>
                            <th  colspan="2" style="text-align: right; text-transform:none;">Hall Ticket No.: <?= $row['Hall_Ticket_No']; ?></th>
                            
                            
                          </tr>
                          <tr>
                            <td>Student Name: </td>
                            <td colspan="2"><b><?= $row['First_Name'].' '.$row['Last_Name']; ?></b></td>
                            
                            <td rowspan="6"  style="border: 3px solid #333; width: 18%">
                              <img src="https://www.amecet.in/admin/upload/<?= $row['image']?>" style="width: 100%; height: 200px;">
                            </td>
                          </tr>
                          <tr>
                            <td>Father's Name: </td>
                            <td><b><?= $row['Father_Name']; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Mother's Name: </td>
                            <td><b><?= $row['Mother_Name']; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Gender: </td>
                            <td><b><?= $row['Gender']; ?></b></td>
                            <td></td>
                          </tr>
                          
                          <tr>
                            <td>Address: </td>
                            <td colspan="2"><b>
                            <?php
                                echo $row['Address']; 
                                if($row['AddressLine2']!=""){ echo $row["AddressLine2"];}
                                if($row['City']!=""){ echo ', '.$row["City"];}
                                if($row['State']!=""){ echo ', '.$row["State"];}
                                if($row['Country']!=""){ echo ', '.$row["Country"];}
                                if($row['Pin']!=""){ echo ', PIN-'.$row["Pin"];}
                            ?></b></td>
                            
                          </tr>
                          
                          <tr>
                            <td>Examination Date:</td>
                            <td><b>5<sup>th</sup> May 2019 (Sunday)</b></td>
                            <td></td>
                          </tr>
                          

                          <tr>
                            <td colspan="4" style="padding: 50px;">
                              <div style="border: 1px solid #333; padding: 2px;">
                                    <table class="admit_card_table" width="100%" style="text-align: center;">
                                    <tr>
                                      <th colspan="2">Marks</th>
                                      <th  colspan="2">AIR</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><?= $row1['Marks']; ?>/360</th>
                                        <th colspan="2"><?= $row1['AIR']; ?></th>
                                    </tr>
                                  </table>
                                </div>
                          

                            </td>
                          </tr>


                          <tr>
                            <td colspan="4" style="text-transform:none;">
                                <br />
                                <img height="60px;" src="https://www.amecet.in/admin/upload/new sign.jpg" ><br />
                                <b>Examination Head<br />
                                Aircraft Maintenance Engineering Common Entrance Test (AME CET)<br />
                                www.amecet.in</b><br />
                                If you have any further queries please do not hesitate to contact us on  +91 8800663006, +91 9560058919, 011-40109443 or send a query on website www.amecet.in </b> <br /><br />
                            </td>
                            </tr>
                          <tr class="instructions">
                            <td colspan="4">
                            <ul style="list-style-type:disc; text-transform:none;">
                              
                            </ul>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2"><br /><a onclick="myFunction()" class="text-black" href="javascript:void(null)">Print</a> &nbsp; &nbsp; <a  class="text-black" href="https://www.amecet.in/dashboard.php">Back</a></td>
                            
                          </tr>
                    </table>
              </div>
      </div>
  </div>
  <!-- end main-content -->
  </div>

  
</body>

</html>
