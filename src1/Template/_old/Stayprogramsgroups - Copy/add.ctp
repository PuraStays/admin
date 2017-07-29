<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Stay Programs Group
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
                <?= $this->Form->create($stayprogramsgroup) ?>
                  <div class="box-body">
                    <div class="form-group">
                    <?= $this->Form->input('Group_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Group Name'));?>
                    </div>
                    <div class="form-group">
                    <?= $this->Form->input('Activities', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Group Name'));?>
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <?= $this->Form->input('Activities', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Activities));?>
                    </div>
                    -->
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




