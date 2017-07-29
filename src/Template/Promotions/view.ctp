<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Promotion
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
              <!-- general form elements -->
              <div class="box box-primary">
              <!-- form start -->
                <?= $this->Form->create($promotion, array('enctype' => 'multipart/form-data')); ?>

                  <div class="box-body">
                     <div class="form-group">
                        <?= $this->Form->input('Image', array('type' => 'select', 'class' => 'form-control select2',  'options' => $Image));?>
                    </div>
                    
                    <div class="form-group">
                        <?= $this->Form->input('Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('tag_id', array('type' => 'select', 'class' => 'form-control', 'option' => $tags ));
                    ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Status', array( 'type'=>'checkbox'));?>
                    </div>
                    
                    <div class="form-group">
                      <?= $this->Form->input('Offer', array('class' => 'form-control', 'placeholder' => 'Enter Offer'));?>
                    </div>
                  </div><!-- /.box-body -->

            </div><!-- /.box -->
            <!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->