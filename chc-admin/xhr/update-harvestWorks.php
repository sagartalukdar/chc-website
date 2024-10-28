


<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['songId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

  
  $countUser = $crud->Count("harvest_songs","`song_id`='$songId'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'song_name'=>$songName,
        'song_desc'=>$songDescription,
        'song_link'=>$songLink,
        'artist_name'=> $songArtist
        
      ];
  
      
        // Full texts
        // song_id
        // song_name
        // song_desc
        // artist_name
        // song_link
        // song_img

    $updateUser = $crud->Update("harvest_songs",$data,"`song_id`='$songId'");     
    if ($updateUser) {
      $data['successMessage'] = "Song Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Song.";
    }
  } else {
      $data['errorMessage'] = "Song Not Found!";
  }
    
  echo json_encode($data);
}
?>