<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Stay Programs') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Stay Programs', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Stay Programs')) ?> 
                </div>
              </div>
            </div>
            </div>

          <!--<!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Users</a></li>
            <li class="active">Data tables</li>
          </ol>-->
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
                        <th>Title</th>
                        <th>Time</th>
                        <th>Unit Pricing</th>
                        <th>Unit</th>
                        <th>Discounts</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php 
                            $Serial = 0;

                          foreach ($stayprograms as $stayprogram) {
                          $Serial++;
                         ?>
                          <tr>
                                <td><?= $Serial; ?></td>
                                <td><?= h($stayprogram->Program_Title); ?></td>
                                <td><?= $stayprogram->Program_Time_Min.'-'.$stayprogram->Program_Time_Max; ?></td>
                                <td><?= h($stayprogram->Unit_Pricing); ?></td>
                                <td><?= h($stayprogram->Unit); ?></td>
                                <td><?= h($stayprogram->Discount); ?></td>
                                <td><?= h($stayprogram->Status); ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $stayprogram->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $stayprogram->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $stayprogram->Id)]) ?>
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



