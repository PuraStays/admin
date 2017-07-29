 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Edit Activity
          </h1>
          <!--<!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>-->
        </section>

            <!-- Main content -->
        <section class="content">
 
          <div class="row">
            <div class="col-md-6">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">General Details</h3>
                </div>
                <?= $this->Form->create($activity, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Activity_Name', array('type'=>'text' , 'class' => 'form-control', 'placeholder' => 'Enter Activity Name'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Icon', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Icon));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Activity_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter About Activity Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Activity_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter About Activity Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('testimonial_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $testimonials));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('gallery_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $galleries));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Status');?>
                    </div>

                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col (left) -->
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Meta Tagging</h3>
                </div>
                    <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Keyword', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Keyword'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Title'));?>
                    </div><div class="form-group">
                        <?= $this->Form->input('Meta_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Description'));?>
                    </div>
                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Banner</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Image', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Image, 'empty' => 'Select Banner Image'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Banner_Video', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Video, 'empty' => 'Select Banner Video'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Banner_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Description'));?>
                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                        <?= $this->Form->end() ?>
                    </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
             
            </div><!-- /.col (right) -->
          </div><!-- /.row -->

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
