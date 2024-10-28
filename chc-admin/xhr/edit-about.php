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


	


if (isset($_POST['aboutId'])) {
  $id = $_POST['aboutId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("about","`about_id`='$id'");

 // about_id
 // about_intro
 // about_title
 // about_desc 
 // about_img  -->

  if ($readUsers) {
    $data['aboutId']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['aboutIntro']=$readUsers[0]['about_intro'];
    $data['aboutTitle']=$readUsers[0]['about_title'];
    $data['aboutDesc']=$readUsers[0]['about_desc'];
    $data['aboutLink']=$readUsers[0]['about_link'];
    

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