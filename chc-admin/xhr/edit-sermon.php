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


	


if (isset($_POST['userID'])) {
  $id = $_POST['userID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("sermon","`sermon_id`='$id'");


  if ($readUsers) {
    $data['user_id']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['sermonName']=$readUsers[0]['sermon_name'];
    $data['sermonDescription']=$readUsers[0]['sermon_description'];
    $data['sermonLink']=$readUsers[0]['sermonLink'];
    $data['sermonSenderId']=$readUsers[0]['sermon_sender_id'];
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Sermon not found.";
  }

  echo json_encode($data);
}
?>