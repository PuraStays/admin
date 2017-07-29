<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Stay Programs Group
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
                <?= $this->Form->create($stayprogramsgroup) ?>
                  <div class="box-body">

                    <div class="form-group">
                        <?= $this->Form->input('Group_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Group Name', 'disabled'=>'disabled'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('activities_id', $arrayName = array('class' => 'form-control select2', 'multiple' => 'multiple', 'disabled'=>'disabled'))?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Status', $arrayName = array('disabled'=>'disabled'));?>
                    </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
            <!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
