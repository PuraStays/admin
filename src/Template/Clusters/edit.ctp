 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Cluster
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
            <div class="col-md-12">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">General Details</h3>
                </div>
                <?= $this->Form->create($cluster, array('enctype' => 'multipart/form-data')) ?>
                <div class="box-body">
                    
                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter About Cluster Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Tags', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple',  'options' => $Tags));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Resorts', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Resorts));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Activities', array('type' => 'select', 'class' => 'form-control select2', 'multiple' => 'multiple', 'options' => $Activities));?>
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

            </div><!-- /.col (left) -->
            
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
