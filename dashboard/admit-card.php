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



    $Place =  $row["Exam_Centre_Final"];

    $qry1 = "select * from exam_centre where Place = '$Place'";
    $result1 = $db->_query($qry1);

    
    if(mysqli_num_rows($result1)<1)
    {
      $message = 'Exam Center is double!';
      mysqli_num_rows($result1);
      exit();
    }
    $row1 = mysqli_fetch_array($result1);  

    $qry_u = "UPDATE registration_new SET admitcard_download = admitcard_download + 1 WHERE txn = '$_SESSION[txn]'";
    if($db->_query($qry_u))
    {
      $message = 'Exam Center Submitted Successfully !';
    }
    else{
      $message = 'please try again !';
    //  echo $qry;
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
                <h1 style="margin: 5px 0 0 0; padding: 0">AME CET 2019 Admit Card</h1>
                <h2 style="padding:0px; margin: 0px;  text-transform:none; font-size: 32px;">(Test Centre Code: <?= $row1['Code']; ?>)</h2>
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
                            <td><b>14<sup>th</sup> May 2019 (Sunday)</b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Examination Mode:</td>
                            <td><b><?= $row1['Mode']; ?></b></td>
                            <td></td>
                          </tr>
                          
                          <tr>
                            <td>Examination Timings:</td>
                            <td><b><?= $row1['Timing_From'].' - '.$row1['Timing_To']; ?></b></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Reporting Time:</td>
                            <td><b><?= $row1['Reporting_Time'];?></b></td>
                            <td></td>
                            <td></td>
                          </tr>

                          <tr>
                            <td>Examination Centre: </td>
                            <td><b><?= $row1['Place']; ?></b></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Examination Venue: </td>
                            <td colspan="3"><b><?= $row1['Address']; ?></b></td>                            
                          </tr>
                          <tr>
                            <td>Landmark: </td>
                            <td colspan="3"><b><?= $row1['Landmark']; ?></b></td>                            
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
                            <td colspan="4" style="text-align: center;"><h2 style="padding: 1px; margin: 3px;">Instructions</h2></td>
                          </tr>
                          <tr class="instructions">
                            <td colspan="4">
                            <ul style="list-style-type:disc; text-transform:none;">
                              <li> Please preserve this <b>Authenticated Admit Card</b> for further selection processes.</li>
                              <li>  At the time of examination, it is mandatory to produce the photo identity card as described here. AME CET Authorized Person will verify and authenticate your Admit Card against the photo-id.</li>
                              <li>Neither any candidate will be admitted 15 minutes after the commencement of the test nor any extra time granted for completing the test.</li>
                              <li>Candidates are to be in possession of the following when reporting to the test centre: 
                                <br />
                                <b>Document:</b> Admit Card, Proof of Address Original, Proof of Address Photocopy <br />
                                <b>Writing Materials:</b> Ball Point Pen, HB Pencils, Eraser and Sharpener.</li>
                              <li>All examination material such as Question Paper, Answer Sheet, objection slips, rough worksheets etc. must be returned to the Supervisor on completion of the examination.</li>
                              <li>The duration of the test is 1 hour 30 minutes. There are 90 questions. All questions are compulsory. Each question has four options marked (a), (b), (c) and (d).</li>
                              <li>All questions will be of the Multiple Choice Question (MCQ type).
                              <li>All the questions and instructions of the test will be in English & Hindi only.</li>
                              </li>

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
