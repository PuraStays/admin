<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= __('Bookings') ?>
          </h1>
            
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Back</a></li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example" class="table">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Resort Name </th>
                        <th>From</th>
                        <th>To</th>
                        <th>Duration</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                      //var_dump($bookings->bookings);
                    ?>
                      <?php 
                      $SN = 0;
                      
                      foreach ($bookings->bookings as $booking) {
                          $SN++;
                         ?>
                          <tr>
                               <?php
                              $num = 0;
                               foreach($booking as $book)
                               {
                                 $num++;
                                 if($num==1)
                                 {
                                    ?> 
                                      <td><?= $SN; ?></td>
                                      <td><?= $book->where->resort_name; ?></td>
                                      <td><?= $book->when->start_date; ?></td>
                                      <td><?= $book->when->end_date; ?></td>
                                      <td><?= $book->when->duration; ?></td>
                                      <td><?= $book->person->adult; ?></td>
                                      <td><?= $book->person->child; ?></td>
                                    <?php
                                }
                                else
                                 {
                                    ?>
                                      <td class="actions">
                                        <?= $this->Html->link(__('', true), ['action' => 'details', $book], array('class'=>'fa fa-eye', 'alt'=> 'View Details')) ?> &nbsp;
                                      </td>  
                                    <?php
                                 }
                               }
                               ?> 
                          </tr>
                         <?php 
                      }?>
                      

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


