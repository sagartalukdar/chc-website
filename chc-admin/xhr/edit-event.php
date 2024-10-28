<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }


	


if (isset($_POST['eventId'])) {
  $id = $_POST['eventId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("events","`events_id`='$id'");

//   Full texts
//   events_id	
//   events_title	
//   events_desc	
//   events_date	
//   event_start_time	
//   event_end_time	
//   event_location	
//   event_img

  if ($readUsers) {
    $data['eventId']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['eventTitle']=$readUsers[0]['events_title']; 
    $data['eventDescription']=$readUsers[0]['events_desc'];
    $data['eventDate']=$readUsers[0]['events_date'];
    $data['eventStartTime']=$readUsers[0]['event_start_time'];
    $data['eventEndTime']=$readUsers[0]['event_end_time'];
    $data['eventLocation']=$readUsers[0]['event_location'];
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Event not found.";
  }

  echo json_encode($data);
}
?>