<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Images') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Image', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Image')) ?> 
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Alt</th>
                        <th>Meta</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php 
                      $i=0;
                      foreach ($images as $image) {
                        $i++;
                         ?>
                          <tr>
                                <td><?= $i ?></td>
                                <td>
                                 <?= $this->Html->image($image->Image, array("alt" => $image->Title, "height"=>"40px;")) ?>
                                </td>
                                <td><?= h($image->Title); ?></td>
                                <td><?= h($image->Alt); ?></td>
                                <td><?= h($image->Meta); ?></td>
                                <td><?= $image->Position; ?></td>
                                <td><?= $image->Status; ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $image->Id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $image->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $image->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $image->Id)]) ?>
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



