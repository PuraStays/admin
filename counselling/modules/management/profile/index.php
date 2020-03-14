<?php
    date_default_timezone_set('Asia/Kolkata');
    $DOC = date('Y-m-d H:i:s');
    $DOU = date('Y-m-d H:i:s');

?>
<script type="text/javascript">
  function Back() {
    document.frm.action = "index.php";
    document.frm.task.value = "user";
    document.frm.p.value  = 'user';
    document.frm.submit();
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Profile
      <p class="btn btn-primary btn-sm pull-right" onclick="return Back();">Back</p>
    </h1>
    
  </section>
       
  <section class="content">
  <div class="box box-default">
      <div class="box-body">
        <form name="frm" method="post" action="">
          <input type="hidden" name="current_page" id="current_page" value="<?= $_REQUEST['current_page']?>">
          <input type="hidden" name="task" id="task" value="<?= $_REQUEST['task']?>">
          <input type="hidden" name="m" id="m" value="<?= $_REQUEST['m']?>">
          <input type="hidden" name="sm" id="sm" value="<?= $_REQUEST['sm']?>">
          <input type="hidden" name="p" id="p" value="<?= $_REQUEST['p']?>">
          <input type="hidden" name="id" id="id" value="<?= $_SESSION['id']?>">

          <input type="hidden" name="s_User_Type" id="s_User_Type" value="<?= $_REQUEST['s_User_Type']?>">
          <input type="hidden" name="s_Phone" id="s_Phone" value="<?= $_REQUEST['s_Phone']?>">
          <input type="hidden" name="s_email" id="s_email" value="<?= $_REQUEST['s_email']?>">
          <input type="hidden" name="s_User_Name" id="s_User_Name" value="<?= $_REQUEST['s_User_Name']?>">

          <?php
          
              $Id = $_SESSION['id'];
              
              if($_REQUEST['Submit'] == "Update") 
                  {       
                     $Id = $_SESSION['id'];
                      $Image = $_FILES["Image"]["name"];
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $gender = $_POST['gender'];
                      $email = $_POST['email'];
                      $member_type = $_POST['member_type'];
                      $Mobile = $_POST['Mobile'];
                      $AddressLine1 = $_POST['AddressLine1'];
                      $AddressLine2 = $_POST['AddressLine2'];
                      $City = $_POST['City'];
                      $PostalCode = $_POST['PostalCode'];
                      $State = $_POST['State'];
                      

                       $qry="UPDATE member SET
                        username = '$username',
                        password = '$password',
                        gender = '$gender',
                        email = '$email',
                        member_type = '$member_type',
                        Mobile = '$Mobile',
                        AddressLine1 = '$AddressLine1',
                        AddressLine2 = '$AddressLine2',
                        City = '$City',
                        PostalCode = '$PostalCode',
                        State = '$State',
                        DOC = '$DOC',
                        DOU = '$DOU'
                        WHERE Id='$Id'";
                        $Image = 'Member_'. $Id .'_'. $Image;    
                    
                      $db=new DB();
                      if($db->_query($qry))                      
                            {


                                //printf("<script>Back();</script>");
                                //exit();    
                            }
                            else
                            {
                                $message = "Unable to Update Record. Please try again !";
                            }
                       }
                       else
                       {
                                $message = "Please select another Parents. Please try again !";
                       }     
                    
                  
                ?>
                <?php include_once("includes/message_box.php");?>

                 <?php
                 //////////////////////////////////////////////////Beginning of Select Data////////////////////////////////////////////////////////////////////   
                    $db=new DB();
                    $result = $db->_query($qry);    
                    $Id = $_SESSION['id'];
                    $qry="SELECT * from member where Id = '$Id'";
                    $db=new DB();
                    $result = $db->_query($qry);
                    while($rows = mysqli_fetch_array($result))
                    {
                        $Image = $rows['Image'];
                        $Owner_Name = $rows['Owner_Name'];
                        $password = $rows['password'];
                        $Owner_Gender = $rows['Owner_Gender'];
                        $Owner_Email_Id = $rows['Owner_Email_Id'];
                        $member_type = $rows['member_type'];
                        $Owner_Mobile_No = $rows['Owner_Mobile_No'];
                        $AddressLine1 = $rows['AddressLine1'];
                        $AddressLine2 = $rows['AddressLine2'];
                        $City = $rows['City'];
                        $PostalCode = $rows['PostalCode'];
                        $State = $rows['State'];
                        $Status = $rows['Status'];
                        $DOC = $rows['DOC'];
                        $DOU = $rows['DOU'];
                     }
                //////////////////////////////////////////////////Ending of Select Data////////////////////////////////////////////////////////////////////
                ?>
            <div class="row">
             <div class="col-md-12">
            

                <div class="form-group col-md-2">
                  <label>User Name<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="username" id="username" class="form-control" value="<?= $Owner_Name; ?>" placeholder="User Name" readonly="readonly" >
                </div>

                <div class="form-group col-md-2">
                  <label>Email Id<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="email" id="email" class="form-control" value="<?= $Owner_Email_Id; ?>" placeholder="Email Id" required="required" readonly="readonly" >
                </div>
                <div class="form-group col-md-2">
                  <label>Mobile<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="Mobile" id="Mobile" class="form-control" value="<?= $Owner_Mobile_No; ?>" placeholder="Mobile" readonly="readonly" >
                </div>

                <div class="form-group col-md-2">
                  <label>Gender<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="gender" id="gender" class="form-control" value="<?= $Owner_Gender; ?>" placeholder="gender" readonly="readonly" >
                </div>

                
                <div class="form-group col-md-2">
                  <label>Password<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-3">
                  <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>" placeholder="Password"  >
                </div>
                <div class="form-group col-md-1">
                  <a id="text_1" href="#" onclick="show_pass();">Show</a>
                </div>


                <div class="form-group col-md-2">
                  <label>Address Line 1<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="AddressLine1" id="AddressLine1" class="form-control" value="<?= $AddressLine1; ?>" placeholder="AddressLine1" readonly="readonly" >
                </div>

                <div class="form-group col-md-2">
                  <label>Address Line 2<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="AddressLine2" id="AddressLine2" class="form-control" value="<?= $AddressLine2; ?>" placeholder="AddressLine2" readonly="readonly" >
                </div>


                <div class="form-group col-md-2">
                  <label>City<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="City" id="City" class="form-control" value="<?= $City; ?>" placeholder="City" readonly="readonly" >
                </div>

                <div class="form-group col-md-2">
                  <label>State<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="State" id="State" class="form-control" value="<?= $State; ?>" placeholder="State" readonly="readonly" >
                </div>

                <div class="form-group col-md-2">
                  <label>Postal Code<span style="color:red">*</span></label>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="PostalCode" id="PostalCode" class="form-control" value="<?= $PostalCode; ?>" placeholder="Postal Code" readonly="readonly" >
                </div>


                

              <div class="col-md-12">
                <div class="box-footer">
                    <button type="submit" name="Submit" value="Update" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">

    function show_pass() {
        document.getElementById("password").type = "text";
    }

    // When the document is ready
    $(document).ready(function () {
        
        $('#DOB').datepicker({
            format: "dd-mm-yyyy"
        });  
        $('#Anniversary').datepicker({
            format: "dd-mm-yyyy"
        });  
        $('#Kid1_DOB').datepicker({
            format: "dd-mm-yyyy"
        });  
        $('#Kid2_DOB').datepicker({
            format: "dd-mm-yyyy"
        });  
        $('#Kid3_DOB').datepicker({
            format: "dd-mm-yyyy"
        });  
    });
</script>