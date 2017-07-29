 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Resort
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
                <?= $this->Form->create($resort, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Resort_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Resort Name'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Resort_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter About Resort Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Resort_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter About Resort Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('feature_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $features));?>
                    </div>        
                    <!--
                    <div class="form-group">
                        <?= $this->Form->input('testimonial_id', array('type' => 'select', 'disabled'=>'disabled', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $testimonials));?>
                    </div>
                    -->

                    <div class="form-group">
                        <?= $this->Form->input('gallery_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $galleries));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('things_to_do_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $things_to_do_id));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('nearbyplaces_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $nearbyplaces_id));?>
                    </div>
                    

                    <div class="form-group">
                        <?= $this->Form->input('Status');?>
                    </div>

                    <div class="box-footer">
                    
                    </div>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Our Rooms</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Our_Room_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Our Room Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Our_Room_Features', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Our Room Features'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Our_Room_Speciality', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Our Room Speciality'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Our_Room_Gallery', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Our_Room_Gallery, ));?>
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Hotelogix Details</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Hotel_ID', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Hotel Id'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Hotel_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Hotel Name'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Consumer_Key', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Consumer Key'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Consumer_Secret', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Consumer Secret'));?>
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </div><!-- /.col (left) -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Programs</h3>
                    </div>
                        <div class="box-body">
                        <div class="form-group">
                            <?= $this->Form->input('programs_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $programs_id));?>
                        </div>
                        <div class="box-footer">
                        
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Location</h3>
                    </div>
                        <div class="box-body">
                        <div class="row">
                        <div class="form-group col-sm-6" >
                            <?= $this->Form->input('Lat', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Latitude'));?>
                        </div>
                        <div class="form-group  col-sm-6">
                            <?= $this->Form->input('Lng', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Longitude'));?>
                        </div>
                        </div>
                        <div class="box-footer">
                        
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Our Cafe</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Cafe Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Cafe Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Features', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Cafe Features'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Speciality', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Cafe Speciality'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Cafe_Gallery', array('type' => 'select', 'class' => 'form-control select2' , 'multiple' => 'multiple', 'options' => $Cafe_Gallery, ));?>
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

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
