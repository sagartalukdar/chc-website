<?php 
session_start();
if (isset($_SESSION['userType'])) {
  if ($_SESSION['userType']!="ADMIN") {
    $_SESSION['errorLogin'] = "Access Denied!";
    header('location: ../sign-in.php');
    exit();
  }
   
}
if (isset($_POST['user_id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  $countUser = $crud->Delete("users","`id`='$user_id'");
  if ($countUser) {
    $data['successMessage'] = "User Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting User.";
  }
    
  echo json_encode($data);
}
?>