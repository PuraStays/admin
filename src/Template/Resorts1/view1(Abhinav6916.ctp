
<form method="POST" action="<?php $_PHP_SELF ?>" >
<div class="content-wrapper">
<section class="content-header">
<h1>

            <?= __('Set Resort Gallery Image priority') ?>
</h1>

		<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customers</a></li>
            <li class="active">Data tables</li>
          </ol>
<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
				<h2>Add New Resort Image</h2>
                   <select class="form-control" name='select_item' id="webmenu" required>
				   <option value="">Please Select image name</option>
		<?php
		include_once('../../api/includes/db.inc.php');
		$db = new DB();
		$qry="SELECT * from images";
        $result = $db->_query($qry);
		$x=0;
        while($rows = $result->fetch_assoc())
           {
            echo "<option title=".$rows['Image']." value=".$rows['Image'].">".$rows['Title']."</option>";

							
           }
			echo"<input type='number' name='t1' min='1' style='margin-top:5px; margin-bottom:5px;' class='form-control' placeholder='Image priority Order' required/>";
		?>
		
		</select>
		<button type="submit" class="btn btn-primary" name="package_update">Submit</button>
		<?php
		include_once('../../api/includes/db.inc.php');
		$db = new DB();
if(isset($_POST['package_update']))
  {	
		 $id;
	   $checkbox1 =$_POST['select_item'];
	   $t=$_POST['t1'];
		$query="INSERT INTO `user_image`(`r_id`, `r_img`, `i_order`) VALUES ('$id','$checkbox1','$t')";
		$result = $db->_query($query);
		print_r($result);
      
  }
  
  ?>
                </div>
				
              </div>
         		  
        </section>
		<section class="content">
  <div class="row">
    
    <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				<h1>Resort Gallery</h1>
				
				
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S Id</th>
                       
                        <th>Name</th>
                        <th> priority Order</th>
                      <!--  <th>Action</th> -->
                        
						
                      </tr>
                       </thead>
<div>
<?php
		include_once('../../api/includes/db.inc.php');
		$db = new DB();
		$qry1="SELECT * FROM `user_image` where r_id='$id'";
		$i=0;
        $result1 = $db->_query($qry1);
		while($row = $result1->fetch_assoc())
            {
			$i++;
			?>
			<tr>
			<td><?php echo $i?>
			
			</td>
			<td><?php
             // echo "<input type='text' class='form-control' value=".$row['r_img']." >";
				echo "<img src=".$row['r_img']." style='height:80px;width:80px;'>";
				?>
			 </td>
			 <td><?php
			  echo"<input type='text' value=".$row['i_order'].">";?></td>
			    
			 </tr>
			 <?php
            }
							
		?>
		</table>
</div>
		
		
    </div> 
  </div><!--/row-->

</div>
</section>
</div>

</form>
