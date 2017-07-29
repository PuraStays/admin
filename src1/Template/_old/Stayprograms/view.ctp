 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Stay Program
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol>
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
                        <?= $this->Form->input('Program_Title', array('disabled'=> 'disabled', 'class' => 'form-control', 'placeholder' => 'Enter Program Title'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Mood', array('disabled'=> 'disabled', 'label' => 'Mood', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Mood));?>
                    </div>

                    <div class="form-group">
                            <?= $this->Form->input('Program_Gallery', array('disabled'=> 'disabled', 'type' => 'select', 'class' => 'form-control select2', 'multiple'=>'multiple',  'options' => $Program_Gallery)); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Program_Details', array('disabled'=> 'disabled', 'type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Program Details'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Status', array('disabled'=> 'disabled'));?>
                    </div>

                    
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->


                <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Activities</h3>
                </div>
                <?= $this->Form->create($stayprogram, array('disabled'=> 'disabled', 'enctype' => 'multipart/form-data')) ?>
                <div class="box-body">

                    <div class="form-group">
                        <?= $this->Form->input('Total_Activities', array('disabled'=> 'disabled', 'class' => 'form-control', 'placeholder' => 'Enter Total Activities'));?>
                    </div>
                    <div class="form-group">
                        
                    </div>

                      <div class="row">
                        <div class="col-xs-9">
                          <?= $this->Form->input('Group1', array('disabled'=> 'disabled', 'label' => 'Group 1', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group1));?>
                        </div>
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group1_Activities', array('disabled'=> 'disabled', 'label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-9">
                          <?= $this->Form->input('Group2', array('disabled'=> 'disabled', 'label' => 'Group 2', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group2));?>
                        </div>
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group2_Activities', array('disabled'=> 'disabled', 'label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-9">
                          <?= $this->Form->input('Group3', array('disabled'=> 'disabled', 'label' => 'Group 3', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group3));?>
                        </div>
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group3_Activities', array('disabled'=> 'disabled', 'label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-9">
                          <?= $this->Form->input('Group4', array('disabled'=> 'disabled', 'label' => 'Group 4', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group4));?>
                        </div>
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group4_Activities', array('disabled'=> 'disabled', 'label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-9">
                          <?= $this->Form->input('Group5', array('disabled'=> 'disabled', 'label' => 'Group 5', 'type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Group5));?>
                        </div>
                        <div class="col-xs-3">
                          <?= $this->Form->input('Group5_Activities', array('disabled'=> 'disabled', 'label' => 'Activities', 'class' => 'form-control', 'placeholder' => 'Activities'));?>
                        </div>
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
                        <?= $this->Form->input('Program_Time_Min', array('disabled'=> 'disabled', 'label'=>'Program Time (Min)', 'class' => 'form-control', 'placeholder' => 'Enter Program Time (Min)'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Program_Time_Max', array('disabled'=> 'disabled', 'label'=>'Program Time (Max)','class' => 'form-control', 'placeholder' => 'Enter Program Time (Max)'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Rate_Adult_Double_Occ', array('disabled'=> 'disabled', 'label'=>'Rate Adult Double Occurrence', 'class' => 'form-control', 'placeholder' => 'Enter Rate Adult Double Occurrence'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Rate_Adult_Single_Occ', array('disabled'=> 'disabled', 'label'=>'Rate Adult Single Occurrence', 'class' => 'form-control', 'placeholder' => 'Enter Rate Adult Single Occurrence'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Rate_Kids', array('disabled'=> 'disabled', 'label'=>'Rate Adult Single Occurrence', 'class' => 'form-control', 'placeholder' => 'Enter Rate Kids'));?>
                    </div>
                    
                   

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Meta Tagging</h3>
                </div>
                    <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Keyword', array('disabled'=> 'disabled', 'class' => 'form-control', 'placeholder' => 'Enter Meta Keyword'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Title', array('disabled'=> 'disabled', 'class' => 'form-control', 'placeholder' => 'Enter Meta Title'));?>
                    </div><div class="form-group">
                        <?= $this->Form->input('Meta_Description', array('disabled'=> 'disabled', 'type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Description'));?>
                    </div>
                    
                    <div class="box-footer">
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
