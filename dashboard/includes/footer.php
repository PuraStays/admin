<footer>
  <div class="container">
    <div class="row row-flex">
      <div class="col-md-3 col-sm-6">
        <div class="intro">
          <div class="flogo"> AME CET</div>
          <p class="intro-content">Aircraft maintenance engineering common entrance test (AME CET) is the entrance test for Aircraft Maintenance Engineer is conducted nationwide at various centres across India through which candidates can secure admissions for Aircraft maintenance Engineering (AME) course in approved AME institutes.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="extralinks footer">
          <h4 class="title">Important Links</h4>
          <div class="extralinks-cols">
            <ul class="extralinks-col">
              
              <!--<li> <a href="https://www.amecet.in/apply-online.php?new" title="Home">Apply Now</a> </li> -->
              <li> <a href="https://www.amecet.in" title="Home">Home</a> </li>
              <li> <a href="https://www.amecet.in/about-us.php">About us</a> </li>
              <li> <a href="https://www.amecet.in/mission-and-vision.php">Mission & Vision</a> </li>
              <li> <a href="https://www.amecet.in/aircraft-maintenance-engineering-ame-course-details.php">AME Course</a> </li>
              <li> <a href="https://www.amecet.in/apply-online.php">Apply Now</a> </li>
              <?php //<li> <a target="_blank" href="#4%%#3privacy-policy*7482.php#893">Privacy Policy</a> </li> ?>
              <?php //<li> <a target="_blank" href="#4%%#3cancellation-and-return-policy.php#4%%#3">Cancellation & return Policy</a></li> ?>
              

            </ul>
            <ul class="extralinks-col">
              <li> <a href="https://www.amecet.in/blog">Blog</a> </li> 
              <li> <a href="https://www.amecet.in/downloads.php">Downloads</a> </li>
              <li> <a href="https://www.amecet.in/faq.php">FAQ's</a> </li>
              <li> <a href="https://www.amecet.in/contact-us.php">Contact Us</a> </li>
              <?php // <li> <a target="_blank" href="#4%%#3legal.php#4%%#3">Legal</a> </li> ?>
              <?php //<li> <a target="_blank" href="#4%%#3terms-and-conditions.php#4%%#3">Terms & Conditions </a></li> ?>
              
              <li> <a href="https://www.amecet.in/associates/login.php">Associates Login</a> </li>
            </ul>
          </div>
        </div>
      </div>

      <?php
      $db = new DB();
      if($db->is_mobile() != 1)
      {
      ?>
      <div class="col-md-3 col-sm-6">
        <div class="address">
          <h4 class="title">How to reach to AME CET</h4>
          <div class="extralinks-cols">
            <ul class="extralinks-col">
              <li> <span class="fcontact-icon fa fa-clock-o"></span> Mon-Sat 10:00 AM-5:00 PM<br>Sunday Closed </li>
              <li><span class="fcontact-icon fa fa-map-marker"></span>C-707, IIIrd Floor, Ramphal Chowk Rd, Sector 7 Dwarka, New Delhi-110075</li>
              <li><span class="fcontact-icon fa fa-phone"></span>+91 8800663006</li>
              <li><span class="fcontact-icon fa fa-phone"></span>011 40109443</li>

            </ul>
          </div>
        </div>
      </div>

      <?php
           }
      ?>
      <div class="col-md-3 col-sm-6">
        <div class="subcribe-main">
         <?php include_once("includes/subscribe.php"); ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Copyright Wrapper Start -->
<div class="copyright-wrapper">
  <div class="container"> 
      <p  style="text-align: left;">
        *Approved institutes are those institutes which are approved by DGCA, under Ministry of civil aviation, Govt of India. &nbsp; **Can be accessed from relevant institute/college official website. &nbsp; ***For exact detail refer institute/college official website.
      </p>

  </div>
</div>
