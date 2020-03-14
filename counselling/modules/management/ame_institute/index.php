<meta http-equiv="refresh" content="10"/>
<?php
date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');


function left_seats($institute, $stream, $Total_Seats)
  {
    $db = new DB();
    $qry = "select count(1) as Allocated_Seats  from amecet_2019_counselling where Institute_Id = '$institute' && Stream = '$stream' && Seatlock_Status = 1";  
    $result = $db->_query($qry);
    $row = mysqli_fetch_array($result);
    


    
    $seats = $Total_Seats - $row['Allocated_Seats'];


    if($seats>0)
    {
      return($seats);
    }
    else
    {
     return(0); 
    }

  }

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <section class="content-header">
          <h1 style="text-align: center;">
            AME CET 2019 Counselling 
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php include_once("includes/message_box.php");?>

          <?php
            if(isset($_REQUEST['submit']) or isset($_REQUEST['current_page']))
            {
              if($_REQUEST['Submit']=='Search'){$_REQUEST["current_page"]=0;} else {$_REQUEST["current_page"] =  $_REQUEST['current_page']; }
              if($_REQUEST['s_Institute_Short_Name']!=""){$s_Institute_Short_Name = $_REQUEST['s_Institute_Short_Name']; }
              if($_REQUEST['s_Details']!=""){$s_Details = $_REQUEST['s_Details']; }

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

                <div class="box-body">

                  

                    <?php
                    $db = new DB();

                    $institute = 1;
                    $stream = 'B1.1';

                


                    if($_REQUEST['current_page'])
                      {
                        $low_limit = ($_REQUEST['current_page']-1)*15;
                      } 
                      else
                      {
                        $low_limit = 0;
                      }
                      $SerialNo = $low_limit;

                      if(isset($_REQUEST['Submit']) or isset($_REQUEST['current_page']))
                          {
                            $qry = "select * from ame_institute where  ";
                             if($s_Institute_Short_Name!=''){$qry = $qry."Institute_Short_Name LIKE '%$s_Institute_Short_Name%' && ";}
                             $qry = $qry. " Status  = 1  order by Institute_Short_Name ASC";
                            $qry_with_limit = $qry." limit $low_limit,15";
                          }
                      else
                        {
                          $qry = "select * from ame_institute where Status = 1 order by Institute_Short_Name ASC";
                          $qry_with_limit = $qry."  limit $low_limit,15";
                        }
                    
                    $result = $db->_query($qry_with_limit);
                    $total_count =mysqli_num_rows($db->_query($qry));
                    $Serial = $low_limit;
                  ?>
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead class="thead-dark">
                      <tr>
                            <th class="align-middle" rowspan="4">SN</th>
                            <th class="align-middle" rowspan="4">Institute</th>
                            <th class="align-middle" rowspan="4">City</th>
                            <th class="align-middle" rowspan="4">State</th>
                            <th class="align-middle"  style="text-align: center;" colspan="10">Streams</th>
                            
                            </tr>
                            <tr>
                            
                            <th colspan="5" style="text-align: center;">DGCA-B</th>
                            <th colspan="4" style="text-align: center;">DGCA-A</th>
                      </tr>
                      <tr>
                            <th  style="text-align: center;">B1.1</th>
                            <th  style="text-align: center;">B1.2</th>
                            <th  style="text-align: center;">B1.3</th>
                            <th  style="text-align: center;">B1.4</th>
                            <th  style="text-align: center;">B2</th>
                            <th  style="text-align: center;">A1</th>
                            
                            <th  style="text-align: center;">A4</th>
                            </tr>
                      </tr>
                    </thead>
                    <tbody>
                  <?php

                    $total_Stats = 0;
                    $total_Stream1 = 0;
                    $total_Stream2 = 0;
                    $total_Stream3 = 0;
                    $total_Stream4 = 0;
                    $total_Stream5 = 0;
                    $total_Stream6 = 0;
                    $total_Stream7 = 0;
                    $total_Stream8 = 0;
                    $total_Stream9 = 0;
                    $total_Stream10 = 0;


                    while($row = mysqli_fetch_array($result))
                    {



                      $Serial++;
                      ?>
                        <tr>
                          <td  style="text-align: center;"><?= $Serial; ?></td>
                          <td  style="text-align: center;"><?= $row['Institute_Short_Name']; ?></td>
                          <td  style="text-align: center;"><?= $row['City']; ?></td>
                          <td  style="text-align: center;"><?= $row['State']; ?></td>
                          
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=B1.1"><b class="btn btn-primary"><?= left_seats($row['Id'], 'B1.1', $row['Steam2']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=B1.2"><b class="btn btn-primary"><?= left_seats($row['Id'], 'B1.2', $row['Steam3']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=B1.3"><b class="btn btn-primary"><?= left_seats($row['Id'], 'B1.3', $row['Steam4']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=B1.4"><b class="btn btn-primary"><?= left_seats($row['Id'], 'B1.4' , $row['Steam5']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=B2"><b class="btn btn-primary"><?= left_seats($row['Id'], 'B2', $row['Steam6']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=A1.1"><b class="btn btn-primary"><?= left_seats($row['Id'], 'A1', $row['Steam7']); ?></b></a></td>
                          <td  style="text-align: center;"><a href="index.php?m=management&p=ame_institute-new&institute=<?= $row['Id']; ?>&Stream=A4"><b class="btn btn-primary"><?= left_seats($row['Id'], 'A4', $row['Steam10']); ?></b></a></td>

                         <!--
                          <td class="actions">
                             <?php
                                if( $row['Status'] == "1" )
                                  { 
                                    echo '<a Mobile="Make Deactive" class="glyphicon glyphicon-ok" onclick="return Deactive('.$row['Id'].')" ></a> &nbsp;';
                                  }           
                                elseif( $row['Status'] == "0")
                                  {
                                     echo '<a Mobile="Make Active" class="glyphicon glyphicon-remove" onclick="return Active('.$row['Id'].')" ></a> &nbsp;';
                                  }

                                  echo '<a Mobile="Edit" class="fa fa-pencil-square-o" onclick="return Edit('.$row['Id'].')" ></a> &nbsp;';  

                                  echo '<a class="glyphicon glyphicon-trash" onclick="return Delete('.$row['Id'].')" ></a> &nbsp; ';
                              ?>
                          </td>
                        -->
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
          document.frm.task.value = "ame-institute-edit";
          document.frm.id.value  = id;
          document.frm.p.value  = 'ame-institute-edit';
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
          document.frm.p.value  = "ame-institute";
          document.frm.submit();
         // return false;
}
// edit single confirmation
function Upload(id ) {
          document.frm.task.value = "ame-institute-upload";
          document.frm.id.value  = id;
          document.frm.p.value  = 'ame-institute-upload';
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
                if( confirm("Are you sure to de active these records?") ) {
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