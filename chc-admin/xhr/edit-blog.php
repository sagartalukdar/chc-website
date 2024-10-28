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


	


if (isset($_POST['blogId'])) {
  $id = $_POST['blogId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("blog","`blog_id`='$id'");


  if ($readUsers) {
    $data['blogId']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['blogTitle']=$readUsers[0]['blog_title'];
    $data['blogDesc']=$readUsers[0]['blog_desc']; 
    $data['blogCategory']=$readUsers[0]['blog_category']; 

    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

    	
// blog_id
// blog_title
// blog_desc
// blog_date
// blog_img
// blog_category
// bolg_posted_uid

  } else {
    $data['errorMessage']="Blog not found.";
  }

  echo json_encode($data);
}
?>