<form method="POST" action="<?php $_PHP_SELF ?>" >
<?php
include_once('../../api/includes/db.inc.php');
$db = new DB();
?>
<div class="content-wrapper">
<section class="content-header">
<h1>

            <?= __('Set our Cafe Gallery Image priority') ?>
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
				<h2>Add New Cafe Image</h2>
                   <select class="form-control" name='select_item' id="webmenu">
		<?php
		$qry="SELECT * from images";
        $result = $db->_query($qry);
		$x=0;
        while($rows = $result->fetch_assoc())
           {
            echo "<option title=".$rows['Image']." value=".$rows['Image'].">".$rows['Title']."</option>";

							
           }
			echo"<input type='number' name='t1' style='margin-top:5px; margin-bottom:5px;' class='form-control' placeholder='Image priority Order'/>";
		?>
		
		</select>
		<button type="submit" class="btn btn-primary" name="package_update">Submit</button>
		<?php
		
		if(isset($_POST['package_update']))
		{	
		$id;
		$checkbox1 =$_POST['select_item'];
		$t=$_POST['t1'];
		$query="INSERT INTO `our_cafe_gallery`(`r_id`, `image`, `c_order`) VALUES ('$id','$checkbox1','$t');";
		//print_r($query);
		$result = $db->_query($query);
		
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
				<h1>Our Cafe Gallery</h1>
				
				<form action="" method="post">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                       
                        <th>Image</th>
                        <th>Sequence</th>
						<th>Delete</th>
                        
						
                      </tr>
                       </thead>
<div>
<?php
		
		$qry1="SELECT * FROM `our_cafe_gallery` where r_id='$id'";
		$i=0;
        $result1 = $db->_query($qry1);
		while($row = $result1->fetch_assoc())
            {
			$idd=$row['id'];
			$i++;
			?>
			<tr>
			<td><?php echo $i?>
			
			</td>
			<td><?php
             // echo "<input type='text' class='form-control' value=".$row['image']." >";
				echo "<img src=".$row['image']." style='height:80px;width:80px;'>";
				?>
			 </td>
			 <td>
			 
			 	<?php $i_order=$row['c_order'];?>		 
			  <input type='text' name="t2[]" value="<?php echo $i_order;?>">
			  <input type="hidden" name="idd[]" value="<?php echo $idd;?>">
			  
			
			  </td>
			  <td>
			  <form action="" method="post">
			 	<?php $i_order=$row['c_order'];?>		 
			  <input type="hidden" name="id" value="<?php echo $idd;?>">
			  <button type="submit" class="btn btn-primary" name="d_update">Delete</button>
			  </form>
			  </td>
			  
		
			  
			    
			 </tr>
			 <?php
            }
							
		?>
		</table>
		<button type="submit" class="btn btn-primary" name="p_update">UPDATE</button>
		</form>
		
		<?php
		if(isset($_POST['p_update']))
		{		
		$idd=$_POST['idd'];
		$tsa=$_POST['t2'];
		//echo $c=count($tsa);
		for($i=0;$i<=count($tsa);$i++)
		{
      $qry2="UPDATE `our_cafe_gallery` SET `c_order`='$tsa[$i]' WHERE id='$idd[$i]';";
	 //print_r($qry2);
	 $result1 = $db->_query($qry2);
	 
	  }

  }
  ?>
  <?php
		if(isset($_POST['d_update']))
		{		
		$i_id=$_POST['id'];
	  
      $qry3="delete FROM `our_cafe_gallery` WHERE id='$i_id'";
	  //print_r($query);
	  $result1 = $db->_query($qry3);
      if($result1!=0)
      
	  {
		  echo"Successfully deleted,please refresh the page";
	  }
	  else
	  {
		  echo "Please try again";
	  }

  }
  
  ?>
</div>
		
		
    </div> 
  </div><!--/row-->

</div>
</section>
</div>

</form>
