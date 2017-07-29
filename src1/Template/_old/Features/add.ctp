<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Feature
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
                <?= $this->Form->create($feature, array('enctype' => 'multipart/form-data')); ?>
                  <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Image', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Image, 'empty' => 'Select Image'));?>
                    </div>
                    

                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
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
