<?php
    include_once("../admin/includes/db.inc.php");
    date_default_timezone_set('Asia/Kolkata');
    $DOC = date('Y-m-d H:i:s');
    $DOU = date('Y-m-d H:i:s');
    $db = new DB();
?>

<?php
  function module_status($module){
    if(isset($_REQUEST['m']))
    {
      if($_REQUEST['m'] == $module){
        return ' active';
      }
    }
  }
  function sub_module_status($module){
    if(isset($_REQUEST['sm']))
    {
      if($_REQUEST['sm'] == $module){
        return ' active';
      }
    }
  }
  function page_status($page){
    if(isset($_REQUEST['p']))
    {
      if($_REQUEST['p'] == $page or $_REQUEST['p'] == $page.'-new' or $_REQUEST['p'] == $page.'-edit' or $_REQUEST['p'] == $page.'-next' ){
        return ' active';
      }
    }
  }

?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      
      <div class="pull-left info">
        <p><?= $row['Cafe']; ?></p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="treeview <?php echo module_status('management'); ?>">
        <a href="#">
          <i class="fa fa-share"></i> <span>Left Menu</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?= page_status('ame_institute'); ?>"><a href="index.php?m=management&p=ame_institute"><i class="fa fa-circle-o"></i> Seat Availability</a></li>
          
          <li class="<?= page_status('seat_hold'); ?>"><a href="index.php?m=management&p=seat_hold"><i class="fa fa-circle-o"></i> Seat Holded (<?= $db->select_count("select count(1) from amecet_2019_counselling where Seatlock_Status = '1' && Account_Status = '0' && 
          Seatlock_Centre = '$_SESSION[centre_id]' && Status <9");?>)</a></li>
          
        <!--
          <li class="<?= page_status('counselling_done'); ?>"><a href="index.php?m=management&p=counselling_done"><i class="fa fa-circle-o"></i> Counselling Done (<?= $db->select_count("select count(1) from amecet_2019_counselling where Seatlock_Status = '1' && Account_Status = '1' && 
          Seatlock_User_Id = '$_SESSION[id]' && Status <9");?>)</a></li>
      -->

        </ul>
	</li>
	<li class="treeview <?php echo module_status('accounts'); ?>">

		<a href="#">
          <i class="fa fa-share"></i> <span>Accounts</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        	
          <li class="<?= page_status('seat_locked'); ?>"><a href="index.php?m=accounts&p=seat_locked"><i class="fa fa-circle-o"></i>Seat Locked (<?= $db->select_count("select count(1) from amecet_2019_counselling where Seatlock_Status = '1' && Account_Status = '0' && 
          Seatlock_Centre = '$_SESSION[centre_id]' && Status <9");?>)</a></li>
          
          <li class="<?= page_status('counselling_done'); ?>"><a href="index.php?m=accounts&p=counselling_done"><i class="fa fa-circle-o"></i> Confirmed (<?= $db->select_count("select count(1) from amecet_2019_counselling where Seatlock_Status = '1' && Account_Status = '1' && 
          Seatlock_Centre = '$_SESSION[centre_id]' && Status <9");?>)</a></li>

        </ul>
        

        <a href="#">
          <i class="fa fa-share"></i> <span>Exit</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        
          
          <li><a href="login.php?logout"><i class="fa fa-circle-o"></i>Logout</a></li>
        </ul>
      </li>
       
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>