<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['bannerId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("banner","`banner_id`='$bannerId'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'banner_title'=>$bannerTitle,
        'banner_desc'=>$bannerDescription,
       
        'added_date'=> $today,
        'added_time'=>$time
      ];
  

    $updateUser = $crud->Update("banner",$data,"`banner_id`='$bannerId'");
    if ($updateUser) {
      $data['successMessage'] = "Banner Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Banner.";
    }
  } else {
      $data['errorMessage'] = "Banner Not Found!";
  }
    
  echo json_encode($data);
}
?>