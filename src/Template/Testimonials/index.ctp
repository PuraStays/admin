<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Testimonial') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New Testimonial', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New Testimonial')) ?> 
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
                        <th>User</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php 
                        $i=0;
                        foreach ($testimonials as $testimonial) {
                          $i++;
                         ?>
                          <tr>
                                <td><?= $i; ?></td>
                                <td>
                                 <?= $this->Html->image($testimonial->User_Image, array("alt" => $testimonial->Title, "height"=>"40px;")) ?>
                                </td>
                                <td><?= substr(h($testimonial->Title),0,20); ?></td>
                                <td><?= substr(h($testimonial->Summary),0,50); ?></td>
                                <td class="actions">
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $testimonial->Id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $testimonial->Id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $testimonial->Id)]) ?>
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



