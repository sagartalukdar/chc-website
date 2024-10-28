<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['detailsId'])) {  
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);
  
  
  $countUser = $crud->Count("hw_details","`hw_details_id`='$detailsId'");
  if ($countUser>0) {

    // Full texts
    // hw_details_id	
    // hw_details_title	
    // hw_details_desc	
    // hw_details_intro
    $data = [
        'hw_details_intro'=>$detailsIntro,
        'hw_details_title'=>$detailsTitle,
        'hw_details_desc'=>$detailsDesc
      
        // detailsIntro detailsTitle detailsDesc detailsId
      ];
  

    $updateUser = $crud->Update("hw_details",$data,"`hw_details_id`='$detailsId'");
    if ($updateUser) {
      $data['successMessage'] = "Worship Details Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Worship Details.";
    }
  } else {
      $data['errorMessage'] = "Worship Details Not Found!";
  }
    
  echo json_encode($data);
}
?>