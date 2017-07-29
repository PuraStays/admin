<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Confirmed Customers') ?>
          </h1>
            <div class="row">
            <div class="col-xs-4">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Customer', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New customer')) ?> 
                </div>
				
              </div>
            </div>
			<div class="col-xs-4">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('CONFIRMED', true), ['action' => 'Conformed'], array('class'=>'btn btn-primary', 'alt'=> 'Conformed')) ?> 
                </div>
				
              </div>
            </div>
			<div class="col-xs-4">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('NON CONFIRMED', true), ['action' => 'conformednot'], array('class'=>'btn btn-primary', 'alt'=> 'conformednot')) ?> 
                </div>
				
              </div>
            </div>
            </div>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customers</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                       
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Number of Bookings</th>
						<th>Action</th>
						
                      </tr>
                       </thead>
                      <?php
include_once('../../api/includes/db.inc.php');
$db = new DB();
      $qry = "SELECT a.id, a.mobile, a.Name, a.email, COUNT( b.status )as total 
FROM customers a, hotelogix_details b
WHERE a.id = b.userid
AND b.status =1
GROUP BY a.id";
      $result = $db->_query($qry);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
      <tr>
                        <td><?php echo $row["id"]; ?></td>
                       
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["total"];?></td>
						<td class="actions">
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $row["id"]], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?>
                        </td>
            
            
                      </tr>
    <?php
    }
}
?>
                   
                      
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


	  

