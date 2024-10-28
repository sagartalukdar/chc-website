<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['memberID'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  $countUser = $crud->Delete("harvest_worship_members","`member_id`='$memberID'");
  if ($countUser) {
    $data['successMessage'] = "Harvest Member Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting Harvest Member.";
  }
    
  echo json_encode($data);
}
?>