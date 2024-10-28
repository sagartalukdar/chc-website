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


	


if (isset($_POST['worksId'])) {
  $id = $_POST['worksId'];
  include '../classes/Crud.php';
  $crud = new Crud();
  $readUsers =$crud->Read("harvest_songs","`song_id`='$id'");

  
// Full texts
// song_id
// song_name
// song_desc
// artist_name
// song_link
// song_img

  if ($readUsers) {
    $data['worksId']=$id;
    // $data['username']=$readUsers[0]['username'];
    $data['songName']=$readUsers[0]['song_name']; 
    $data['songDescription']=$readUsers[0]['song_desc'];
    $data['songLink']=$readUsers[0]['song_link'];
    $data['songArtist']=$readUsers[0]['artist_name'];
    // $data['added-date']=$readUsers[0]['added_date'];
    // $data['added-time']=$readUsers[0]['added_time'];
    // $data['user_type']=$readUsers[0]['user_type'];
    // $data['user_image']=$readUsers[0]['user_image'];
    // $data['status']=$readUsers[0]['status'];

  } else {
    $data['errorMessage']="Song not found.";
  }

  echo json_encode($data);
}
?>