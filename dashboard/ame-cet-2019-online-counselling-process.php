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
<title >AME CET 2019 Counselling & Admission Process | AME CET 2019</title>
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

<!--<div id="dvLoading"></div>-->
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
        
                   <h3 style="text-transform: none;">AME CET 2019 Online Counselling & Seat Allotment Procedure</h4>
                    <p>Candidates who have qualified in the AME CET 2019 exam are invited for counselling for Aircraft Maintenance Engineering (AME) in the top most AME institutes approved by Directorate General of Civil Aviation, Ministry of Civil Aviation and Government of India. The counselling will be conducted in both online and offline mode. The candidate can choose either online or offline mode of counselling as their suitability. Candidates for the various disciplines will have to attend the counselling as per the given schedule in counselling letter. </p>

                    <p>If the candidate is unable to report at the counselling centre at the scheduled date as per his/her rank due to any reason, he/she may report at a later date but he/she may be eligible for counselling only for the available seats on that day.  </p>

                    <h4>Counselling schedule: </h4>
                    <ul>
                     <li> The counselling date and time will be mentioned on their counselling letter.</li>
                     <li>The schedule for online and offline counselling is same for both.</li>
                    </ul>
            
                    <h4>Counselling Fee:</h4>
                    <ul>
                        <li>The candidate has to submit INR 25000/- as counselling fee in both online and offline mode. If candidate did not get any seat during counselling, then his counselling feewill be 100% refunded.</li>
                        <li>If seat is allotted to the candidate, then the counselling fee will be adjusted in final course fee. </li>
                        <li>The remaining fee has to pay at the institute only.</li>
                    </ul>


                   


                    <br />
                    <h3>Counselling Process: </h3>
                    <p>There are two mode of counselling for AME CET 2019</p>

                    <br />

                    <h3>Offline Counselling Process:</h3>
                    <p>The offline counselling will be held on five centres. The student can choose the offline counselling center according to their suitability. </p>
                    <p>Candidates have to carry the entire necessary document at the time of counselling. The list of required documents for counselling is as follow:</p>

                    <ul>
                        <li>Counselling Letter</li>
                        <li>AME CET  2019 Admit Card</li>
                        <li>4 passport size photographs of candidate</li>
                        <li>1 passport size photograph of parents</li>
                        <li>Photo identity card (Eg. Voter Card, Aadhar Card, School Id Card etc.)</li>
                        <li>Date of birth proof</li>
                        <li>Class X mark sheet and certificate </li>
                        <li>Class XII mark sheet and certificate (optional)</li>
                        <li>For diploma holders polytechnic mark sheet and certificate (optional)</li>
                        <li>Demand Draft of Rs. <strong>25000/-</strong> as counselling fee in favor of <strong> AME CET </strong> Payable at New Delhi</li>
                    </ul>

                    <h4>Counselling Centre:</h4>
                    <p>The offline counselling held on 5 centres in India </p>
                    <div class="tab-pane" id="tab2">
                  <table class="table table-striped">
