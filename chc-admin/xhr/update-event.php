<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['eventId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  
  $countUser = $crud->Count("events","`events_id`='$eventId'");
  if ($countUser>0) {

    $data = [
        'events_title'=>$eventTitle,
        'events_desc'=>$eventDescription,
        'events_date'=>$eventDate,
        'event_start_time'=>$eventStartTime,
        'event_end_time'=> $eventEndTime,
        'event_location'=>$eventLocation
      ];
    // 
    // Full texts
    // events_id	
    // events_title	
    // events_desc	
    // events_date	
    // event_start_time	
    // event_end_time	
    // event_location	
    // event_img
    //  eventId eventTitle eventDescription eventDate eventStartTime eventEndTime 
    $updateUser = $crud->Update("events",$data,"`events_id`='$eventId'");
    if ($updateUser) {
      $data['successMessage'] = "Event Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Event.";
    }
  } else {
      $data['errorMessage'] = "Event Not Found!";
  }
    
  echo json_encode($data);
}
?>