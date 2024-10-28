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

  $countUser = $crud->Count("users","`id`='$user_id'");
  if ($countUser>0) {
    $data = [
      'name'=>$fname,
      'surname'=>$lname,
      'email'=>$email,
      'phone'=>$phone,
      'status'=>$status
    ];

    $updateUser = $crud->Update("users",$data,"`id`='$user_id'");
    if ($updateUser) {
      $data['successMessage'] = "User Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating User.";
    }
  } else {
      $data['errorMessage'] = "User Not Found!";
  }
    
  echo json_encode($data);
}
?>