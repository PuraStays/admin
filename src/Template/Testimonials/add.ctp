 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Testimonial
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
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
                <?= $this->Form->create($testimonial, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Testimonial Title'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Summary', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Summary'));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Description'));?>
                    </div>


                    <div class="form-group">
                        <?= $this->Form->input('resort_id', array('type' => 'select', 'class' => 'form-control select2',  'options' => $resort_id));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('gallery_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Banner_Image));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>

                   <div class="form-group">
                        <?= $this->Form->input('User_Name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter User Name'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('User_Designation', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter User Designation'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('User_Image', array('label' => 'User Photo', 'type' => 'select', 'class' => 'form-control', 'options' => $User_Image));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Testimonial_For_Name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Testimonial For Name'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Testimonial_For_Image', array('label' => 'Testimonial For Photo', 'type' => 'select', 'class' => 'form-control select2', 'options' => $Testimonial_For_Image));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Status');?>
                    </div>


                    <div class="box-footer">
                    
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
                    
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Banner</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Image', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Image));?>
                    </div>

                    <?php /*?>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Video', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Video));?>
                    </div>
                    <?php */?>
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