<tbody>
<tr>
<td>
<p><strong>SN</strong></p>
</td>
<td>
<p><strong>Counselling Centre </strong></p>
</td>
<td>
<p><strong>Address</strong></p>
</td>
</tr>
<tr>
<td>
<p>1</p>
</td>
<td>
<p>Delhi/NCR</p>
</td>
<td>
<p><strong>Mohan International School</strong><br /> C-56A/21, Institutional Area, Block B, Industrial Area, <br /> Sector 62, Noida, Uttar Pradesh-201301 <br /> Near Fortis Hospital, Noida<br /> Nearest Metro Station: Noida Sector 62</p>
<p><strong>Helpdesk: 8800663006</strong></p>
</td>
</tr>
<tr>
<td>
<p>2</p>
</td>
<td>
<p>Dehradun, UK</p>
</td>
<td>
<p><strong>Alpine Institute of Aeronautics</strong><br /> Chakarata Rd, Nanda Ki Chowki, Prem Nagar, <br /> Dehradun, Uttarakhand 248007<br /> <strong>Helpdesk: 8800433306</strong></p>
</td>
</tr>
<tr>
<td>
<p>3</p>
</td>
<td>
<p>Patna, Bihar</p>
</td>
<td>
<p><strong>HONEY DEW POINT SCHOOL </strong><br /> Bharti Bhawan Campus, Thakurbari Road, Near Churi Market, <br /> Opposite Mahavir Mandir, Patna Bihar- 800004</p>
<p><strong>Helpdesk: 8383801693</strong></p>
</td>
</tr>
<tr>
<td>
<p>4</p>
</td>
<td>
<p>Aurangabad, Maharashtra</p>
</td>
<td>
<p><strong>Institute Of Aircraft Maintenance Engineering</strong>,<br /> Surana Nagar, Shahnoorwadi, Govt Polytechnic, Peer bazaar, Osmanpura, <br /> Aurangabad, Maharashtra 431005</p>
<p><strong>Helpdesk: 9560096687</strong></p>
</td>
</tr>
<tr>
<td>
<p>5</p>
</td>
<td>
<p>Kanyakumari, Tamil Nadu</p>
</td>
<td>
<p><strong>HCAT AME Institute</strong><br /> Nnoorul Islam University Campus, Thuckalay, <br /> Kumaracoil, Tamil Nadu 629180</p>
<p><strong>Helpdesk: 9946668103</strong></p>
</td>
</tr>
</tbody>
</table>
</div>
                    <p>The candidate has to visit the venue at scheduled time and date provided on their Counselling Letter.</p>

                    <br />
                    <h3>Online Counselling Process</h3>
                    <p>Online counselling can be done from anywhere either from their home or cyber cafes where internet connectivity is good. Candidates have to Login on www.amecet.in website at scheduled time and date allotted to him on counselling letter. The college and their available seats are visible to candidate. The candidate has to choose institute and stream after that he have to pay counselling fee to confirm his/her seat. If fee is submitted successfully then the chosen seat will be allotted to the candidate and a seat allotment letter will be generated at the same time. He / She can download or print seat allotment letter for further reference. Candidates will have to report at the allotted institute for document verification and admission process. They also have to pay the balance fees in the institute.</p>

                    <strong>The Online Counselling and seat allotment of AME CET 2019 involves the following steps:</strong>

                    <p>
                        Step 1 - Student Login to portal www.amecet.in. <br />
                        Step 2 - Online Choice Filling <br />
                        Step 3 – Payment of Fee & Seat locking.<br />
                        Step 4 – Seat allotment.<br />
                        Step 5 – Verification of document at allotted institute.<br />
                        Step 6 – Final Reporting at the Allotted Institute.<br />
                      </p>


                      <p><b>Online login.</b> Candidates will have to login themselves to the www.amecet.in online with Registered Email Id & Password.</p>
                      <p><b>Online College selection:</b> In this step, candidates will have to choose college and AME streams which are visible to the candidate. The college and their available seats are visible to candidate real-time. The seat which is opt by the candidate will be hold till the payment of allotment fees.</p>
                      <br />
                      
                      <p><b>Payment of Fee & Seat locking:</b> After selecting the college seat, Candidates will have to pay the fees through debit card, credit card or net banking. The seat allotment fee is Rs. 25,000 for all the candidates. Your seat will be on hold for 10 mins in that time the candidate has to pay their allotment fee and lock their choice. If candidate is unable to pay fees within 10 mins, candidate has to choose institute and stream again and then do payment.</p>
                      
                      <br />
                      <p> <b>Seat allotment-</b> If the payment of the candidate will successful within 10 min then the selected seat will be allotted to him. The candidate can view or download their seat allotment letter, which is required at the time of admission in allotted college. </p>

                      <br />
                      <p><b>Verification of Documents:</b> In this step, candidates will have to get their documents verified at the allotted institute. The following documents have to be verified by the candidates:

                        <ul>
                          <li>4 passport size photographs</li>
                          <li>AME CET 2019 seat allotment letter</li>
                          <li>Photo identity card</li>
                          <li>Proof of seat acceptance fee payment</li>
                          <li>AME CET 2019 Admit Card</li>
                          <li>Medical form (color blindness) duly signed by registered physician.</li>
                          <li>Date of birth proof</li>
                          <li>AME CET 2019 Result Card</li>
                          <li>Class X, XII original mark sheet. (for diploma candidate final year original mark sheet of diploma along with X mark sheet)</li>
                        </ul>
                      </p>
                      <p>Final Reporting at the Allotted Institute: Candidates will have to report at the allotted institute for further admission process. They also need to pay the balance fees in the institute.</p>
                      <br />

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