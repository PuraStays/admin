
<?php
include_once("admin/includes/db.inc.php");
include_once("PHPMailer_5.2.1/class.phpmailer.php");

ini_set('display_errors', 0);

date_default_timezone_set('Asia/Kolkata');
$print_Date = date('Y-m-d H:i:s');
$print_date = date('d-m-Y H:i:s');





if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

$db = new DB();
if($_REQUEST['t'])
{


if($db->clm_value('Id', 'txn', 'registration_new', $_REQUEST["t"]) != "")
{

$txnid  = $_REQUEST['t'];

$row1 = mysqli_fetch_array($db->_query("select * from registration_new where txn = '$txnid' order by Status DESC limit 1"));

 

?>
<script>
function myFunction() {
    window.print();
}
</script>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta content="NOINDEX, NOFOLLOW" name="ROBOTS">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<!-- Page Title -->
<title>AME CET 2019 Acknowledgement Page</title>

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
      line-height: 20px;
    }
    .instructions{
      font-size: 13px;
    }
    .instructions li{
      line-height: 21px;
    }

</style>
<script>
function myFunction() {
    window.print();
}
</script>

<?php include_once("includes/meta.php"); ?>
</head>
<div id="wrapper">

  <!-- Start main-content -->
  <div class="main-content">
          <div style="width: 1000px; margin: auto;">
              <div style="text-align: right; text-transform: none; font-size: 20px;">
                  <a onclick="myFunction()" href="javascript:void(null)">Print</a> |
                  <a href="http://52.76.246.184/dashboard/dashboard.php">Back</a> |
                  <a href="javascript:void(null)">Call Now +91 8800663006</a> |
                  <a href="javascript:void(null)">Print Date:  <?= $print_date; ?></a>
                  <br />
                  <br />

                          

              </div>

              <div style="text-align: center;">
                <a><img height="150px; margin-top:15px;" src="https://www.amecet.in/images/logo.png" alt="aircraft maintenance engineer course"></a>
                <h1 style="margin: 5px 0 0 0; padding: 0">AME CET 2019 Acknowledgement</h1>
                <h3 style="margin: 0; padding: 0">Duplicate Copy</h3>

              </div>

              
              
              
              <br /><br />
              

              <div style="border: 1px solid #333; padding: 2px; margin-top: 20px;">
                    <table class="admit_card_table" width="100%" style="text-align: left;">
                        

                          <tr>
                            <th colspan="2" style=" text-transform:none;">Registration No.: <?= $row1['Registration_No']; ?></th>
                            
                            <th></th>

                            <th rowspan="8"  style="border: 3px solid #333; width: 18%;">
                              <img src="https://www.amecet.in/admin/upload/<?= $row1['image']?>" style="width: 100%; height: 250px;">
                            </th>
                          </tr>
                          <tr>
                            <td>Student Name: </td>
                            <td ><b><?= $row1['First_Name'].' '.$row1['Last_Name']; ?></b></td>
                            
                            <td></td>
                          </tr>
                          <tr>
                            <td>Mother's Name: </td>
                            <td><b><?= $row1['Mother_Name']; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Father's Name: </td>
                            <td><b><?= $row1['Father_Name']; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Category: </td>
                            <td><b><?= $row1['Category']; ?></b></td>
                            <td></td>
                          </tr>


                          <tr>
                            <td>Gender: </td>
                            <td><b><?= $row1['Gender']; ?></b></td>
                            <td></td>
                          </tr>
                          
                          <tr>
                            <td>Address: </td>
                            <td colspan="2"><b>
                            <?php
                                echo $row1['Address']; 
                                if($row1['AddressLine2']!=""){ echo $row1["AddressLine2"];}
                                if($row1['City']!=""){ echo ', '.$row1["City"];}
                                if($row1['State']!=""){ echo ', '.$row1["State"];}
                                if($row1['Country']!=""){ echo ', '.$row1["Country"];}
                                if($row1['Pin']!=""){ echo ', PIN-'.$row1["Pin"];}
                            ?></b></td>
                            
                          </tr>
                          <tr>
                            <td>City, State: </td>
                            <td colspan="2"><b>
                            <?= $row1["City"].', '.$row1["State"]; ?></b></td>
                            <td></td>
                          </tr>
                          
                          
                          <tr>
                            <td>Pin Code: </td>
                            <td colspan="2"><b>
                            <?= $row1["Pin"]; ?></b></td>
                            <td></td>
                          </tr>

                          <tr>
                            <td>Exam Centre Choice 1: </td>
                            <td colspan="2"><b>
                            <?= $row1["Exam_Centre_I"]; ?></b></td>
                            <td></td>
                          </tr>
                          
                          <tr>
                            <td>Exam Centre Choice 2: </td>
                            <td colspan="2"><b>
                            <?= $row1["Exam_Centre_II"]; ?></b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Registraion Fee: </td>
                            <td colspan="2"><b>
                            <?= $row1["Amount"]; ?>/-</b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Registraion Status: </td>
                            <td colspan="2"><b style="color: green;">Sucessfull</b></td>
                            <td></td>
                          </tr>
                          

                          <tr>
                            <td colspan="4" style="text-transform:none;">
                                <br />
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
                            <ul style="list-style-type:disc; text-transform:none; font-size: 18px;">

                              <li>  At the time of examination, it is mandatory to produce the photo identity card as described here. AME CET Authorized Person will verify and authenticate your Acknowledgement against the photo-id.</li>
                              <li>Candidates are to report to the allotted test centre at least 45 minutes before the scheduled commencement of the test.</li>
                              <li>Neither any candidate will be admitted 15 minutes after the commencement of the test not any extra time granted for completing the test.</li>
                              <li>Candidates are to be in possession of the following when reporting to the test centre: 
                                <br />
                                <b>Document:</b> Acknowledgement, Proof of Address Original, Proof of Address Photocopy <br />
                                <b>Writing Materials:</b> Ball Point Pen (Black/Blue), HB Pencils, Eraser and Sharpener.</li>
                              <li>All examination materials such as Question Paper, Answer Sheet, objection slips, rough worksheets etc. must be returned to the Supervisor on completion of the examination.</li>
                              <li>The duration of the test is 1 hour 30 minutes. There are 90 questions. All questions are compulsory. Each question has four options marked (a), (b), (c) and (d).</li>
                              <li>All questions will be of the Multiple Choice Question (MCQ type).
                              <li>All the questions and instructions of the test will be in English & Hindi only.</li>
                              <li>Blank sheets for rough work will be provided, if required.</li>
                              </li>

                            </ul>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2"><br /><a onclick="myFunction()" class="text-black" href="javascript:void(null)">Print</a> &nbsp; &nbsp; <a  class="text-black" href="http://52.76.246.184/dashboard/dashboard.php">Back</a></td>
                            
                          </tr>
                    </table>
              </div>
      </div>
  </div>
  <!-- end main-content -->
  </div>

  
</body>

</html>
<?php



}
else
{
  ?>
  <h3 style="color:green;">
        Registration already successful. <br /><br />
      <a href="https://www.amecet.in/apply-online.php">Back</a>
  </h3>
  <?php

}
}
else
{
  ?>
  <h3 style="color:red;">
        unauthorized access. <br /><br />
      <a href="https://www.amecet.in/apply-online.php">Back</a>
  </h3>
  <?php

}

?>
<br /><br /><br />