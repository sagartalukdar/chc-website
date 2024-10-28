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


	


if (isset($_POST['clubDetailsId'])) {
  $id = $_POST['clubDetailsId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("sports_club_details","`sports_club_id`='$id'");

//   ministry_id	
//   ministry_desc	
//   ministry_title	
//   ministry_date

  if ($readUsers) {
    $data['clubDetailsId']=$id;
    // $data['username']=$readUsers[0]['username'];
   
    $data['club_intro']=$readUsers[0]['sports_club_intro'];  
    $data['club_title']=$readUsers[0]['sports_club_title'];
    $data['club_desc']=$readUsers[0]['sports_club_desc'];
    

    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Club Details not found.";
  }

  echo json_encode($data);
}
?>