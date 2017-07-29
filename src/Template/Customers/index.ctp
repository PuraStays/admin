<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Customers') ?>
          </h1>
           <!-- <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Customer', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New customer')) ?> 
                </div>
              </div>
            </div>
            </div>-->
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
                        <th>Image </th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php foreach ($customers as $customer) {
                         ?>
                          <tr>
                                <td><?= $this->Number->format($customer->id) ?></td>
                                <td>
                                 <?= $this->Html->image($customer->Customer_Image, array("alt" => $customer->Title, "height"=>"40px;")) ?>
                                </td>
                                <td><?= h($customer->Name) ?></td>
                                <td><?= h($customer->Mobile) ?></td>
                               <td><?= substr(h($customer->email),0,50) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $customer->id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $customer->id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $customer->id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]); ?>
                                </td>
                          </tr>
                         <?php 
                      }?>
                      

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


