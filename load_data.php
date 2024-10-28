<?php


include 'chc-admin/classes/Crud.php';
$crud = new Crud();
extract($_POST);
$eID = $_POST['eID'];
$output='';

$newLastEid = null;


    $moreEvents=$crud->Read("events","`events_id` < $eID limit 4");
    if($moreEvents){
    foreach($moreEvents as $event){ 
               // Article Start -->
               $newLastEid =  $event["events_id"] ;
               $output.= ?>      
          <article class="sigma_post sigma_post-list event-list">
            <div class="sigma_post-thumb">
              <a href="event-details.php?eid=<?php echo $event["events_id"] ;?>">
                <img src="chc-admin/<?php echo $event["event_img"] ; ?>" alt="post" style="width:850px;height:520px;">
              </a>
              <div class="event-date-wrapper">
                <?php $edate=$event["events_date"];
                    $date=date("d",strtotime($edate));
                    $day=date("D",strtotime($edate));
                    $month=date("M",strtotime($edate));
                    $year=date("Y",strtotime($edate));
               ?>
                <span><?php echo $date ; ?></span>
                <?php echo  $month." ".$year ; ?>
              </div>
            </div>
            <div class="sigma_post-body">
              <h5> <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>"><?php echo  $event["events_title"] ; ?></a> </h5>
              <p><?php echo  $event["events_desc"] ; ?></p>
                <div class="sigma_post-meta">
                  <a href="event-details.php?eid=<?php echo $event["events_id"] ; ?>"> <i class="far fa-clock"></i> <?php echo  $day; ?></a>
                  <a href="event-details.php?eid=<?php echo  $event["events_id"] ; ?>"> <i class="far fa-map-marker-alt"></i> <?php echo  $event["event_location"] ; ?></a>
                </div>

                <div class="section-button d-flex align-items-center">
                  <a href="event-details.php?eid=<?php echo  $event["events_id"] ; ?>" class="sigma_btn-custom">view<i class="far fa-arrow-right"></i> </a>
                </div>

            </div>
          </article>
            <!-- //   Article End -->
        

  
   <?php  }

}


$response = array(
      'html' => $output, 
    'newLastEid' => $newLastEid,
    'hasMoreData' => $newLastEid !== null
);





echo json_encode($response);
?>

