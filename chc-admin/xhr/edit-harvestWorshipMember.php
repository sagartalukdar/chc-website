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


	


if (isset($_POST['memberID'])) {
  $id = $_POST['memberID'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("harvest_worship_members","`member_id`='$id'");

//   Full texts
//   member_id	
//   member_name	
//   member_email	
//   member_phone	
//   member_role	
//   member_photo	
//   member_about

  if ($readUsers) {
    $data['memberID']=$id;
    // $data['username']=$readUsers[0]['username']; 
    $data['memberName']=$readUsers[0]['member_name']; 
    $data['memberEmail']=$readUsers[0]['member_email'];
    $data['memberPhone']=$readUsers[0]['member_phone'];
    $data['memberRole']=$readUsers[0]['member_role'];
    $data['memberAbout']=$readUsers[0]['member_about'];
   
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Harvest Member not found.";
  }

  echo json_encode($data);
}
?>