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


	


if (isset($_POST['galleryId'])) {
  $id = $_POST['galleryId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("gallery","`gallery_id`='$id'");


  if ($readUsers) {
    $data['galleryId']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['galleryTitle']=$readUsers[0]['img_title'];
    $data['galleryDesc']=$readUsers[0]['img_desc'];

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
    $data['errorMessage']="Picture not found.";
  }

  echo json_encode($data);
}
?>