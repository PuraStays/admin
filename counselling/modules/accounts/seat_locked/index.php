<?php
date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');

########## DELETE THE ACCOUNT
 if( $_REQUEST['task'] == "delete_single")
 {  

      $db=new DB();     
      $id=$_REQUEST['id'];
    
      $qry1="delete from amecet_2019_counselling where Id=$id";
      if($db->_query($qry1))
        {
          $message_success = "Record Deleted Successfully !";
        }
        else
        {
          $message_danger = "Unable to delete record. Please try again !";
        }

}

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <section class="content-header">
          <h1>
            Seat Locked
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php include_once("includes/message_box.php");?>

          <?php
            if(isset($_REQUEST['submit']) or isset($_REQUEST['current_page']))
            {
              if($_REQUEST['Submit']=='Search'){$_REQUEST["current_page"]=0;} else {$_REQUEST["current_page"] =  $_REQUEST['current_page']; }
              if($_REQUEST['s_User_Type']!=""){$s_User_Type = $_REQUEST['s_User_Type']; }              
              if($_REQUEST['s_Email_Id']!=""){$s_Email_Id = $_REQUEST['s_Email_Id']; }              
              if($_REQUEST['s_User_Name']!=""){$s_User_Name = $_REQUEST['s_User_Name']; }
              if($_REQUEST['s_Phone']!=""){$s_Phone = $_REQUEST['s_Phone']; }

            }
          ?>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
              <div class="box-body">
                  <?php include_once("includes/message_box.php");?>
                  <form name="frm" id="frm" method="post" >

                      <input type="hidden" name="current_page" id="current_page" value="<?= $_REQUEST['current_page']?>">
                      <input type="hidden" name="task" id="task" value="<?= $_REQUEST['task']?>">
                      <input type="hidden" name="m" id="m" value="<?= $_REQUEST['m']?>">
                      <input type="hidden" name="sm" id="sm" value="<?= $_REQUEST['sm']?>">
                      <input type="hidden" name="p" id="p" value="<?= $_REQUEST['p']?>">
                      <input type="hidden" name="id" id="id" value="<?= $_REQUEST['id']?>">

                      <div class="row">
                      
                        <div class="form-group col-md-2">
                            <input type="text" name="s_User_Name" id="s_User_Name" class="form-control" value="<?= $_REQUEST['s_User_Name']; ?>" placeholder="User Name">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="s_Email_Id" id="s_Email_Id" class="form-control" value="<?= $_REQUEST['s_Email_Id']; ?>" placeholder="Email Id">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="s_Phone" id="s_Phone" class="form-control" value="<?= $_REQUEST['s_Phone']; ?>" placeholder="Phone">
                        </div>
                       <div class="form-group col-md-1">
                            <button  name="Submit" value="Search" class="btn btn-primary btn-sm"  onclick="return Search()">Search</button>
                      </div>
                      
                </div>
                <div class="box-body">

                  

                    <?php
                    $db = new DB();
                    $User_Id = $_SESSION['id'];

                    $qry = "SELECT r.First_Name, r.Last_Name, 
                    r.Registration_No, r.Hall_Ticket_No, c.Institute_Id, c.Institute_Name , c.Stream, c.Seatlock_DOC, c.Id
                    FROM registration_new AS r
                    INNER JOIN amecet_2019_counselling AS c ON r.Registration_No = c.Registration_No
                    WHERE c.Seatlock_Status =1 && c.Account_Status =0 && Seatlock_Centre = '$_SESSION[centre_id]' && c.Status <9";
                    $result = $db->_query($qry);

                  ?>
                  
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                       <tr>
                        <th>SN</th>
                        <th>Registration No</th>
                        <th>Name</th>
                        <th>Institute</th>
                        <th>Stream</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    while($row = mysqli_fetch_array($result))
                    {
                      $Serial++;
                      ?>
                        <tr>
                          <td><?= $Serial; ?></td>
                          <td><?= $row['Registration_No']; ?></td>
                          <td><?= $row['First_Name'].' '.$row['Last_Name']; ?></td>
                          <td><?= $row['Institute_Name'].'('.$row['Institute_Id'].')'; ?></td>
                          <td><?= $row['Stream']; ?></td>
                          <td><?= $row['Seatlock_DOC']; ?></td>
                          <td class="actions">
                             <?php
                                  echo '<a Mobile="Edit" class="fa fa-pencil-square-o" onclick="return Edit('.$row['Id'].')" ></a> &nbsp;';  
                              ?>
                          </td>
                        </tr>
                      <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                
                  </form>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  </body>
</html>
<script type="text/javascript">

// edit single confirmation
function Edit(id ) {
          document.frm.task.value = "seat_locked-edit";
          document.frm.id.value  = id;
          document.frm.p.value  = 'seat_locked-edit';
          document.frm.submit();
         // return false;
}
</script>