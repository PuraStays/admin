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
<title >AME CET 2019 Scholarship | AME CET 2019</title>
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
    <![endif]-->
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
        <h1>Student Dashboard</h1>
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

                    <div class="single-page" style="padding-top: 20px;">
                    <div class="margin-top-30 paddint-top-20"></div>
                    

                   <h3 style="text-transform: none;">AME CET 2019 Scholarship</h4>
                  <p>Through AME CET 2019 scholarship programme the deserving/meritorious students can pursue Aircraft Maintenance Engineering Course. The educated youth will lead India to develop fast so AME CET 2019 is awarding scholarship to the talented students. The scholarship will be based on performance of the students. Award is available for qualified students, irrespective of student’s caste, gender, community and religion. This scholarship provides excellent opportunity to the students to build their golden career as AME.</p>

                  <p>The scholarship will be for the students who apply through AME CET 2019. It will be awarded on the tuition fee based on the All India Rank (AIR) of the students in AME CET 2019. The scholarship will be provided semester wise</p>
               

                <br />


                <p><strong>Scholarship layout</strong>:-</p>
                <div class="tab-pane" id="tab2">
                  <table class="table table-striped" style="text-align: center; vertical-align: middle;">
<tbody>
<tr>
<td >
<strong>S N</strong>
</td>
<td style="width: 250px;">
<strong>AME CET 2019 Rank</strong>
</td>
<td>
<strong>Max Candidates</strong>
</td>
<td>
<strong>Scholarship&nbsp; on</strong>
<strong>Tuition Fees</strong>
</td>
</tr>
<tr>
<td >
A
</td>
<td>
Topper of Central Board/State Board/AME CET
</td>
<td>
10
</td>
<td>
100%
</td>
</tr>
<tr>
<td >
B
</td>
<td>
2 to 10
</td>
<td>
9
</td>
<td>
75%
</td>
</tr>
<tr>
<td >
C
</td>
<td>
11 to 20
</td>
<td>
10
</td>
<td>
50%
</td>
</tr>
<tr>
<td >
D
</td>
<td>
21 to 100
</td>
<td>
80
</td>
<td>
25%
</td>
</tr>
<tr>
<td >
E
</td>
<td>
101 to 500
</td>
<td>
400
</td>
<td>
10%
</td>
</tr>
<tr>
<td >
F
</td>
<td>
501 to 2000
</td>
<td>
1500
</td>
<td>
5%
</td>
</tr>
</tbody>
</table>
&nbsp;
<p><strong>Section A:</strong> - It will be applicable for toppers of Central Board/State Board/AME CET who apply through AME CET 2019. The toppers of the following will be awarded with 100% scholarship on tuition fees throughout the AME course.&nbsp; The total numbers of candidates who can get the scholarship are maximum 10.</p>
<p><strong>Section B:</strong> - It will be applicable for the candidates who get AIR from 2 to 10 in AME CET 2019. The candidates will be awarded with scholarship of 75% on tuition fees throughout the AME course.</p>
<p><strong>Section C:</strong> - It will be applicable for the candidates holding the AIR from 11 to 20 in AME CET 2019. The candidates will be awarded with scholarship of 50% on tuition fees throughout the AME course.&nbsp;</p>
<p><strong>Section D:</strong> - It will be applicable for the candidates who have AIR from 21 to 100 in AME CET 2019. The candidates will be awarded with scholarship of 25% on tuition fees throughout the AME course.</p>
<p><strong>Section E:</strong> - It will be applicable for the candidates who have AIR from 101 to 500 in AME CET 2019. The candidate will be awarded with the scholarship of 10% on tuition fees throughout the AME course.</p>
<p><strong>Section F:</strong> - It will be applicable for the candidates who are having AIR from 501 to 2000 in AME CET 2019. The candidates will be awarded with the scholarship of 5 % on tuition fees throughout the AME course.</p>




<p><strong><u>Note</u></strong>: - First semester scholarship will be provided on the basis of AIR of AME CET 2019 and further semester&rsquo;s scholarship will be based on previous semester performance. The performances are based on the following factors:-</p>
<ul>
<li>The students have to clear all respective internal and external modules exams in respective semesters as per the Institute&rsquo;s syllabus in first attempt only. For example to get second semester&rsquo;s scholarship the student has to clear I<sup>st </sup>semester all modules within first semester in first attempt only.</li>
<li>Students have to fulfill the minimum attendance criteria as per DGCA norms.<br /> </li>
</ul>

<br />
<p><strong>Please read the terms and conditions carefully to avail the scholarship</strong>:</p>
<ul>
<li>Scholarship reward will be only valid for qualified students who get admission in AME institute in current academic session through AME CET 2019 Admission counselling.</li>
<li>Students found ineligible for admission at last stage, admission will cancelled at the allotted institute seat and scholarship will also be cancelled.</li>
<li>Once the scholarship will be cancelled. It will never be retained.</li>
<li>Students have to submit the no-dues and appreciation letter which will be provided by the institute.</li>
<li>Scholarship may increase or decrease according to the number of students enrolled in AME CET 2019 Examination.</li>
<li>All rights to make changes in AME CET 2019 Scholarship program are reserved to management.</li>
<li>If any misguiding and false information provided by the student, the scholarship and admission will be cancelled and legal action can be taken.</li>
<li>All legalities and disputes will be subject to Delhi judiciary only.</li>
</ul>

<br />
<p><strong>Scholarship Procedure:-</strong></p>
<ul>
<li>Students have to fill the Scholarship form from AME CET official website <a href="http://www.amecet.in">amecet.in</a>.</li>
<li>Students have to note the registration number and date of online exam.</li>
<li>The students have to submit scholarship form with related documents in 2<sup>nd</sup> to 3<sup>rd</sup> week of November for the first scholarship.</li>
<li>The students will receive their scholarship in month of December in the registered bank account.</li>
<li>Scholarship will be received by students in bank account only.</li>
<br />
</ul>

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