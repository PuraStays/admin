      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       
        <!-- Main content -->
        <section class="content">
          <h4>Payment Summary</h4>
          <?php include_once("includes/message_box.php");?>

          <?php
            $db = new DB();
            $User_Id = $_SESSION['id'];
            $qry = "select * from amecet_2019_counselling where User_Id = '$User_Id' && Seatlock_Status = 1 && Account_Status = 0 && Status < 9";
            $qry = "SELECT r.First_Name, r.Last_Name, 
                    r.Registration_No, r.Hall_Ticket_No, c.Institute_Id, c.Institute_Name , c.Stream, c.Seatlock_DOC, c.Id
                    FROM registration_new AS r
                    INNER JOIN amecet_2019_counselling AS c ON r.Registration_No = c.Registration_No
                    WHERE c.Seatlock_Status =1 && c.Account_Status =0 && c.Seatlock_User_Id = '$User_Id' && c.Status <9";




            $result = $db->_query($qry);
            $SN = 0;
          ?>
          
         

            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <h4 class="box-title">&nbsp; Payment Details</h4>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
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
                      while ($row = mysqli_fetch_array($result)) 
                            {
                              $SN++;
                              ?>
                                <tr>
                                  <td><?= $SN; ?></td>
                                  <td><?= $row['Registration_No']; ?></td>
                                  <td><?= $row['First_Name'].' '.$row['Last_Name']; ?></td>
                                  <td><?= $row['Institute_Name'].'('.$row['Institute_Id'].')'; ?></td>
                                  <td><?= $row['Stream']; ?></td>
                                  <td><?= $row['Seatlock_DOC']; ?></td>
                                </tr>
                              <?php            
                            }
                    ?>

                      
                      
                    </tbody>
                   <!--
                    <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </tfoot>
                    -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  </body>
</html>