<?php
$message = '';

$db=new DB();

date_default_timezone_set('Asia/Kolkata');
$DOC = date('Y-m-d H:i:s');
$DOU = date('Y-m-d H:i:s');



function left_seats($institute, $stream)
  {
    $db = new DB();
    
    if($stream == 'B1.1')
    		$col_select = 'Steam2';
    elseif($stream == 'B1.2')
    		$col_select = 'Steam3';
    elseif($stream == 'B1.3')
    		$col_select = 'Steam4';
    elseif($stream == 'B1.4')
    		$col_select = 'Steam5';
    elseif($stream == 'B2')
    		$col_select = 'Steam6';
    elseif($stream == 'A1')
    		$col_select = 'Steam7';
    elseif($stream == 'A4')
    		$col_select = 'Steam10';


   $Total_Seats = $db->clm_value_2($col_select, 'Id', 'Status', 'ame_institute', $institute, '1');

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
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      AME CET 2019 Counselling
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Advanced Elements</li>
    </ol>
  </section>

  <section class="content">
  <div class="box box-default">
      <div class="box-body">

      	<?php

		$institute_id = $_REQUEST['institute'];
		$Stream = $_REQUEST['Stream'];
		$Institute_Short_Name =  $db->clm_value_2('Institute_Short_Name', 'Id', 'Status', 'ame_institute', $institute_id, '1');

		if(left_seats($institute_id, $Stream))
		{
				   if($_REQUEST['counselling'] == "yes") 
	       			{
				        	$Registration_No = $_POST['registration_no'];
				        	$Hall_Ticket_No = $_POST['hallticketno'];
				        	$Institute_Id = $_REQUEST['institute'];
				        	$Institute_Name = $Institute_Short_Name;

							$Stream = $_REQUEST['Stream'];

							$User_Type = $_SESSION['user_type'];
							$User_Name = $_SESSION['username'];
							$User_Id = $_SESSION['id'];
							$Centre = $_SESSION["centre_id"];
							

							$Institute_Short_Name =  $db->clm_value_2('Institute_Short_Name', 'Id', 'Status', 'ame_institute', $institute_id, '1');

				        	$qry = "select * from registration_new where Registration_No = '$Registration_No' && Hall_Ticket_No = '$Hall_Ticket_No'";
				        	$result = $db->_query($qry);
				        	if(mysqli_num_rows($result)>0)
				        	{

				        		$qry1 = "insert into amecet_2019_counselling (
				        		Registration_No, 
				        		Hall_Ticket_No,
				        		Institute_Id,
				        		Institute_Name,
				        		Stream,
				        		Seatlock_User_Type,
				        		Seatlock_User_Name,
				        		Seatlock_User_Id,
				        		Seatlock_Centre,
				        		Seatlock_DOC,
				        		Seatlock_Status
				        		) VALUES (

				        		'$Registration_No',
				        		'$Hall_Ticket_No',
				        		'$Institute_Id',
				        		'$Institute_Name',
				        		'$Stream',
				        		'$User_Type',
				        		'$User_Name',
				        		'$User_Id',
				        		'$Centre',
				        		'$DOC',
				        		'1'
				        		)";

								$qry2 = "insert into amecet_2019_counselling_history (
				        		Registration_No, 
				        		Hall_Ticket_No,
				        		Institute_Id,
				        		Institute_Name,
				        		Stream,
				        		Seatlock_User_Type,
				        		Seatlock_User_Name,
				        		Seatlock_User_Id,
				        		Seatlock_Centre,
				        		Seatlock_DOC,
				        		Seatlock_Status
				        		) VALUES (

				        		'$Registration_No',
				        		'$Hall_Ticket_No',
				        		'$Institute_Id',
				        		'$Institute_Name',
				        		'$Stream',
				        		'$User_Type',
				        		'$User_Name',
				        		'$User_Id',
				        		'$Centre',
				        		'$DOC',
				        		'1'
				        		)";
				        		
				        		$db->_query($qry2);

				        		if($db->_query($qry1))
				        		{
				        			$message_success="<strong>Congratulations!</strong> Your Seat Locked Successfully.";
				        		}
				        		else
				        		{
				        			$message_danger = "<strong>Sorry!</strong> Unable to perform action.";		
				        		}

				        	}
				        	else
				        	{
								$message_danger = "<strong>Sorry!</strong> We did not found any record with there details.";
				        	}
					    }
		}
		else
	    {

	         	$message_danger = "<strong>Sorry!</strong> There is no seats available in this institute & stream.";   
	    }



			 


        	?>



        <?php include_once("includes/message_box.php");?>

        <form method="post" action="">
            	<div class="row">
						<input type="hidden" name="counselling" value="yes">
						
								<div class="form-group col-md-2">
									<label>Institute Name<span style="color:red">*</span></label>
								</div>
								
								<div class="form-group col-md-4">
									<select name="institute" readonly="readonly" class="form-control" required="required">
									<option value="<?= $institute_id; ?>"><?=$Institute_Short_Name;?></option>
								</select>
								</div>
								<div class="form-group col-md-2">
									<label>Stream<span style="color:red">*</span><span style="color:red">*</span></label>
								</div>
								<div class="form-group col-md-4">
									<input type="text" name="Stream" value="<?= $Stream; ?>" readonly="readonly" required="required">
								</div>
						
                </div>

				<div class="row">
						<div class="form-group col-md-2">
							<label>Registration No<span style="color:red">*</span></label>
						</div>
						<div class="form-group col-md-4">
							<input name="registration_no" type="number" value=""  required="required">
						</div>
				
						<div class="form-group col-md-2">
							<label>Hall Ticket Number<span style="color:red">*</span></label>
						</div>
						<div class="form-group col-md-4">
							<input name="hallticketno" type="number" value="" required="required" >
						</div>
						
				</div>
                
                <div class="row">
					<div class="col-md-12">
		                <div class="box-footer">
		                    <button type="submit" name="submit"  value="Add" class="btn btn-primary">Submit</button>
		                </div>
	              	</div>
          		</div>
              </div>
              
            </div>
        </form>
      </div>
    </div>
  </section>
</div>