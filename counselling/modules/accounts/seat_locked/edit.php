<?php
include_once("includes/db.inc.php");
    date_default_timezone_set('Asia/Kolkata');
    $DOC = date('Y-m-d H:i:s');
    $DOU = date('Y-m-d H:i:s');


?>
<script type="text/javascript">
  function Back() {
    document.frm.action = "index.php";
    document.frm.task.value = "counselling_done";
    document.frm.p.value  = 'counselling_done';
    document.frm.submit();
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Payment Section
      <p class="btn btn-primary btn-sm pull-right" onclick="return Back();">Back</p>
    </h1>
    
  </section>
       
  <section class="content">
  <div class="box box-default">
      <div class="box-body">
        <form name="frm" method="post" action="" >
          <input type="hidden" name="current_page" id="current_page" value="<?= $_REQUEST['current_page']?>">
          <input type="hidden" name="task" id="task" value="<?= $_REQUEST['task']?>">
          <input type="hidden" name="m" id="m" value="<?= $_REQUEST['m']?>">
          <input type="hidden" name="sm" id="sm" value="<?= $_REQUEST['sm']?>">
          <input type="hidden" name="p" id="p" value="<?= $_REQUEST['p']?>">
          <input type="hidden" name="id" id="id" value="<?= $_REQUEST['id']?>">

          <input type="hidden" name="s_User_Type" id="s_User_Type" value="<?= $_REQUEST['s_User_Type']?>">
          <input type="hidden" name="s_Phone" id="s_Phone" value="<?= $_REQUEST['s_Phone']?>">
          <input type="hidden" name="s_Email_Id" id="s_Email_Id" value="<?= $_REQUEST['s_Email_Id']?>">
          <input type="hidden" name="s_User_Name" id="s_User_Name" value="<?= $_REQUEST['s_User_Name']?>">

          <?php
          
              $Id = $_REQUEST['id'];
              
              if($_REQUEST['Submit'] == "Update") 
                  {       
                      $Id = $_REQUEST['id'];
                      $Payment_Amount = $_REQUEST['Payment_Amount'];
                      $Payment_Mode = $_REQUEST['Payment_Mode'];
                      $DD_Number  = $_REQUEST['DD_Number'];
                      $Payment_Status  = '1';
                      $Account_User_Type = $_SESSION['user_type'];
                      $Account_User_Name = $_SESSION['username'];
                      $Account_User_Id = $_SESSION['id'];
                      $Account_DOC = $DOC;
                      $Account_Status = 1;
                      $Status = 1;
                      
                      
                      if($Id != '')
                      {

                        $qry="UPDATE amecet_2019_counselling SET
                        Payment_Mode = '$Payment_Mode',
                        Payment_Amount = '$Payment_Amount',
                        DD_Number = '$DD_Number',
                        Payment_Status = '$Payment_Status',
                        Account_User_Type = '$Account_User_Type',
                        Account_User_Name = '$Account_User_Name',
                        Account_User_Id = '$Account_User_Id',
                        Account_DOC = '$Account_DOC',
                        Account_Status = '$Account_Status',
                        Status = '$Status',
                        DOU = '$DOU'
                        WHERE Id='$Id'";
                        
                    
                      $db=new DB();
                      if($db->_query($qry))                      
                            {
                                printf("<script>Back();</script>");
                                exit();    
                            }
                            else
                            {
                                $message_danger = "<strong>Sorry!</strong> Unable to perform action.";    
                            }
                       }
                       else
                       {
                                $message_danger = "<strong>Sorry!</strong> Unable to perform action.";    
                       }     
                    
                  }
                ?>
                <?php include_once("includes/message_box.php");?>

                 <?php
                 //////////////////////////////////////////////////Beginning of Select Data////////////////////////////////////////////////////////////////////   
                    $db=new DB();
                    $Id=$_REQUEST['id'];
                    
                   $qry = "SELECT r.First_Name, r.Last_Name, r.Father_Name,
                    r.Registration_No, r.Hall_Ticket_No, c.Institute_Id, c.Institute_Name , c.Stream, c.Seatlock_DOC, c.Id
                    FROM registration_new AS r
                    INNER JOIN amecet_2019_counselling AS c ON r.Registration_No = c.Registration_No
                    WHERE c.Seatlock_Status =1 && c.Account_Status =0 && c.Id = '$Id' && c.Status <9";
                    $result = $db->_query($qry);
                    $row = mysqli_fetch_array($result);

                    //var_dump($row);

                    
                //////////////////////////////////////////////////Ending of Select Data////////////////////////////////////////////////////////////////////
                ?>
            <div class="row">
             <div class="col-md-12">

                <div class="form-group col-md-2">
                  <label>Registration No<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['Registration_No']; ?>
                </div>

                <div class="form-group col-md-2">
                  <label>Hall Ticlet No<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['Hall_Ticket_No']; ?>
                </div>
             </div>
           </div>
            <div class="row">
             <div class="col-md-12">

                <div class="form-group col-md-2">
                  <label>Candidate Name<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['First_Name'].' '.$row['Last_Name']; ?>
                </div>

                <div class="form-group col-md-2">
                  <label>Father's Name<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['Father_Name']; ?>
                </div>
             </div>
           </div>
             <div class="row">
             <div class="col-md-12">
                <div class="form-group col-md-2">
                  <label>Institute<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['Institute_Name'].'('.$row['Institute_Id'].')'; ?>
                </div>

                <div class="form-group col-md-2">
                  <label>Stream<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <?= $row['Stream']; ?>
                </div>
            </div>
          </div>
             <div class="row">
             <div class="col-md-12">
                 <div class="form-group col-md-2">
                  <label>Payment Mode<span style="color:red">*</span></label>
                </div>
                  <div class="form-group col-md-4">
                      <select class="form-control select" name="Payment_Mode" id="Payment_Mode" required="required">
                        <option value="">Select Payment Mode</option>                      
                        <option value="DD">DD</option>
                        <option value="Cash">Cash</option>
                      </select>
                  </div>

                <div class="form-group col-md-2">
                  <label>DD Number<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="DD_Number" id="DD_Number" class="form-control" placeholder="DD_Number" required="required">
                </div>

               


                <div class="form-group col-md-2">
                  <label>Amount<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="Payment_Amount" id="Payment_Amount" class="form-control" placeholder="Payment Amount" required="required">
                </div>

              <div class="col-md-12">
                <div class="box-footer">
                    <button type="submit" name="Submit" value="Update" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </section>
</div>
