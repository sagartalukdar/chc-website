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


	


if (isset($_POST['galleryID'])) {
  $id = $_POST['galleryID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("sports_club_gallery","`club_gallery_id`='$id'");


  if ($readUsers) {
    $data['galleryID']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['galleryTitle']=$readUsers[0]['club_gallery_title'];
    $data['galleryDescription']=$readUsers[0]['club_gallery_about']; 
     
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="This Club Gallery not found.";
  }

  echo json_encode($data);
}
?>