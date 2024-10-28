<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['sermon_id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("sermon","`sermon_id`='$sermon_id'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'sermon_name'=>$sermonName,
        'sermon_description'=>$SermonDescription,
        'sermonLink'=>$SermonLink,
        'sermon_sender_id'=>$_SESSION['this_user_id'],
        'added_date'=> $today,
        'added_time'=>$time
      ];
  

    $updateUser = $crud->Update("sermon",$data,"`sermon_id`='$sermon_id'");
    if ($updateUser) {
      $data['successMessage'] = "Sermon Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Sermon.";
    }
  } else {
      $data['errorMessage'] = "Sermon Not Found!";
  }
    
  echo json_encode($data);
}
?>