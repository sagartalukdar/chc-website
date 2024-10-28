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


	


if (isset($_POST['ch_gallery_id'])) {
  $id = $_POST['ch_gallery_id'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("children_gallery","`ch_g_id`='$id'");

//   ministry_id	
//   ministry_desc	
//   ministry_title	
//   ministry_date

  if ($readUsers) {
    $data['ch_gallery_id']=$id;
    // $data['username']=$readUsers[0]['username'];
   
    $data['edit_title']=$readUsers[0]['ch_g_title'];  // edit_title  edit_desc  edit_date  ch_gallery_id
    $data['edit_desc']=$readUsers[0]['ch_g_desc'];
    $data['edit_date']=$readUsers[0]['ch_g_date']; 
    $data['edit_keyword']=$readUsers[0]['ch_g_keyword']; 
    

    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Chilldren Gallery not found.";
  }

  echo json_encode($data);
}
?>