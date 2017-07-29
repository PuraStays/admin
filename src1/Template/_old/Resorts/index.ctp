<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Resorts') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Resort', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Resort')) ?> 
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
                        <th>About Resort</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                          $i=0; 
                          foreach ($resorts as $resort) {
                          $i++;
                         ?>
                          <tr>
                                <td><?= $i; ?></td>
                                <td><?= h($resort->Resort_Name); ?></td>
                                <td><?= $this->Html->image($resort->Banner_Image, array("alt" => $resort->Resort_Name, "height"=>"50px;")) ?></td>
                                <td><?= h($resort->About_Resort_Title); ?></td>
                                <td><?= h(substr($resort->About_Resort_Description,0,100)); ?></td>
                                <td class="actions">
                                    <!--
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $resort->Id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    -->
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $resort->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $resort->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $resort->Id)]) ?>
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



