<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['detailsId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  $countUser = $crud->Delete("hw_details","`hw_details_id`='$detailsId'");
  if ($countUser) {
    $data['successMessage'] = "Worship Details Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting Worship Details.";
  }
    
  echo json_encode($data);
}
?>

