<?php  include_once("includes/authentication.php");?>
<!DOCTYPE html>
<html>
  <?php
    include_once("includes/head.php");
    include_once('../dashboard/admin/includes/db.inc.php');
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php 
        include_once("includes/header.php");
      ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php 
        include_once("includes/left-menu.php");
      ?>


      <!-- Content Wrapper. Contains page content -->
      <?php
        if(isset($_REQUEST['m']))
        {
            if($_REQUEST['m']=='management')
              {

              if($_REQUEST['p']=='registration_new')
                  include_once("modules/management/registration_new/index.php");
                elseif($_REQUEST['p']=='registration_new-new')

                  include_once("modules/management/registration_new/new.php");
                elseif($_REQUEST['p']=='registration_new-edit')
                  include_once("modules/management/registration_new/edit.php");
                
                elseif($_REQUEST['p']=='profile')
                  include_once("modules/management/profile/index.php");
                
                elseif($_REQUEST['p']=='payment')
                  include_once("modules/management/payment/index.php");

                
                    elseif($_REQUEST['p']=='ame_institute')
                      include_once("modules/management/ame_institute/index.php");
                    elseif($_REQUEST['p']=='ame_institute-new')
                      include_once("modules/management/ame_institute/new.php");
                    elseif($_REQUEST['p']=='ame_institute-edit')
                      include_once("modules/management/ame_institute/edit.php");

                    elseif($_REQUEST['p']=='seat_hold')
                      include_once("modules/management/seat_hold/index.php");
                    elseif($_REQUEST['p']=='seat_hold-new')
                      include_once("modules/management/seat_hold/new.php");
                    elseif($_REQUEST['p']=='seat_hold-edit')
                      include_once("modules/management/seat_hold/edit.php");
                    
                    elseif($_REQUEST['p']=='counselling_done')
                      include_once("modules/management/counselling_done/index.php");
                    elseif($_REQUEST['p']=='counselling_done-new')
                      include_once("modules/management/counselling_done/new.php");
                    elseif($_REQUEST['p']=='counselling_done-edit')
                      include_once("modules/management/counselling_done/edit.php");
                    
                        
                
                else
                  include_once("includes/404.php");
              }
              elseif($_REQUEST['m']=='masters')
                  {          
                    if($_REQUEST['p']=='media')
                      include_once("modules/masters/media/index.php");
                    elseif($_REQUEST['p']=='media-new')
                      include_once("modules/masters/media/new.php");
                    elseif($_REQUEST['p']=='media-edit')
                      include_once("modules/masters/media/edit.php");


                    elseif($_REQUEST['p']=='events')
                      include_once("modules/masters/events/index.php");
                    elseif($_REQUEST['p']=='events-new')
                      include_once("modules/masters/events/new.php");
                    elseif($_REQUEST['p']=='events-edit')
                      include_once("modules/masters/events/edit.php");


                    
                    elseif($_REQUEST['p']=='source')
                      include_once("modules/masters/source/index.php");
                    elseif($_REQUEST['p']=='source-new')
                      include_once("modules/masters/source/new.php");
                    elseif($_REQUEST['p']=='source-edit')
                      include_once("modules/masters/source/edit.php");

                    elseif($_REQUEST['p']=='exam-centre')
                      include_once("modules/masters/exam-centre/index.php");
                    elseif($_REQUEST['p']=='exam-centre-new')
                      include_once("modules/masters/exam-centre/new.php");
                    elseif($_REQUEST['p']=='exam-centre-edit')
                      include_once("modules/masters/exam-centre/edit.php");
                    
                    elseif($_REQUEST['p']=='aboutus-edit')
                      include_once("modules/masters/aboutus/edit.php");

                      else
                        include_once("includes/404.php");
                    }
              elseif($_REQUEST['m']=='accounts')
                  {          
                   if($_REQUEST['p']=='seat_locked')
                      include_once("modules/accounts/seat_locked/index.php");
                    elseif($_REQUEST['p']=='seat_locked-edit')
                      include_once("modules/accounts/seat_locked/edit.php");

                    elseif($_REQUEST['p']=='counselling_done')
                      include_once("modules/accounts/counselling_done/index.php");
                    


                      else
                        include_once("includes/404.php");
                    }
              elseif($_REQUEST['m']=='sms')
                  {          
                    if($_REQUEST['p']=='sms_settings')
                        include_once("modules/sms/sms_settings/edit.php");
                    
                    elseif($_REQUEST['p']=='sms')
                      include_once("modules/masters/sms/index.php");
                    elseif($_REQUEST['p']=='sms-new')
                      include_once("modules/masters/sms/new.php");
                    elseif($_REQUEST['p']=='sms-edit')
                      include_once("modules/masters/sms/edit.php");
                    
                    elseif($_REQUEST['p']=='sms_series')
                      include_once("modules/sms/sms_series/index.php");
                    elseif($_REQUEST['p']=='sms_series-new')
                      include_once("modules/sms/sms_series/new.php");
                    elseif($_REQUEST['p']=='sms_series-edit')
                      include_once("modules/sms/sms_series/edit.php");
                    
                    elseif($_REQUEST['p']=='sms_series_for_registered')
                      include_once("modules/sms/sms_series_for_registered/index.php");
                    elseif($_REQUEST['p']=='sms_series_for_registered-new')
                      include_once("modules/sms/sms_series_for_registered/new.php");
                    elseif($_REQUEST['p']=='sms_series_for_registered-edit')
                      include_once("modules/sms/sms_series_for_registered/edit.php");
                    
                      else
                        include_once("includes/404.php");
                    }
                    else
                      {
                         printf("<script>location.href='index.php?m=management&p=profile'</script>");       
                         exit();
                    }

          }
        else
          {
               printf("<script>location.href='index.php?m=management&p=profile'</script>");       
               exit();
          }
      ?>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a target="_blank" href="http://gautambuddhainfotech.com">Gautam Buddha Infotech</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <?php include_once("includes/control-sidebar.php"); ?>
      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

   <?php include_once("includes/footer.php");?>
  </body>
</html>
