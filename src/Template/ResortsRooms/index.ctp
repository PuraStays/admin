<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Rooms') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Room', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Room')) ?> 
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
                        <th>Resort</th>
                        <th>Room Type</th>
                        <th>Image</th>
                        <th>Max Adult</th>
                        <th>Max Children</th>
                        <th>Position</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                          $i=0; 
                          foreach ($resortsRooms as $resortsRoom) {
                          $i++;
                         ?>
                          <tr>
                                <td><?= $i; ?></td>
                                <td><?= h($resortsRoom['resort']->Hotel_Name); ?></td>
                                <td><?= h($resortsRoom->RoomType); ?></td>
                                <td><?= $this->Html->image($resortsRoom->Main_Image, array("alt" => $resortsRoom->Resort_Name, "height"=>"50px;")) ?></td>
                                <td><?= h($resortsRoom->Max_Adult); ?></td>
                                <td><?= h($resortsRoom->Max_Children); ?></td>
                                <td><?= h($resortsRoom->Position); ?></td>
                                <td class="actions">
                                    <!--
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $resortsRoom->Id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    -->
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $resortsRoom->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $resortsRoom->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $resortsRoom->Id)]) ?>
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



