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


// hw_details_id
// hw_details_title
// hw_details_desc
// hw_details_intro

if (isset($_POST['detailsID'])) {
  $id = $_POST['detailsID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("hw_details","`hw_details_id`='$id'"); 
  if ($readUsers) {
    $data['detailsID']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['hwIntro']=$readUsers[0]['hw_details_intro'];
    $data['hwTitle']=$readUsers[0]['hw_details_title'];
    $data['hwDesc']=$readUsers[0]['hw_details_desc'];

    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];
  } else {
    $data['errorMessage']="Worship Details not found."; 
  }

  echo json_encode($data);
}
?>