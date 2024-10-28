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


	


if (isset($_POST['speakerId'])) {
  $spid = $_POST['speakerId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readSpeaker =$crud->Read("event_spekers","`id`='$spid'");



  if ($readSpeaker) {
    $data['spid']=$spid;
    // $data['username']=$readUsers[0]['username'];
    $data['name']=$readSpeaker[0]['name'];
    $data['info']=$readSpeaker[0]['info'];
    $data['startTime']=$readSpeaker[0]['start_time'];
    $data['endTime']=$readSpeaker[0]['end_time'];
   


  } else {
    $data['errorMessage']="Speaker not found.";
  }

  echo json_encode($data);
}
?>