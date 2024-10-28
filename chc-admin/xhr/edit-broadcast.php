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


	


if (isset($_POST['broadcastID'])) {
  $id = $_POST['broadcastID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readBroadcast =$crud->Read("broadcast","`broadcast_id`='$id'");


  if ($readBroadcast) {
    $data['broadcastID']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['broadcastTitle']=$readBroadcast[0]['broadcast_title'];
    $data['broadcastDescription']=$readBroadcast[0]['broadcast_description'];
    $data['broadcastLink']=$readBroadcast[0]['broadcast_link'];
    // $data['broadcastDate']=$readBroadcast[0]['broadcast_date'];

// banner_title	
// banner_id	
// banner_img	
// banner_desc	
// added_date	
// added_time
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="User not found.";
  }

  echo json_encode($data);
}
?>