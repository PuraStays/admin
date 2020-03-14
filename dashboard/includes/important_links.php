<div class="sidebar">
            <div class="unordered-list">
              <h2> Important Links </h2>
              <ul>
                <?php  
                  /*
                  date_default_timezone_set('Asia/Kolkata');
                  $Date =  date('Y-m-d');    

                  $db = new DB();
                  $qry = "SELECT * FROM events where Status = 1 && Active_From  <= '$Date' && Active_To >= '$Date' order by Date DESC limit 8";
                  $result = $db->_query($qry);
                  while ($row = mysqli_fetch_array($result)) 
                  {
                    //var_dump($row);
                    ?>
                    <li><i class="fa fa-angle-right"></i><a
                    <?php 
                      if($row['Target']==1)
                      {
                        echo 'target="_blank"';
                      }
                    ?>
                     href="<?php
                        if($row["External_Link"]!="")
                        {
                          echo $row["External_Link"];
                        }
                        else
                        {
                          echo 'news-details.php?id='.$row['Id'];
                        }
                    ?>"><?= $row['Title']?></a></li>
                    <?php
                  }
                  */
                ?>
                <li><i class="fa fa-angle-right"></i><a href="downloads/AME-CET-Sample-Paper-for-XII.pdf">AME CET 2019 Sample Paper for XII</a></li>
                <li><i class="fa fa-angle-right"></i><a href="https://www.amecet.in/aircraft-maintenance-engineering-common-entrance-test-amecet-exam.php#eligibility">AME CET 2019 Eligibility Criteria</a></li>
              </ul>
              <a class="view-more" href="downloads.php">view more... </a>
            </div>
          </div>