<?php
date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <section class="content-header">
          <h1>
            Seat Confirmed
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php include_once("includes/message_box.php");?>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
              <div class="box-body">
                  <?php include_once("includes/message_box.php");?>
                  <form name="frm" id="frm" method="post" >

                      
                      
                </div>
                <div class="box-body">

                  

                    <?php
                    $db = new DB();
                    $User_Id = $_SESSION['id'];

                    $qry = "SELECT r.First_Name, r.Last_Name, 
                    r.Registration_No, r.Hall_Ticket_No, r.txn, c.Institute_Id, c.Institute_Name , c.Stream, c.Seatlock_DOC, c.Id
                    FROM registration_new AS r
                    INNER JOIN amecet_2019_counselling AS c ON r.Registration_No = c.Registration_No
                    WHERE c.Seatlock_Status =1 && c.Account_Status =1 && Seatlock_Centre = '$_SESSION[centre_id]' && c.Status =1";
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
                             
                             
                                  echo '<a Name="Fee Structure" title="Fee Structure" target="_blank" class="fa fa-print" href="http://52.76.246.184/dashboard/upload/'.$db->clm_value("Fee_Structure", 'Id', "ame_institute", $row['Institute_Id']).'" ></a> &nbsp;';  
                                  echo '<a Name="Offer Letter" title="Offer Letter" class="fa fa-print"  target="_blank" href="http://52.76.246.184/dashboard/seat-alloutment-letter.php?t='.$row['txn'].'"></a> &nbsp;';  
                                  
                                  echo '<a Name="Fee Receipt" title="Fee Receipt" class="fa fa-print"  target="_blank" href="http://52.76.246.184/dashboard/amecet-2019-fee-receipt.php?t='.$row['txn'].'"></a> &nbsp;';  



                                  
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