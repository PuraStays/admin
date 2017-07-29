<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <?= $this->Form->create($user) ?>
                  <div class="box-body">
                     <div class="form-group">
                        <?= $this->Html->image($user->Image, array("alt" => $user->Name, "height"=>"150px;")) ?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->input('Name', array('disabled'=>'disabled' ,'class' => 'form-control', 'placeholder' => 'Enter Name'));?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->input('Mobile', array('disabled'=>'disabled' ,'class' => 'form-control', 'placeholder' => 'Enter Mobile'));?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->input('email', array('disabled'=>'disabled' ,'class' => 'form-control', 'placeholder' => 'Enter email'));?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->input('user_type_id', array('type'=>'text', 'disabled'=>'disabled', 'class' => 'form-control', 'placeholder' => 'Enter email'));?>
                    </div>


                    <div class="form-group">
                        <?= $this->Form->input('Status', array('disabled'=>'disabled'));?>
                    </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
            <!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->