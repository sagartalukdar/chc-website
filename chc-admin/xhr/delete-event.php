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

  $countUser = $crud->Delete("events","`events_id`='$eventId'");
  if ($countUser) {
    $data['successMessage'] = "Event Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting Event.";
  }
    
  echo json_encode($data);
}
?>