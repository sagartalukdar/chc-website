<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['userType'])) {
  if ($_SESSION['userType']!="ADMIN") {
    $_SESSION['errorLogin'] = "Access Denied!";
    header('location: ../sign-in.php');
    exit();
  }
   
}

if (isset($_POST['userID'])) {
  $id = $_POST['userID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("users","`id`='$id'");
  if ($readUsers) {
    $data['user_id']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['name']=$readUsers[0]['name'];
    $data['surname']=$readUsers[0]['surname'];
    $data['email']=$readUsers[0]['email'];
    $data['phone']=$readUsers[0]['phone'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    $data['status']=$readUsers[0]['status'];
  } else {
    $data['errorMessage']="User not found.";
  }

  echo json_encode($data);
}
?>