 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Promotion
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
                <?= $this->Form->create($promotion, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text', 'id'=>'Title',  'class' => 'form-control', 
                        'placeholder' => 'Enter Offer Title', 'label' =>'Offer Title', 'data-mask'=>'data-mask', 'data-inputmask'=>'"alias": "dd/mm/yyyy"'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Background', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Background));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Offer', array('type'=>'textarea' ,'class' => 'form-control', 'placeholder' => 'Enter Offer Description', 'label' =>'Offer Description'));?>
                    </div>
                    

                    
                    <div class="form-group">
                        <?= $this->Form->input('Terms', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Terms & Conditions', 'label'=>'Terms & Conditions'));?>
                    </div>
                    

                    
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col (left) -->
            <div class="col-md-6">
              <div class="box box-primary">
                    <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Active_From1', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Active From', 'id'=>'Active_From1', 'label'=>'Active From'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Active_To1', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Active To', 'id'=>'Active_To1', 'label'=>'Active To'));?>
                    </div>
                    
                    
                    <div class="form-group">
                        <?= $this->Form->input('Show_Index', array('type'=>'checkbox', 'label'=>'Show on Home Page'));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Show_Resorts', array('type' => 'select', 'multiple' => 'multiple', 'class' => 'form-control select2',  'options' => $Resorts));?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->input('Status', array('type'=>'checkbox'));?>
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

 <!--datetime formage-->
<script type="text/javascript">
  $(document).ready(function () {
      $('#Active_From1').datepicker({
          format: "yyyy-mm-dd"
      });  
  });

  $(document).ready(function () {
      $('#Active_To1').datepicker({
          format: "yyyy-mm-dd"
      }); 
  });
</script>
