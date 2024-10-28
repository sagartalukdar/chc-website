<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['galleryId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  $countUser = $crud->Delete("sports_club_gallery","`club_gallery_id`='$galleryId'");
  if ($countUser) {
    $data['successMessage'] = "  Successfully Deleted From Sports Club Gallery";
  } else {
      $data['errorMessage'] = "Error Deleting Sports Club Gallery.";
  }
    
  echo json_encode($data);
}
?>