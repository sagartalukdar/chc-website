<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['edit_usher_id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("usher_details","`usher_id`='$edit_usher_id'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'usher_name'=>$edit_uname,
        'usher_email'=>$edit_uemail,
        'usher_phone'=>$edit_uphone,
      ];
  

    $updateUser = $crud->Update("usher_details",$data,"`usher_id`='$edit_usher_id'");
    if ($updateUser) {
      $data['successMessage'] = "Usher Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Usher.";
    }
  } else {
      $data['errorMessage'] = "Usher Not Found!";
  }
    
  echo json_encode($data);
}
?>