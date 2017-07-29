 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Stay Program
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
                <?= $this->Form->create($stayprogram, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('Program_Title', array('class' => 'form-control', 'placeholder' => 'Enter Program Title'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Mood', array('label' => 'Tags', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Mood));?>
                    </div>

                    <div class="form-group">
                            <?= $this->Form->input('Program_Gallery', array('type' => 'select', 'class' => 'form-control select2', 'multiple'=>'multiple',  'options' => $Program_Gallery)); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Program_Details', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Program Details'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Features', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Features'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Speciality', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Speciality'));?>
                    </div>


                    <div class="form-group">
                        <?= $this->Form->input('Status');?>
                    </div>

                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    </div>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->


                <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Activities</h3>
                </div>
                <?= $this->Form->create($stayprogram, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">

                    <div class="form-group">
                        
                    </div>

                      <div class="row">
                        <div class="col-xs-12">
                          <?= $this->Form->input('Group1', array('label' => 'Meta Group', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group1));?>
                        </div>
                        <!--
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group1_Activities', array('label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                        -->
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <?= $this->Form->input('Group2', array('label' => 'Meta Group', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group2));?>
                        </div>
                        <!--
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group2_Activities', array('label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                        -->
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <?= $this->Form->input('Group3', array('label' => 'Meta Group', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group3));?>
                        </div>
                        <!--
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group3_Activities', array('label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                        -->
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <?= $this->Form->input('Group4', array('label' => 'Meta Group', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group4));?>
                        </div>
                        <!--
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group4_Activities', array('label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                        -->
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <?= $this->Form->input('Group5', array('label' => 'Meta Group', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group5));?>
                        </div>
                        <!--
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group5_Activities', array('label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                        -->
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
                  <h3 class="box-title">Program Details </h3>
                </div>
                <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Program_Time_Min', array('label'=>'Program Time (Min)', 'class' => 'form-control', 'placeholder' => 'Enter Program Time (Min)'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Program_Time_Max', array('label'=>'Program Time (Max)','class' => 'form-control', 'placeholder' => 'Enter Program Time (Max)'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Unit_Pricing', array('label'=>'Unit Pricing', 'class' => 'form-control', 'placeholder' => 'Enter Unit Pricing'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Unit', array('label'=>'Unit', 'class' => 'form-control', 'placeholder' => 'Enter Unit'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Discount', array('label'=>'Discounts for buy more then 1', 'class' => 'form-control', 'placeholder' => 'Enter Discounts'));?>
                    </div>
                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                        
                    </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Meta Tagging</h3>
                </div>
                    <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Keyword', array('class' => 'form-control', 'placeholder' => 'Enter Meta Keyword'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Title', array('class' => 'form-control', 'placeholder' => 'Enter Meta Title'));?>
                    </div><div class="form-group">
                        <?= $this->Form->input('Meta_Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Description'));?>
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
