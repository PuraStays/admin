<?php
//include_once('../../Pages/db.inc.php');
include_once('../../api/includes/db.inc.php');

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Booking Details
		
            <?php
		
	      $db = new DB();
              $i = 0;
              foreach($details->bookings as $booking)
              {
                if($i==0)
                $bookings = $booking;
                $i++;
              }
              
            ?>    
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> <?= $bookings->where->resort_name;?>
                
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
              <address>
                <strong><?= $bookings->user->name; ?></strong><br>
                Phone: <?= $bookings->user->mobile; ?><br>
                Email: <?= $bookings->user->email; ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-6 invoice-col">
              <address>
                <strong>Booking Details: <?= $bookings->savebooking->response->order->id; ?></strong><br>
                Booking Date & Time : <?php echo $db->utc_to_date($bookings->savebooking->response->order->orderdate);?><br>
                Booking Status: 
			 <?php 
                          if($db->clm_value('status' , 'orderid', 'hotelogix_details', $bookings->savebooking->response->order->id)==1)
                           {
                              echo 'Confirmed';
                           }
                           else
                           {
                              if($db->clm_value('cancel' , 'orderid', 'hotelogix_details', $bookings->savebooking->response->order->id)==1){

                                echo 'Cancelled';
                              }
                              else
                              {
                                echo 'Not Confirmed';  
                              }
                              
                           }
                           ?>
              </address>
            </div><!-- /.col -->

            
          </div><!-- /.row -->
          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-4">
              <p class="lead">Persons</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Adult:</th>
                    <td><?= $bookings->person->adult; ?></td>
                  </tr>
                  <tr>
                    <th>Child</th>
                    <td><?= $bookings->person->child; ?></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?= $bookings->person->adult + $bookings->person->child; ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <p class="lead">Dates</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">From:</th>
                    <td><?= $db->date_fromate($bookings->when->start_date);?></td>
                  </tr>
                  <tr>
                    <th>To</th>
                    <td><?= $db->date_fromate($bookings->when->end_date); ?></td>
                  </tr>
                  <tr>
                    <th>Duration:</th>
                    <td><?= $bookings->when->duration; ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
            
          </div><!-- /.row -->


          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <p class="lead">Stay</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Unit</th>
                    <th>Room</th>
                    <th>Rate</th>
                    <th>Tax</th>
                    <th>Price (Rs.)</th>
                  </tr>
                </thead>
                <?php
                  $SN= 0;
                  foreach($bookings->rooms as $room)
                  {
                  $SN++;
                ?>
                  <tbody>
                    <tr>
                      <td><?= $SN; ?></td>
                      <td><?= $room->room_name; ?></td>
                      <td><?= $room->room_count; ?></td>
                      <td><?= $room->rate->price; ?></td>
                      <td><?= $room->rate->tax; ?></td>
                      <td><?= ($room->rate->price + $room->rate->tax)*$room->room_count; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
             
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              
                 <?php

                    $package_price = 0;
                    if($bookings->package>0)
			{
			  echo  '<p class="lead">Experience</p>';
			}    
		
                    foreach ($bookings->package as $key => $value) {
                      $package_price = $package_price + $value->totalPrice;
                      ?>
                      <table class="table table-bordered custom">
                      <thead>
                        <tr>
                            <th>Adventure Level</th>
                            <th>Unit</th>
                            <th align="right">Price</th>
                            <th>Activities</th>
                          </tr>
                        </thead>
                        <tbody>
                      <?php

                      $act_count = 0;
                      ?>
                        <tr>
                          <td rowspan="5"><?= $value->title; ?></td>
                          <td rowspan="5"><?= $value->forPerson; ?></td>
                          <td rowspan="5"><?= $value->totalPrice; ?></td>
                        </tr>    
                      <?php
                      if(is_object($value->selectedActivity))
                      {
                        $value->selectedActivity = json_decode(json_encode($value->selectedActivity), true);
                      }

                      
                      foreach ($value->groups as  $group) {
                        foreach ($group as $subgroup) {
                          foreach ($subgroup->activities as $activity) {
                            if(isset($activity->seqId))
                            {
                              if($value->selectedActivity[$activity->seqId]==1)
                              {
                                $act_count++;
                                ?>
                                <tr>
                                  <td><?= $activity->Activity_Name; ?></td>
                                </tr>
                                <?php
                              }
                            }
                            else
                            {
                                  $act_count++;
                            ?>
                                <tr>
                                  <td><?= $activity->Activity_Name; ?></td>
                                </tr>      
                              <?php 
                            }
                          }
                        }
                      }
                      ?>
                      </tbody>
                      </table>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            <table class="table table-bordered">                          
                <tbody>                
                  <tr>
                    <td colspan="3" align="right">Amount : <?php echo $price =  $package_price + $bookings->user->room_price; ?></td>                   
                  </tr>
                  <tr>
                    <td colspan="3" align="right">Amount Deposited: <?= $price =  $package_price + $bookings->savebooking->response->order->deposittotal->amount; ?></td>                   
                  </tr>

                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          

        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->