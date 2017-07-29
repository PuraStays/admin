<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add User
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <?= $this->Form->create($user, array('enctype' => 'multipart/form-data')); ?>
                  <div class="box-body">

                    <div class="form-group">
                        <?= $this->Form->input('User_Image', array('type' => 'select', 'class' => 'form-control select2', 'options' => $User_Image, 'empty' => 'Select User Image'));?>
                    </div>

                    <div class="form-group">
                    <?= $this->Form->input('Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Name'));?>
                    </div>

                    <div class="form-group">
                    <?= $this->Form->input('Mobile', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Mobile'));?>
                    </div>

                    <div class="form-group">
                    <?= $this->Form->input('email', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Email'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('user_type_id', array('class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">
                    <?= $this->Form->input('password', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Password'));?>
                    </div>

                    <div class="form-group">
                    <?= $this->Form->input('Status');?>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?= $this->Form->end() ?>
                  </div>
                </form>
              </div><!-- /.box -->
            <!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



