<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('New Stay Programs Groups') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Stay Programs Group', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Stay Programs Group')) ?> 
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
                        <th>Group Name </th>
                        <th>Activities</th>
                        <th>Status</th>
                        <th>DOC</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php foreach ($stayprogramsgroups as $stayprogramsgroup) {
                         ?>
                          <tr>
                                <td><?= $this->Number->format($stayprogramsgroup->Id); ?></td>
                                <td><?= h($stayprogramsgroup->Group_Name); ?></td>
                                <td><?= h($stayprogramsgroup->Activities); ?></td>
                                <td><?= h($stayprogramsgroup->Status); ?></td>
                                <td><?= h($stayprogramsgroup->DOC); ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $stayprogramsgroup->Id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $stayprogramsgroup->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->stayprogramsgroup('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $stayprogramsgroup->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $stayprogramsgroup->Id)]) ?>
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


