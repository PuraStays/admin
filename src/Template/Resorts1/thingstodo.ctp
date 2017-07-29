<?php
include_once('../../api/includes/db.inc.php');
$db = new DB();
//echo $id;		
$qry_nbp = "select r.Id,a.Id,a.t_order,a.About_Activity_Title, a.Activity_Name, a.Activity_Summary, a.About_Activity_Title, a.Icon from resorts as r INNER JOIN activities as a ON (r.things_to_do_id REGEXP CONCAT(' ?', a.Id)) where r.Id = $id && a.Status = 1";
$result_nbp = $db->_query($qry_nbp);
//echo $qry_nbp;
 ?>
 <div class="content-wrapper">
<section class="content-header">
<h1>

            <?= __('Set Things to do priority order') ?>
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
				<h2>Things to do priority order</h2>
  <form method="POST" action="<?php $_PHP_SELF ?>" >          
 <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        
                       <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
						<th>Description</th>
						<th>Order</th>
                        
						
                      </tr>
                       </thead>
  <?php
  $i=0;
		  
    while($row_nbp = mysqli_fetch_array($result_nbp))
      {
		$i++;  
      ?>  
        <tr>
          <td><?php echo $i; ?></td>
          <td><img src="<?= $row_nbp['Icon']; ?>" alt="<?= $row_nbp['Activity_Name']; ?>"></td>
            <td><?= $row_nbp['Activity_Name']; ?></td>
			<td><?= $row_nbp['Activity_Summary']; ?></td>
           <td>	 
			  <input type='text' name="t2[]" value="<?php echo $row_nbp['t_order'];?>">
			  <input type="hidden" name="id[]" value="<?php echo $row_nbp['Id'];?>">
			  
			 
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
		$i_id=$_POST['id'];
	    $tsa=$_POST['t2'];

		for($i=0;$i<=count($tsa);$i++)
		{	
      $qry2="UPDATE `activities` SET `t_order`='$tsa[$i]' WHERE id='$i_id[$i]'";
	  
	 $result1 = $db->_query($qry2);
      
  }
  }
  ?>
</div>
		
		
    </div> 
  </div><!--/row-->

</div>
</section>
</div>