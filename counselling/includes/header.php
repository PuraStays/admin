<?php
    $qry = "select * from member where Owner_Email_Id = '$_SESSION[email]'";
    $db = new DB();
    $result = $db->_query($qry);
    $row = mysqli_fetch_array($result);
?>

<header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AME CET 2019</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AME CET 2019</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php
                  if($row['Image']!='')
                  {
                  ?>
                    <img src="upload/<?= $row['Image']; ?>" class="user-image" alt="<?= $row['Cafe']; ?>">

                  <?php
                }
                  ?> 
                  <span class="hidden-xs"><?= $row['Cafe']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php
                  if($row['Image']!='')
                  {
                  ?>
                    <img src="upload/<?= $row['Image']; ?>" class="user-image" alt="<?= $row['Cafe']; ?>">

                  <?php
                }
                  ?> 
                    <p>
                      <?= $row['Cafe']; ?>
                      <small><?= $row['Owner_Mobile_No']; ?></small>
                    </p>
               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php?m=management&p=profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="login.php?logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <?php /*?>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
              <?php */?>

            </ul>
          </div>
        </nav>
      </header>