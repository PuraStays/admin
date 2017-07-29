 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Room
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
                <?= $this->Form->create($resortsRoom, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <?= $this->Form->input('resort_id', array('type' => 'select', 'class' => 'form-control select2',  'options' => $resorts, 'empty' => 'Select Resort'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('RoomType', array('label'=>'Room Type', 'type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Room Type'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Description', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter About Room Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Specification', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Room Summary'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('feature_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $features));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Status', array('type' => 'checkbox'));?>
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
                      <h3 class="box-title">Guest Details</h3>
                    </div>
                        <div class="box-body">
                        <div class="form-group">
                            <?= $this->Form->input('Main_Image', array('label'=>'Default Image', 'type' => 'select', 'class' => 'form-control select2',  'options' => $images, 'empty' => 'Select Default Image'));?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->input('image_id', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $images));?>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6" >
                                <?= $this->Form->input('Max_Adult', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Max Adult'));?>
                            </div>
                            <div class="form-group  col-sm-6">
                                <?= $this->Form->input('Max_Children', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Max Children'));?>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group  col-sm-12">
                            <?= $this->Form->input('Position', array('type'=>'text' ,'class' =>'form-control', 'placeholder' => 'Enter Position'));?>
                        </div>
                        </div>
                        <div class="box-footer">
                        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
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
