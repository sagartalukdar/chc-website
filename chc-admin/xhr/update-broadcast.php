<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['broadcastId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("broadcast","`broadcast_id`='$broadcastId'");
  if ($countUser>0) {
 
    $data = [
        'broadcast_title'=>$broadcastTitle,
        'broadcast_description'=>$broadcastDescription,
        'broadcast_link'=>$broadcastLink,
        // 'broadcast_date'=>$broadcastDate
       
      ];
  

    $updateUser = $crud->Update("broadcast",$data,"`broadcast_id`='$broadcastId'");
    if ($updateUser) {
      $data['successMessage'] = "Broadcast Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating User.";
    }
  } else {
      $data['errorMessage'] = "Broadcast Not Found!";
  }
    
  echo json_encode($data);
}
?>