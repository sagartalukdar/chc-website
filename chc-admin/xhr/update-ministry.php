<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['ministryId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("ministry_details","`ministry_id`='$ministryId'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'ministry_title'=>$ministryTitle,
        'ministry_desc'=>$ministryDesc,
        'ministry_date'=>$ministryDate
        
      ];
  

// ministry_id	
// ministry_desc	
// ministry_title	
// ministry_date

    $updateUser = $crud->Update("ministry_details",$data,"`ministry_id`='$ministryId'");
    if ($updateUser) {
      $data['successMessage'] = "Ministry Details Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Ministry Details.";
    }
  } else {
      $data['errorMessage'] = "Ministry Details Not Found!";
  }
    
  echo json_encode($data);
}
?>