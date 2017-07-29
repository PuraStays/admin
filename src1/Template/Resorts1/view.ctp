 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Resort
          </h1>
          <!--<!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>-->
        </section>

            <!-- Main content -->
            <section class="content">
            <?php /*?>
              <!-- SELECT2 EXAMPLE -->
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">General Details</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Minimal</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label>Disabled</label>
                        <select class="form-control select2" disabled="disabled" style="width: 100%;">
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Multiple</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label>Disabled Result</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option disabled="disabled">California (disabled)</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div><!-- /.form-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                
                <div class="box-footer">
                  Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about the plugin.
                </div>
              </div><!-- /.box -->
            <?php */?>
          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">General Details</h3>
                </div>
                
                <div class="box-body">
                    <?= $this->Form->create($resort, array('enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <?= $this->Form->input('Resort_Name', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Resort Name'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Resort_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter About Resort Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('About_Resort_Description', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter About Resort Description'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('feature_id', array('class' => 'form-control', 'options' => $features));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('testimonial_id', array('class' => 'form-control', 'options' => $testimonials));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('gallery_id', array('class' => 'form-control', 'options' => $galleries));?>
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
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Meta Tagging</h3>
                </div>
                    <div class="box-body">
                    <?= $this->Form->create($resort, array('enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Keyword', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Keyword'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Meta_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Title'));?>
                    </div><div class="form-group">
                        <?= $this->Form->input('Meta_Description', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Meta Description'));?>
                    </div>
                    <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
                    <?= $this->Form->end() ?>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Banner</h3>
                </div>
                <div class="box-body">
                    <?= $this->Form->create($resort, array('enctype' => 'multipart/form-data')) ?>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Image', array('type'=>'file' ,'class' => 'form-control', 'placeholder' => 'Enter Banner_Image'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Video', array('type'=>'file' ,'class' => 'form-control', 'placeholder' => 'Enter Banner_Video'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Title', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Title'));?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('Banner_Description', array('type'=>'text' ,'class' => 'form-control', 'placeholder' => 'Enter Banner Description'));?>
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