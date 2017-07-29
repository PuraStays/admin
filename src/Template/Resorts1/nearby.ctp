<?php
include_once('../../api/includes/db.inc.php');
$db = new DB();
//echo $id;		
$qry_nbp = "select n.*, n.Image, n.Title, n.Description from resorts as r INNER JOIN nearbyplaces as n ON (r.nearbyplaces_id REGEXP CONCAT(' ?', n.Id)) where r.Id = $id && n.Status = 1";
$result_nbp = $db->_query($qry_nbp);
//echo $qry_nbp;
 ?>
 <div class="content-wrapper">
<section class="content-header">
<h1>

            <?= __('Set Nearby Place priority order') ?>
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
				<h2>Nearby Place priority order</h2>
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
          <td><img src="<?= $row_nbp['Image']; ?>" alt="<?= $row_nbp['Title']; ?>"></td>
            <td><?= $row_nbp['Title']; ?></td>
			<td><?= $row_nbp['Description']; ?></td>
           <td>
		   
			 	<?php $p_order=$row_nbp['p_order'];?>	 
			  <input type='text' name="t2[]" value="<?php echo $p_order;?>">
			  <input type="hidden" name="idd[]" value="<?php echo $row_nbp['Id'];?>">
			  
			  
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
		$i_id=$_POST['idd'];
		//print_r($i_id);
	    $tsa=$_POST['t2'];

		for($i=0;$i<=count($i_id);$i++)
		{	
		$qry2="UPDATE `nearbyplaces` SET `p_order`='$tsa[$i]' WHERE id='$i_id[$i]'";
		//print_r($qry2);
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