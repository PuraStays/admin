      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       
        <!-- Main content -->
        <section class="content">
          <h4>Payment Summary</h4>
          <?php include_once("includes/message_box.php");?>

          <?php
            $db = new DB();
            $member_id = $_SESSION['member_id'];
            $qry = "select 1 from registration_new where member_id = '$member_id' && Status = '1'" ;
            $result = $db->_query($qry);
            $reg_no = mysqli_num_rows($result);

            $Incentive = $db->clm_value('Incentive', 'email', 'member', $member_id);


            $qry1 = "select * from members_incentive where Member_Id = '$member_id'";
            $result1 = $db->_query($qry1);
            
            $Total_Registrations = 0;
            $Total_Incentive = 0;
            $Total_Paid = 0;
            $Total_Unpaid = 0;


            while ($row1 = mysqli_fetch_array($result1)) 
              {
                $Total_Registrations++;

                  $Total_Incentive = $Total_Incentive + $row1['Amount'];

                  if($row1['Payment_Status']==1)
                  {
                      $Total_Paid = $Total_Paid + $row1['Amount'];
                  }
                  else
                  {
                    $Total_Unpaid = $Total_Unpaid + $row1['Amount'];
                  }
                }

            //

                if($reg_no != $Total_Registrations)
                {
                  echo '<div class="alert alert-danger">
                          These is some technical issue ! Please Contact 8800663006, 011 40109443 or send email to info@amecet.in
                        </div>';
                  echo '';

                  exit();
                }


            $qry2 = "select * from members_incentive where Member_Id = '$member_id' && Payment_Status = '1'";
            $result2 = $db->_query($qry2);
            $SN = 0;
          ?>
          
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Registrations</span>
                  <span class="info-box-number"><?= $Total_Registrations;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box"> 
                <span class="info-box-icon bg-aqua"><i class="fa fa fa-inr"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Amount</span>
                  <span class="info-box-number">INR <?php echo $Total_Incentive;;?>.00</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Paid Amount</span>
                  <span class="info-box-number">INR <?= $Total_Paid; ?>.00</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Amount to be Paid</span>
                  <span class="info-box-number">INR <?= $Total_Unpaid; ?>.00</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <h4 class="box-title">&nbsp; Payment Details</h4>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Transaction Id</th>
                        <th>Registration No</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      while ($row2 = mysqli_fetch_array($result2)) 
                            {
                              $SN++;
                              ?>
                                <tr>
                                  <td><?= $SN; ?></td>
                                  <td><?= $row2['Transaction_Id']; ?></td>
                                  <td><?= $row2['Registration_No']; ?></td>
                                  <td><?= $row2['Amount']; ?></td>
                                  <td><?= $row2['Payment_Mode']; ?></td>
                                  <td><?= $row2['Payment_Date']; ?></td>
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