<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('users') ?>
          </h1>
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <?= $this->Html->link(__('New user', true), ['action' => 'add'], array('class'=>'btn btn-primary', 'alt'=> 'New user')) ?> 
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
                        <th>Image </th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php foreach ($users as $user) {
                         ?>
                          <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td>
                                 <?= $this->Html->image($user->User_Image, array("alt" => $user->Title, "height"=>"40px;")) ?>
                                </td>
                                <td><?= h($user->Name) ?></td>
                                <td><?= h($user->Mobile) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= $user->has('user_type') ? $this->Html->link($user->user_type->id, ['controller' => 'UserTypes', 'action' => 'view', $user->user_type->id]) : '' ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('', true), ['action' => 'view', $user->id], array('class'=>'fa fa-eye', 'alt'=> 'View')) ?> &nbsp;
                                    
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], array('class'=>'fa fa-pencil-square-o', 'alt'=> 'Edit')) ?>  &nbsp;
                                    
                                    <?= $this->Form->postLink(
                                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')),
                                    ['action' => 'delete', $user->id], 
                                    ['escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); ?>
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


