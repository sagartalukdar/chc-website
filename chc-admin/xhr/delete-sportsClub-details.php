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


  extract($_POST);

  $countUser = $crud->Delete("sports_club_details","`sports_club_id`='$detailsId'");
  if ($countUser) {
    $data['successMessage'] = "Club Details Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting Club Details.";
  }
    
  echo json_encode($data);
}
?>