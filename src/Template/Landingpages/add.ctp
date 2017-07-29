 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Landing Page
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
                  <h3 class="box-title">Banner</h3>
                </div>
                <?= $this->Form->create($landingpage, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Image', array('label' => 'Banner Background', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Banner_Image, 'empty' => 'Select Banner Image'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Details', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Details'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Contact', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Contact'));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Offer_Amount', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Offer Amount'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Status', array('type'=>'checkbox'));?>
                    </div>

                    <div class="box-footer">
                    
                    </div>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Package Details</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Package_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Package Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Package_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Package Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Package_Features', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Package Features'));?>
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
              

            </div><!-- /.col (left) -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Gallery</h3>
                    </div>
                        <div class="box-body">
                        <div class="form-group">
                            <?= $this->Form->input('Gallery1_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery1_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery1_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery1_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $this->Form->input('Gallery2_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery2_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery2_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery2_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $this->Form->input('Gallery3_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery3_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery3_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery3_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $this->Form->input('Gallery4_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery4_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery4_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery4_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <?= $this->Form->input('Gallery5_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery5_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery5_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery5_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $this->Form->input('Gallery6_Image', array('label' => 'Gallery Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $Gallery6_Image, 'empty' => 'Select Gallery Image'));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Gallery6_Title', array('label' => 'Gallery Title', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Title'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Gallery6_Description', array('label'=>'Gallery Description', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Gallery Description'));?>
                            </div>
                        </div>



                        <div class="box-footer">
                        
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
  



            
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Description</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Description', array('type'=>'textarea','class' => 'form-control', 'placeholder' => 'Enter Description'));?>
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
