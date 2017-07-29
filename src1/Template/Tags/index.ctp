<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Tags') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Tag', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Tag')) ?> 
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
                        <th>SN</th>
                        <th>Id</th>
                        <th>Title </th>
                        <th>Type </th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                        $i=0; 
                        foreach ($tags as $tag) {
                          $i++;
                         ?>
                          <tr>
                                <td><?= $i; ?></td>
                                <td><?= $this->Number->format($tag->Id) ?></td>
                                <td><?= h($tag->Title) ?></td>
                                <td><?= h($tag->Type) ?></td>
                                <td><?= h($tag->Description) ?></td>

                                <td class="actions">
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $tag->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $tag->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $tag->Id)]) ?>
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


