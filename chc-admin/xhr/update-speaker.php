<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  $id = $_POST['id'];
  extract($_POST);

  
  $countUser = $crud->Count("event_spekers","`id`=$id");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'id'=>$id,
        'name'=>$name,
        'info'=>$info,
        'start_time'=>$start_time,
        'end_time'=> $end_time
      ];
  

    $updateSpeaker = $crud->Update("event_spekers",$data,"`id`=$id");
    if ($updateSpeaker) {
      $data['successMessage'] = "Speaker Details Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Speaker Details.";
    }
  } else {
      $data['errorMessage'] = "Speaker Details Not Found!";
  }
    
  echo json_encode($data);
}
?>