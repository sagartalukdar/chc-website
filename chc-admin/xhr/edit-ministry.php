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


	


if (isset($_POST['ministryId'])) {
  $id = $_POST['ministryId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("ministry_details","`ministry_id`='$id'");

//   ministry_id	
//   ministry_desc	
//   ministry_title	
//   ministry_date

  if ($readUsers) {
    $data['ministryId']=$id;
    // $data['username']=$readUsers[0]['username'];
   
    $data['ministryTitle']=$readUsers[0]['ministry_title'];
    $data['ministryDesc']=$readUsers[0]['ministry_desc'];
    $data['ministryDate']=$readUsers[0]['ministry_date'];
    

    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Ministry Details not found.";
  }

  echo json_encode($data);
}
?>