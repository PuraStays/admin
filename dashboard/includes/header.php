<?php 
  include_once("admin/includes/db.inc.php");

  $db = new DB();


  session_start();
  if(isset($_REQUEST['logout']))
  {
    session_destroy();
    printf("<script>location.href='https://www.amecet.in'</script>");
    exit();   
  }

?>


<header class="wow fadeInDown" data-offset-top="197" data-spy="affix">
  <div class="top-wrapper">
    <div class="container">
      <div class="row">
        
        <div class="col-md-7 col-sm-6 hidden-xs top-wraper-left">
        
          <ul>
            <li>
              <ul class="header-social-icons">
                <li class="facebook"><a href="https://www.facebook.com/amecet" target="_blank" title="AME CET Facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="google-plus"><a href="https://plus.google.com/u/0/110772930005541131727" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li class="twitter"><a href="https://twitter.com/AMECET2018"  target="_blank" title="AME CET Twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="youtube"><a href="https://www.youtube.com/channel/UCTZf_4d5buaqBfwXLrAOjtg" target="_blank"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </li>
          </ul>
        
        </div>
        
        <div class="col-md-5 col-sm-6 hidden-xs">
          <ul class="pull-right" style="color: #fff;">
            <?php 
              if(!isset($_REQUEST['logout']))
                {
                  if($_SESSION['login_status']=='login')
                  {
                    
                      echo 'Welcome <b>'.$_SESSION['username'].', </b>';
                      echo ' <a style="color: #fff;" href="'.$dashboard_url.'"> Dashboard</a>';
                      echo ' <a style="color: #fff;" href="?logout"> Logout</a>';
                  }
                  else
                  {
                    
                    echo '<li><i class="fa fa-phone" aria-hidden="true"></i> +91 8800 66 3006</li>';  
                    echo '<li> <a style="color: #fff; " href="http://52.76.246.184/dashboard/student-login.php"> Student Login</a></li>';

                  }
                }
              else
              {
                ?>
                  
                  <li><i class="fa fa-phone" aria-hidden="true"></i> +91 8800 66 3006</li>
                  <li> <a style="color: #fff;" href="http://52.76.246.184/dashboard/student-login.php"> Student Login</a></li>
                <?php
              }
             ?>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
  <div class="logo-bar">
    <div class="container"> 
      <!-- Logo --> 
      <!-- Navigation -->
      <div class="col-md-12 col-sm-12  col-xs-12 mainmenu-area no-padding">
        <nav class="navbar navbar-default mean-nav"> 
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="https://www.amecet.in/index.php">

              <img src="images/logo.png" alt="AME CET LOGO" title="AME CET LOGO" /></a> </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="mobile-menu nav navbar-nav">
              <li class="active"><a href="https://www.amecet.in/index.php">Home</a></li>
              
              
              
              <li> <a href="https://www.amecet.in/aircraft-maintenance-engineer-ame.php">AME Engineer</a> </li>


              <li> <a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-details.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AME Course<i class="fa hover-inn hover-inn fa-caret-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-details.php">AME Course Details</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-eligibility.php">AME Course Eligibility</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-syllabus.php">AME Course Syllabus</a></li>
                 
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-license.php">AME License</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-fees.php">AME Course Fees</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-admission-process.php">AME Admission Process</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-career-scope-opportunity.php">AME Career Opportunity</a></li>
                  
                  <!--  <li><a href="https://www.amecet.in/ame-institutes-in-india.php">AME Institutes</a></li>-->
                  
                </ul>

              
              <li> <a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AME CET Exam<i class="fa hover-inn hover-inn fa-caret-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php">About Exam</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#eligibility">Eligibility</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#exam-pattern">Exam Pattern & Syllabus</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#exam-mode">Exam Mode</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#application-process">Application Process</a></li>
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#scholarship">Scholarships</a></li>
                  <!--<li><a href="https://www.amecet.in/#counselling-process">Counselling Process</a></li>-->
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#amecet-2018-important-dates">Important Dates</a></li>
                  <li><a href="https://www.amecet.in/apply-online.php">Apply Online</a></li>
                  <li><a href="https://www.amecet.in/faq.php">FAQs</a></li>
                  <!--<li><a href="https://www.amecet.in/">AME CET 2018 Exam Centres</a></li>-->
                </ul>
              </li>
              <!--
              <li> <a href="https://www.amecet.in/javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">International Students <i class="fa hover-inn hover-inn fa-caret-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php">About Exam</a></li>
                  <li><a href="https://www.amecet.in/">Why Choose India</a></li>
                  <li><a href="https://www.amecet.in/">International student Lifestyle</a></li>
                  <li><a href="https://www.amecet.in/">Already in the India</a></li>
                  <li><a href="https://www.amecet.in/">Application Process</a></li>
                  <li><a href="https://www.amecet.in/">Counselling Process</a></li>
                  <li><a href="https://www.amecet.in/">Apply Now (Internation Student Only)</a></li>
                </ul>
              </li>
-->
              <li><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#scholarship">Scholarships</a></li>
              <li><a href="http://blog.amecet.in">Blog</a> </li>
              <li> <a href="https://www.amecet.in/contact-us.php">Contact Us</a> </li>
              <li> <a href="https://www.amecet.in/apply-online.php">Apply Now</a> </li>
              <?php
                if($db->is_mobile() == 1)
                  {
                   echo '<li> <a href="http://52.76.246.184/dashboard/student-login.php">Student Login</a> </li>';
                  }
              ?>

              

            </ul>
          </div>
          <!-- /.navbar-collapse --> 
        </nav>
      </div>
    </div>
  </div>
</header>


      <?php
          
          //if($db->is_mobile() != 1)
          if(1 == 1)
          {
            echo '<marquee attribute_name="attribute_value">';
            for($i=0; $i<30; $i++)
            {
              ?>
              
              <b><a href="http://52.76.246.184/dashboard/student-login.php"> AME CET 2019 result has be declared on 13 May 2019. Click her to download &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     </a>
              
              <?php
            }
            echo '</marquee>';
          }
        
          if(1==1)
          {
              echo '<ul style="text-align:right; background-color:#f18425; color:#fff; margin:0px; padding:5px 12px 5px 5px;">';
               if(!isset($_REQUEST['logout']))
                {
                  if($_SESSION['login_status']=='login')
                  {
                    
                      echo 'Welcome <b>'.$_SESSION['username'].', </b>';
                      echo ' <a style="color: #fff;" href="'.$dashboard_url.'"> Dashboard</a>';
                      echo ' <a style="color: #fff;" href="http://52.76.246.184/dashboard/student-login.php?logout"> Logout</a>';
                  }
                  else
                  {
                    
                    echo '+91 8800 66 3006 &nbsp; ';  
                    echo '<a style="color: #fff;" href="http://52.76.246.184/dashboard/student-login.php"> Student Login</a>';

                  }
                }
              else
              {
                ?>
                  
                  <i class="fa fa-phone" aria-hidden="true"></i> +91 8800 66 3006 &nbsp; 
                   <a style="color: #fff;" href="http://52.76.246.184/dashboard/student-login.php"> Student Login</a>
                <?php
              }
            echo '</ul>';
          }
          ?>
      