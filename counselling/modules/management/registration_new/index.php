<?php
date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <section class="content-header">
          <h1>
            AME CET Registrations
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
              if($_REQUEST['s_Student_Name']!=""){$s_Student_Name = $_REQUEST['s_Student_Name']; }
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
                            <input type="text" name="s_Student_Name" id="s_Student_Name" class="form-control" value="<?= $_REQUEST['s_Student_Name']; ?>" placeholder="Student Name">
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

                    if($_REQUEST['current_page'])
                      {
                        $low_limit = ($_REQUEST['current_page']-1)*15;
                      } 
                      else
                      {
                        $low_limit = 0;
                      }
                      $SerialNo = $low_limit;
                      $member_id = $_SESSION['member_id'];
                      if(isset($_REQUEST['Submit']) or isset($_REQUEST['current_page']))
                          {
                            $qry = "select * from registration_new where ";
                             if($s_Email_Id!=''){$qry = $qry."Student_Email like '%$s_Email_Id%' && ";}
                             if($s_Student_Name!=''){$qry = $qry."Student_Name LIKE '%$s_Student_Name%' && ";}
                             if($s_Phone!=''){$qry = $qry."Student_Mobile like '%$s_Phone%' &&  ";}
                             if($s_User_Type!=''){$qry = $qry."User_Type = '$s_User_Type' &&  ";}
                             $qry = $qry. " member_id = '$member_id' && Session = '2018'  && Status = '1' order by Id DESC";
                            $qry_with_limit = $qry." limit $low_limit,15";
                          }
                      else
                        {
                          $qry = "select * from registration_new where  member_id = '$member_id'  && Session = '2019' && Status = '1' order by Id DESC";
                          $qry_with_limit = $qry."  limit $low_limit,15";
                        }
                    $qry_with_limit; 
                    $result = $db->_query($qry_with_limit);
                    $total_count =mysqli_num_rows($db->_query($qry));
                    $Serial = $low_limit;
                  ?>
                  <?php include("includes/pagination.php"); ?>
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <td></td>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Reg No.</th>

                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        
                        <th>DOC</th>
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
                          <td><input type="checkbox" name="chk[]" value="<?= $row['Id'];?>" ></td>
                          <td><?= $Serial; ?></td>
                          <td><img src="../admin/upload/<?= $row['image']; ?>" height="30"></td>
                          <td><?= $row['Registration_No']; ?></td>
                          <td><?= $row['First_Name']; ?></td>
                          <td><?= $row['Last_Name']; ?></td>
                          <td><?= $row['Father_Name']; ?></td>
                          <td><?= $row['DOC']; ?></td>
                          <td class="actions">
                              <?php
                                echo '<a Mobile="Edit" class="fa fa-print" target="_blank" href="http://www.amecet.in/registration-slip.php?success&t='.$row['txn'].'"></a> &nbsp;';  
                              ?>
                          </td>
                        </tr>
                      <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                <?php include("includes/pagination.php"); ?>

                  
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
  
// check all the check boxes
function checkAll( frm, chkAllV ) {
        for( var i=0; i<frm.elements.length; i++ ) {
                if( frm.elements[i].name == "chk[]")
                    frm.elements[i].checked = chkAllV;
        }
}
// delete single confirmation
function Delete(id ) {
              if( confirm("Are you sure to delete this Records?") ) {
                        document.frm.task.value = "delete_single";
                        document.frm.id.value  = id;
                        document.frm.submit();
                }
            else 
              {
                    return false;
              }
}

// active single confirmation
function Active(id ) {
          document.frm.task.value = "active_single";
          document.frm.id.value  = id;
          document.frm.submit();
}

// edit single confirmation
function Edit(id ) {
          document.frm.task.value = "registration_new-edit";
          document.frm.id.value  = id;
          document.frm.p.value  = 'registration_new-edit';
          document.frm.submit();
         // return false;
}
// active single confirmation
function Up(id ) {
          document.frm.task.value = "up";
          document.frm.id.value  = id;
          document.frm.submit();
}

// active single confirmation
function Down(id ) {
          document.frm.task.value = "down";
          document.frm.id.value  = id;
          document.frm.submit();
}

// edit single confirmation
function Search(id ) {
          document.frm.Submit.value = "Search";
          document.frm.task.value = "";
          document.frm.id.value  = "";
          document.frm.p.value  = "registration_new";
          document.frm.submit();
         // return false;
}
// edit single confirmation
function Upload(id ) {
          document.frm.task.value = "registration_new-upload";
          document.frm.id.value  = id;
          document.frm.p.value  = 'registration_new-upload';
          document.frm.submit();
         // return false;
}

// active single confirmation
function Deactive(id ) {
          document.frm.task.value = "deactive_single";
          document.frm.id.value  = id;
          document.frm.submit();
}

// delete confirmation
function DeleteMore( frm ) {
        if ( isChecked() ) {
                if( confirm("Are you sure to delete these Records?") ) {
                        document.frm.task.value = "delete";
                        document.frm.action = "?module="+document.frm.qryString.value;
                        document.frm.submit();
                }
                else
                {
                  return false;
                }
        } else {
                alert("Please select the check boxes to perform action!");
                return false;
        }
}

// active confirmation
function ActiveMore( frm ) {
        if ( isChecked() ) {
                if( confirm("Are you sure to active these records?") ) {
                        document.frm.task.value = "active_more";
                        document.frm.action = "?module="+document.frm.qryString.value;
                        document.frm.submit();
                }
                else
                {
                  return false;
                }
        } else {
                alert("Please select the check boxes to perform action!");
                return false;
        }
}

// deactive confirmation
function DeactiveMore( frm ) {
        if ( isChecked() ) {
                if( confirm("Are you sure to active these records?") ) {
                        document.frm.task.value = "deactive_more";
                        //document.frm.action = "?module="+document.frm.qryString.value;
                        document.frm.submit();
                }
                else
                {
                  return false;
                }
        } else {
                alert("Please select the check boxes to perform action!");
                return false;
        }
}


function isChecked() {
        var flag = false;
        for( var i=0; i<document.frm.elements.length; i++ ) {
                if( document.frm.elements[i].name == "chk[]" && document.frm.elements[i].checked ) {
                  flag = true;
                  break;
                }
        }
        return flag;
}

/////Update Rank
function QDeleteMore( frm ) {
                        document.frm.task.value = "Update";
                        document.frm.action = "?module="+document.frm.qryString.value;
                        document.frm.submit();
alert(qryString);
}


function isChecked() {
        var flag = false;
        for( var i=0; i<document.frm.elements.length; i++ ) {
                if( document.frm.elements[i].name == "chk[]" && document.frm.elements[i].checked ) {
                                flag = true;
                                break;
                }
        }
        return flag;
}
</script>
<script type="text/javascript">
$( "#s_Email_Id").change(function() {
  var cls = $("#s_Email_Id").val();
  $.ajax({
    type: "GET",
    url: "ajax/products.php?User_Id=" + cls,
    data: cls,
    cache: false,
    success: function(data){
      console.log(data);
      $('#select2-s_Student_Name-container').empty();
      $('#s_Student_Name').empty();
      $("#s_Student_Name").append(data);
    }
  });
});
</script>