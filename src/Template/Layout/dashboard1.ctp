<?php
//ini_set('display_errors', '0');    
session_start();
if($_SESSION["login_status"]!='login')
{
  printf("<script>location.href='http://admin.purastays.com/?logout'</script>");       
  exit();
}

function tab_status($arr, $param)
{
  foreach ($arr as $key => $value) {
    if($value==$param)
    {
      return 'active';
    }
  }     
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pura Stays | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->css('../bootstrap/css/bootstrap.min.css') ?>
    <!-- Font Awesome -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') ?>
    <!-- Ionicons -->
    <?= $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') ?>
    <!-- DataTables -->
    <?= $this->Html->css('../plugins/datatables/dataTables.bootstrap.css') ?>
    
    <!--datetimepicker -->
    <?= $this->Html->css('https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css') ?>
    
    <!-- Select2 -->
    <?= $this->Html->css("../plugins/select2/select2.min.css"); ?>
    
    <!-- datepicker -->
    <?= $this->Html->css('../plugins/datepicker/datepicker3.css') ?>


    <!-- Theme style -->
    <?= $this->Html->css('../dist/css/AdminLTE.min.css') ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?= $this->Html->css('../dist/css/skins/_all-skins.min.css') ?>

    <?= $this->Html->script('../plugins/jQuery/jQuery-2.1.4.min.js') ?>

     <!-- Bootstrap 3.3.5 -->
    <?= $this->Html->script('../bootstrap/js/bootstrap.min.js') ?>
    <!-- DataTables -->
    <?= $this->Html->script('../plugins/datatables/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('../plugins/datatables/dataTables.bootstrap.min.js') ?>
   
     <!-- Select2 -->
    <?= $this->Html->script('../plugins/select2/select2.full.min.js') ?>
       
    <!-- Select2 -->
    <?= $this->Html->script('../plugins/datepicker/bootstrap-datepicker.js') ?>


    <!-- datetimepicker -->
    <?= $this->Html->script('https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js') ?>
    
    <!-- SlimScroll -->
    <?= $this->Html->script('../plugins/slimScroll/jquery.slimscroll.min.js') ?>
    <!-- FastClick -->
    <?= $this->Html->script('../plugins/fastclick/fastclick.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('../dist/js/app.min.js') ?>
    <!-- AdminLTE for demo purposes -->
    <?= $this->Html->script('../dist/js/demo.js') ?>
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
        <?= $this->Html->script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') ?>
        <?= $this->Html->script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') ?>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Ex</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Pura</b>Stays</span>
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
              <?php /*?>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <?= $this->Html->image('../dist/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Name']); ?>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= $this->Html->image('../dist/img/user3-128x128.jpg', ['class' => 'img-circle', 'alt' => 'User Name']); ?>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= $this->Html->image('../dist/img/user4-128x128.jpg', ['class' => 'img-circle', 'alt' => 'User Name']); ?>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= $this->Html->image('../dist/img/user3-128x128.jpg', ['class' => 'img-circle', 'alt' => 'User Name']); ?>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= $this->Html->image('../dist/img/user4-128x128.jpg', ['class' => 'img-circle', 'alt' => 'User Name']); ?>
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <?php */?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?= $this->Html->image($_SESSION["User_Image"], ['class' => 'user-image', 'alt' => $_SESSION["Name"]]); ?>
                  <span class="hidden-xs"><?= $_SESSION["Name"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?= $this->Html->image($_SESSION["User_Image"], ['class' => 'img-circle', 'alt' => $_SESSION["Name"]]); ?>
                    
                    <p>
                      <?= $_SESSION["Name"]; ?>
                    <!--  <small>Member since Nov. 2012</small>-->
                    </p>
                    
                  </li>
                  <!-- Menu Body -->
                  <?php /*?>
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <?php */?>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="http://admin.purastays.com/?logout" class="">Sign out</a>
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
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?= $this->Html->image($_SESSION["User_Image"], ['class' => 'img-circle', 'alt' => $_SESSION["Name"]]); ?>
            </div>
            <div class="pull-left info">
              <p><?= $_SESSION["Name"]; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li  class="header">MAIN NAVIGATION</li>
            
            <li class="<?= tab_status(['Resorts', 'Clusters', 'Activities', 'Explorepuras', 'Stayprograms', 'Customers', 'Promotions'], $this->request->params['controller']); ?>" class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="<?php if($this->request->params['controller']=='Resorts'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Resorts', true), ['action' => 'index', 'controller'=>'Resorts'], ['escape'=>false]); ?></li>

                  <li class="<?php if($this->request->params['controller']=='Clusters'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Clusters', true), ['action' => 'index', 'controller'=>'Clusters'], ['escape'=>false]); ?></li>

                  <li class="<?php if($this->request->params['controller']=='Activities'){ echo 'active'; }?>">
                  <?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Activities', true), ['action' => 'index', 'controller'=>'Activities'], ['escape'=>false]); ?>
                  </li>
                  
                  <li class="<?php if($this->request->params['controller']=='Explorepuras'){ echo 'active'; }?>">
                  <?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Explore Pura ', true), ['action' => 'edit', 'controller'=>'Explorepuras', 1], ['escape'=>false]); ?>
                  </li>
                  
                  <li class="<?php if($this->request->params['controller']=='Stayprograms'){ echo 'active'; }?>">
                  <?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Stay Programs', true), ['action' => 'index', 'controller'=>'Stayprograms'], ['escape'=>false]); ?>
                  </li>

                  <li class="<?php if($this->request->params['controller']=='Customers'){ echo 'active'; }?>">
                  <?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Customers', true), ['action' => 'index', 'controller'=>'Customers'], ['escape'=>false]); ?>
                  </li>
                  
                  <li class="<?php if($this->request->params['controller']=='Promotions'){ echo 'active'; }?>">
                  <?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Promotions', true), ['action' => 'index', 'controller'=>'Promotions'], ['escape'=>false]); ?>
                  </li>
                  
              </ul>
            </li>
            
            <li class="<?= tab_status(['Images', 'Videos', 'Metas', 'Tags', 'Tagtypes', 'Features', 'Nearbyplaces', 'Testimonials', 'Stayprogramsgroups'], $this->request->params['controller']); ?>" class="treeview">
              <a href="#">
                <i class="fa fa-file-image-o"></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i>
              </a>

              <ul class="treeview-menu">
                <li class="<?php if($this->request->params['controller']=='Images'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Upload Image', true), ['action' => 'index', 'controller'=>'Images'], ['escape'=>false]); ?></li>

                <li class="<?php if($this->request->params['controller']=='Videos'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Upload Video', true), ['action' => 'index', 'controller'=>'Videos'], ['escape'=>false]); ?></li>

                <?php /*?>
                <li class="<?php if($this->request->params['controller']=='Metas'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Meta', true), ['action' => 'index', 'controller'=>'Metas'], ['escape'=>false]); ?></li>
                <?php */?>

                <li class="<?php if($this->request->params['controller']=='Tags'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Tag', true), ['action' => 'index', 'controller'=>'Tags'], ['escape'=>false]); ?></li>
                
                <li class="<?php if($this->request->params['controller']=='Tagtypes'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Tagtype', true), ['action' => 'index', 'controller'=>'Tagtypes'], ['escape'=>false]); ?></li>
                
                <li class="<?php if($this->request->params['controller']=='Features'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Features', true), ['action' => 'index', 'controller'=>'Features'], ['escape'=>false]); ?></li>

                <li class="<?php if($this->request->params['controller']=='Nearbyplaces'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Near By Places', true), ['action' => 'index', 'controller'=>'Nearbyplaces'], ['escape'=>false]); ?></li>

                <li class="<?php if($this->request->params['controller']=='Testimonials'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Testimonials', true), ['action' => 'index', 'controller'=>'Testimonials'], ['escape'=>false]); ?></li>
                
                <li class="<?php if($this->request->params['controller']=='Stayprogramsgroups'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Stay Programs Groups', true), ['action' => 'index', 'controller'=>'Stayprogramsgroups'], ['escape'=>false]); ?></li>

              </ul>
            </li>
            <li class="<?= tab_status(['Users', 'UserTypes'], $this->request->params['controller']); ?>" class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="<?php if($this->request->params['controller']=='Users'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'Users', true), ['action' => 'index', 'controller'=>'Users'], ['escape'=>false]); ?></li>
                  <li class="<?php if($this->request->params['controller']=='UserTypes'){ echo 'active'; }?>"><?= $this->Html->link(__('<i class="fa fa-circle-o"></i> '.'User Type', true), ['action' => 'index', 'controller'=>'User_Types'], ['escape'=>false]); ?></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> Change Password</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


      <?= $this->fetch('content') ?>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
      </footer>

      <!-- Control Sidebar -->
      <?php /*?>      
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <!--<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>-->
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside>
      <?php */?>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

   
    <!-- page script -->
    <script>

      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
<script>
      $(".select2").select2();
      function beforesubmit(){
      }
</script>
