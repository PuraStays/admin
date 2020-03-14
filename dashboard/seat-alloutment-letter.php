<?php

/*
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

*/

include_once("admin/includes/db.inc.php");

$timezone = new DateTimeZone("Asia/Kolkata" );
$date = new DateTime();
$date->setTimezone($timezone);
$Curr_Time = $date->format('Y-m-d H:i:s');




// $txn = $_SESSION['txn'];
  $txn = $_REQUEST['t'];
  $qry = "select * from registration_new where txn = '$txn'";
  $qry = "SELECT r.First_Name, r.Last_Name, r.Registration_No, r.Gender, r.Category,  r.Hall_Ticket_No, r.Father_Name, r.Mother_Name, r.Address, r.AddressLine2, r.City, r.State, c.Institute_Id, c.Institute_Name, c.Stream FROM amecet_2019_counselling as c INNER JOIN registration_new as r ON r.Registration_No = c.Registration_No where  r.txn = '$txn' && c.Status = 1";




  $db = new DB();
  $result = $db->_query($qry);
  $row = mysqli_fetch_array($result);
  if(mysqli_num_rows($result)<1)
  {

    mysqli_num_rows($result);
    exit();
  }
  else
  {
  

   $institute = $row['Institute_Id'];
  
  $qry1 = "select * from ame_institute where Id = '$institute'";
   $result1 = $db->_query($qry1);

   $row1 = mysqli_fetch_array($result1);  


  
    

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
<title>AME CET 2019 Admit Card</title>

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
                <h1 style="margin: 5px 0 0 0; padding: 0">AME CET 2019 Seat Allotment Letter</h1>
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
                            
                            <td rowspan="7"  style="border: 3px solid #333; width: 18%">
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
                            <td>Category: </td>
                            <td><b><?= $row['Category']; ?></b></td>
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
                            <td>Institute:</td>
                            <td><b><?= $row['Institute_Name']; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Stream:</td>
                            <td><b><?= $row['Stream']; ?></b></td>
                            <td></td>
                          </tr>
                          
                          <tr>
                              <td colspan="4">
                                <p style="text-transform: none; font-size: 18px;">
                                  <strong>
                                Dear <b><b><?= $row['First_Name'].' '.$row['Last_Name']; ?></b></b>, <br><br>
                                
                                Congratulations!! <br /><br />We are pleased to inform you that based on your AME CET 2019 counselling
                                you have been offered seat Allotment letter for AME Course in 
                                <?= $row['Stream']; ?> Stream in <?= $row['Institute_Name']; ?>
                                approved by DGCA Ministry of Civil Aviation, Government of India.
                              
                                <h3 style="text-transform: none;">You are advised to report at Campus before 1<sup>st</sup> June 2019 for admission.</h3>

                                <h3 style="text-transform: none;"><strong>Note:-</strong> All the due payments of 1<sup>st</sup> Semester have to be made before 1<sup>st</sup> June 2019 through Demand Draft/ Cash in favour of <b><?= $row1['DD_Details'];?></b>. If you did not report at the institute before 1<sup>st</sup> June 2019 your seat may be offered to some one else. Counselling Fees is non-refundable in any case. When you take admission in institute this counselling fees will be adjusted in your I<sup>st</sup>  semester fees.</h3>
                              </p>
                              

                              </td>
                          </tr>

                            <tr>
                              <td colspan="4">
                                Document Required for Campus Reporting BEFORE 1<sup>th</sup> June, 2019
                                <ul>
                                  <li>AME CET 2019 Seat Allotment Letter</li>
                                  <li>4 passport size photographs of candidate</li>
                                  <li>1 passport size photograph of parents</li>
                                  <li>Photo Identity Card (Eg. Voter Card, Aadhar Card, School Id Card etc.)</li>
                                  <li>Color Blindness Certificate to be given by Registered Medical Practitioner holding atleast MBBS.</li>
                                  <li>Class X mark Sheet and Certificate</li>
                                  <li>Class XII mark Sheet and Certificate (optional)</li>
                                  <li>For diploma holders polytechnic mark sheet and certificate (optional)</li>
                                  <li>Cast certificate</li>
                                  <li>Original documents for verification of 10th & 12th marksheet from concern board</li>
                                  <li>First Semester Academic Fee INR <?= $row1['First_Sem_Fees']; ?>/- at the time of admission.</li>
                                
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
