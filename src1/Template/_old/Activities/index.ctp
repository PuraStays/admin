<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Activities') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Activity', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Activity')) ?> 
                </div>
              </div>
            </div>
            </div>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Users</a></li>
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
                        <th>Image</th>
                        <th>About Activity</th>
                        <th>Description</th>
                        <th>Status</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                          $i=0; 
                          foreach ($activities as $activity) {
                          $i++;
                         ?>
                          <tr>
                                <td><?= $i; ?></td>
                                <td><?= h($activity->Activity_Name); ?></td>
                                <td><?= $this->Html->image($activity->Banner_Image, array("alt" => $activity->Activity_Name, "height"=>"50px;")) ?></td>
                                <td><?= h($activity->About_Activity_Title); ?></td>
                                <td><?= substr(h($activity->About_Activity_Description),0,80); ?></td>
                                <td><?= $activity->Status; ?></td>
                                <td class="actions">
                                    <!--
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $activity->Id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    -->
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $activity->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $activity->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $activity->Id)]) ?>
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



