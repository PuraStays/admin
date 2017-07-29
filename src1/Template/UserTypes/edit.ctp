<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit User Type
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
                <?= $this->Form->create($userType) ?>
                  <div class="box-body">
                    <div class="form-group">
                    <?= $this->Form->input('User_Type_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter User Type Name'));?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->input('Description', array('class' => 'form-control', 'placeholder' => 'Enter Description'));?>
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





