<?php
include_once("includes/db.inc.php");
    date_default_timezone_set('Asia/Kolkata');
    $DOC = date('Y-m-d H:i:s');
    $DOU = date('Y-m-d H:i:s');
?>
<script type="text/javascript">
  function Back() {

    document.frm.action = "index.php";
    document.frm.task.value = "ame-institute";
    document.frm.p.value  = 'ame-institute';
    document.frm.m.value  = 'masters';
    document.frm.submit();
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Institute
      <p class="btn btn-primary btn-sm pull-right" onclick="return Back();">Back</p>
    </h1>
    
  </section>
       
  <section class="content">
  <div class="box box-default">
      <div class="box-body">
        <form name="frm" method="Post" action="" >
          <input type="hidden" name="current_page" id="current_page" value="<?= $_REQUEST['current_page']?>">
          <input type="hidden" name="task" id="task" value="<?= $_REQUEST['task']?>">
          <input type="hidden" name="m" id="m" value="<?= $_REQUEST['m']?>">
          <input type="hidden" name="sm" id="sm" value="<?= $_REQUEST['sm']?>">
          <input type="hidden" name="p" id="p" value="<?= $_REQUEST['p']?>">
          <input type="hidden" name="id" id="id" value="<?= $_REQUEST['id']?>">

          <input type="hidden" name="s_Institute_Short_Name" id="s_Institute_Short_Name" value="<?= $_REQUEST['s_Institute_Short_Name']?>">

          <?php
          
              $Id=$_REQUEST['id'];
              
              if($_REQUEST['Submit'] == "Update") 
                  {       
                      $Id = $_REQUEST['id'];

                        $Institute_Short_Name = $_POST['Institute_Short_Name'];
                        $Institute_Full_Name = $_POST['Institute_Full_Name'];
                        $Steam1 = $_POST['Steam1'];
                        $Steam2 = $_POST['Steam2'];
                        $Steam3 = $_POST['Steam3'];
                        $Steam4 = $_POST['Steam4'];
                        $Steam5 = $_POST['Steam5'];
                        $Steam6 = $_POST['Steam6'];
                        $Steam7 = $_POST['Steam7'];
                        $Steam8 = $_POST['Steam8'];
                        $Steam9 = $_POST['Steam9'];
                        $Steam10 = $_POST['Steam10'];
                        $Email = $_POST['Email'];
                        $Mobile = $_POST['Mobile'];
                        $Coordinator = $_POST['Coordinator'];
                        $Coordinator_Mobile = $_POST['Coordinator_Mobile'];
                        $Coordinator_Email = $_POST['Coordinator_Email'];
                        $Counsellor1 = $_POST['Counsellor1'];
                        $Counsellor1_Mobile = $_POST['Counsellor1_Mobile'];
                        $Counsellor2 = $_POST['Counsellor2'];
                        $Counsellor2_Mobile = $_POST['Counsellor2_Mobile'];
                        $Counsellor3 = $_POST['Counsellor3'];
                        $Counsellor3_Mobile = $_POST['Counsellor3_Mobile'];
                        $Counsellor4 = $_POST['Counsellor4'];
                        $Counsellor4_Mobile = $_POST['Counsellor4_Mobile'];
                        $City = $_POST['City'];
                        $State = $_POST['State'];
                        $Address = $_POST['Address'];
                        $Latitude = $_POST['Latitude'];
                        $Longitude = $_POST['Longitude'];
                      
                      
                        $qry="UPDATE ame_institute SET
                        Institute_Short_Name = '$Institute_Short_Name',
                        Institute_Full_Name = '$Institute_Full_Name',
                        Steam1 = '$Steam1',
                        Steam2 = '$Steam2',
                        Steam3 = '$Steam3',
                        Steam4 = '$Steam4',
                        Steam5 = '$Steam5',
                        Steam6 = '$Steam6',
                        Steam7 = '$Steam7',
                        Steam8 = '$Steam8',
                        Steam9 = '$Steam9',
                        Steam10 = '$Steam10',
                        Email = '$Email',
                        Mobile = '$Mobile',
                        Coordinator = '$Coordinator',
                        Coordinator_Mobile = '$Coordinator_Mobile',
                        Coordinator_Email = '$Coordinator_Email',
                        Counsellor1 = '$Counsellor1',
                        Counsellor1_Mobile = '$Counsellor1_Mobile',
                        Counsellor2 = '$Counsellor2',
                        Counsellor2_Mobile = '$Counsellor2_Mobile',
                        Counsellor3 = '$Counsellor3',
                        Counsellor3_Mobile = '$Counsellor3_Mobile',
                        Counsellor4 = '$Counsellor4',
                        Counsellor4_Mobile = '$Counsellor4_Mobile',
                        City = '$City',
                        State = '$State',
                        Address = '$Address',
                        Latitude = '$Latitude',
                        Longitude = '$Longitude',
                        Institute_Short_Name = '$Institute_Short_Name',
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
                    $Id=$_REQUEST['id'];
                    $qry="SELECT * from ame_institute where Id = '$Id'";
                    $db=new DB();
                    $result = $db->_query($qry);
                    while($rows = mysqli_fetch_array($result))
                    {
                        $Institute_Short_Name = $rows['Institute_Short_Name'];
                        $Institute_Full_Name = $rows['Institute_Full_Name'];
                        $Steam1 = $rows['Steam1'];
                        $Steam2 = $rows['Steam2'];
                        $Steam3 = $rows['Steam3'];
                        $Steam4 = $rows['Steam4'];
                        $Steam5 = $rows['Steam5'];
                        $Steam6 = $rows['Steam6'];
                        $Steam7 = $rows['Steam7'];
                        $Steam8 = $rows['Steam8'];
                        $Steam9 = $rows['Steam9'];
                        $Steam10 = $rows['Steam10'];
                        $Email = $rows['Email'];
                        $Mobile = $rows['Mobile'];
                        $Coordinator = $rows['Coordinator'];
                        $Coordinator_Mobile = $rows['Coordinator_Mobile'];
                        $Coordinator_Email = $rows['Coordinator_Email'];
                        $Counsellor1 = $rows['Counsellor1'];
                        $Counsellor1_Mobile = $rows['Counsellor1_Mobile'];
                        $Counsellor2 = $rows['Counsellor2'];
                        $Counsellor2_Mobile = $rows['Counsellor2_Mobile'];
                        $Counsellor3 = $rows['Counsellor3'];
                        $Counsellor3_Mobile = $rows['Counsellor3_Mobile'];
                        $Counsellor4 = $rows['Counsellor4'];
                        $Counsellor4_Mobile = $rows['Counsellor4_Mobile'];
                        $City = $rows['City'];
                        $State = $rows['State'];
                        $Address = $rows['Address'];
                        $Latitude = $rows['Latitude'];
                        $Longitude = $rows['Longitude'];
                    }
                //////////////////////////////////////////////////Ending of Select Data////////////////////////////////////////////////////////////////////
                ?>
              <div class="row">
                <div class="form-group col-md-2">
                  <label>Institute Short Name</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="Institute_Short_Name" id="Institute_Short_Name" class="form-control" value="<?= $Institute_Short_Name; ?>" placeholder="Institute Short Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Institute_Full_Name</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="Institute_Full_Name" id="Institute_Full_Name" class="form-control" value="<?= $Institute_Full_Name; ?>" placeholder="Institute_Full_Name">
                </div>
              </div>

              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Steam (ERAS B1.1) </label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam1" id="Steam1" class="form-control" value="<?= $Steam1; ?>" placeholder="Steam1">
                  </div>
              </div>
              <div class="row">  
                  <div class="form-group col-md-2">
                    <label>Steam B1.1</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam2" id="Steam2" class="form-control" value="<?= $Steam2; ?>" placeholder="Steam2">
                  </div>
              
                  <div class="form-group col-md-2">
                    <label>Steam B1.2</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam3" id="Steam3" class="form-control" value="<?= $Steam3; ?>" placeholder="Steam3">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Steam B1.3</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam4" id="Steam4" class="form-control" value="<?= $Steam4; ?>" placeholder="Steam4">
                  </div>
              
                  <div class="form-group col-md-2">
                    <label>Steam B1.4</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam5" id="Steam5" class="form-control" value="<?= $Steam5; ?>" placeholder="Steam5">
                  </div>
              </div>
              <div class="row">
                  
                
                  <div class="form-group col-md-2">
                    <label>Steam B2</label>
                  </div>
                  
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam6" id="Steam6" class="form-control" value="<?= $Steam6; ?>" placeholder="Steam6">
                  </div>
              
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Steam A1</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam7" id="Steam7" class="form-control" value="<?= $Steam7; ?>" placeholder="Steam7">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Steam A2</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam8" id="Steam8" class="form-control" value="<?= $Steam8; ?>" placeholder="Steam8">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Steam A3</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam9" id="Steam9" class="form-control" value="<?= $Steam9; ?>" placeholder="Steam9">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Steam A4</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Steam10" id="Steam10" class="form-control" value="<?= $Steam10; ?>" placeholder="Steam10">
                  </div>
              </div>

              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Email</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Email" id="Email" class="form-control" value="<?= $Email; ?>" placeholder="Email">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Mobile" id="Mobile" class="form-control" value="<?= $Mobile; ?>" placeholder="Mobile">
                  </div>
              </div>

              <div class="row">
                  
                  <div class="form-group col-md-2">
                    <label>Coordinator</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Coordinator" id="Coordinator" class="form-control" value="<?= $Coordinator; ?>" placeholder="Coordinator">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Coordinator_Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Coordinator_Mobile" id="Coordinator_Mobile" class="form-control" value="<?= $Coordinator_Mobile; ?>" placeholder="Coordinator_Mobile">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Coordinator_Email</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Coordinator_Email" id="Coordinator_Email" class="form-control" value="<?= $Coordinator_Email; ?>" placeholder="Coordinator_Email">
                  </div>
              </div>

              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Counsellor1</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor1" id="Counsellor1" class="form-control" value="<?= $Counsellor1; ?>" placeholder="Counsellor1">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Counsellor1_Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor1_Mobile" id="Counsellor1_Mobile" class="form-control" value="<?= $Counsellor1_Mobile; ?>" placeholder="Counsellor1_Mobile">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Counsellor2</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor2" id="Counsellor2" class="form-control" value="<?= $Counsellor2; ?>" placeholder="Counsellor2">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Counsellor2_Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor2_Mobile" id="Counsellor2_Mobile" class="form-control" value="<?= $Counsellor2_Mobile; ?>" placeholder="Counsellor2_Mobile">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Counsellor3</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor3" id="Counsellor3" class="form-control" value="<?= $Counsellor3; ?>" placeholder="Counsellor3">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Counsellor3_Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor3_Mobile" id="Counsellor3_Mobile" class="form-control" value="<?= $Counsellor3_Mobile; ?>" placeholder="Counsellor3_Mobile">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Counsellor4</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor4" id="Counsellor4" class="form-control" value="<?= $Counsellor4; ?>" placeholder="Counsellor4">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Counsellor4_Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Counsellor4_Mobile" id="Counsellor4_Mobile" class="form-control" value="<?= $Counsellor4_Mobile; ?>" placeholder="Counsellor4_Mobile">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Address</label>
                  </div>
                  <div class="form-group col-md-10">
                      <input type="text" name="Address" id="Address" class="form-control" value="<?= $Address; ?>" placeholder="Address">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>City</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="City" id="City" class="form-control" value="<?= $City; ?>" placeholder="City">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>State</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="State" id="State" class="form-control" value="<?= $State; ?>" placeholder="State">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-2">
                    <label>Latitude</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Latitude" id="Latitude" class="form-control" value="<?= $Latitude; ?>" placeholder="Latitude">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Longitude</label>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="Longitude" id="Longitude" class="form-control" value="<?= $Longitude; ?>" placeholder="Longitude">
                  </div>
              </div>
              
              



              

              <div class="row" >
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