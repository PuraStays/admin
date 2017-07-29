<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Testimonial
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
                <?= $this->Form->create($testimonial, array('enctype' => 'multipart/form-data')); ?>
                  <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Image', array('type' => 'select', 'type' => 'select', 'disabled' => 'disabled', 'class' => 'form-control select2',  'options' => $Image));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('resort_id', array('type' => 'select', 'class' => 'form-control select2',  'disabled' => 'disabled',  'options' => $resort_id));?>
                    </div>

                    
                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control',  'disabled' => 'disabled', 'placeholder' => 'Enter Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2',  'disabled' => 'disabled', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Summary', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Summary', 'disabled' => 'disabled'));?>
                    </div>

                    <div class="form-group">
                      <?= $this->Form->input('Description', array('class' => 'form-control',   'disabled' => 'disabled', 'placeholder' => 'Enter Description'));?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->input('Status', array('disabled' => 'disabled'));?>
                    </div>

                  </div><!-- /.box-body -->

                </form>
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
