<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Image
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
                <?= $this->Form->create($image, array('enctype' => 'multipart/form-data')); ?>
                  <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Image', array('type'=>'file' ,'class' => 'form-control', 'placeholder' => 'Enter Image'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Alt', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Alt'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Meta', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta'));?>
                    </div>

                   
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>
                  <div class="form-group">
                        <?= $this->Form->input('Position', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Position'));?>
                    </div>
                    

                    <div class="form-group">
                      <?= $this->Form->input('Description', array('class' => 'form-control', 'placeholder' => 'Enter Description'));?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->input('Status');?>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onclick="return beforesubmit()">Submit</button>
                    <?= $this->Form->end() ?>
                  </div>
              </div><!-- /.box -->
            <!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->





<script>
      //Initialize Select2 Elements
      $(".select2").select2();
function beforesubmit(){
  //alert('ok');
  //alert(document.getElementsByName('Tagging').value);
//  return false;
}

</script>
