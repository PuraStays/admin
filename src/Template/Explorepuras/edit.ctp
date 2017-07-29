 <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Explore Pura
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
                
                <?= $this->Form->create($explorepura, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-header">
                  <h3 class="box-title">Stay</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Title', array('label' => 'Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Stay Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Feature1', array('label' => 'Feature 1', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Feature2', array('label' => 'Feature 2', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Feature3', array('label' => 'Feature 3', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Feature4', array('label' => 'Feature 4', 'class' => 'form-control'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Stay_Description', array('label' => 'Description','class' => 'form-control', 'placeholder' => 'Enter Stay_Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Stay_Gallery', array('type' => 'select', 'class' => 'form-control select2',  'multiple' => 'multiple', 'options' => $Stay_Gallery));?>
                    </div>

                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div><!-- /.box-body -->
                


                <!--Start Cafe Panel here-->
                <div class="box-header">
                  <h3 class="box-title">Cafe</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Title', array('label' => 'Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Cafe Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Feature1', array('label' => 'Feature 1', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Feature2', array('label' => 'Feature 2', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Feature3', array('label' => 'Feature 3', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Feature4', array('label' => 'Feature 4', 'class' => 'form-control'));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Description', array('label' => 'Description','class' => 'form-control', 'placeholder' => 'Enter Cafe_Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Gallery', array('type' => 'select', 'multiple' => 'multiple', 'class' => 'form-control select2',  'options' => $Cafe_Gallery));?>
                    </div>
                    
                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div>
                <!--Ends Cafe Panel here-->
                

                <!--Start Experiences Panel here-->
                <div class="box-header">
                  <h3 class="box-title">Experiences</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Title', array('label' => 'Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Experiences Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Feature1', array('label' => 'Feature 1', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Feature2', array('label' => 'Feature 2', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Feature3', array('label' => 'Feature 3', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Feature4', array('label' => 'Feature 4', 'class' => 'form-control'));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Description', array('label' => 'Description','class' => 'form-control', 'placeholder' => 'Enter Experiences_Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Experiences_Gallery', array('type' => 'select', 'multiple' => 'multiple', 'class' => 'form-control select2',  'options' => $Experiences_Gallery));?>
                    </div>

                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div>
                <!--Ends Experiences Panel here-->
                


                <!--Start Operations Panel here-->
                <div class="box-header">
                  <h3 class="box-title">Operations</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Title', array('label' => 'Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Operations Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Feature1', array('label' => 'Feature 1', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Feature2', array('label' => 'Feature 2', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Feature3', array('label' => 'Feature 3', 'class' => 'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Feature4', array('label' => 'Feature 4', 'class' => 'form-control'));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Description', array('label' => 'Description','class' => 'form-control', 'placeholder' => 'Enter Operations_Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Operations_Gallery', array('type' => 'select', 'multiple' => 'multiple', 'class' => 'form-control select2',  'options' => $Operations_Gallery));?>
                    </div>


                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div>
                <!--Ends Operations Panel here-->
                




                
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
                    </div>
                    <div class="form-group">
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
                        <?= $this->Form->input('Banner_Image', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Image));?>
                    </div>


                    <div class="form-group">
                        <?= $this->Form->input('Banner_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Description'));?>
                    </div>
                    
                 
                    <div class="form-group">
                        <?= $this->Form->input('Status');?>
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
