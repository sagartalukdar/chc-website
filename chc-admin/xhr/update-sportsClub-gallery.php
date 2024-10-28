<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['galleryId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  
  $countUser = $crud->Count("sports_club_gallery","`club_gallery_id`='$galleryId'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [     
        'club_gallery_title'=>$galleryName,
        'club_gallery_about'=>$galleryAbout
        
      ];
  

    $updateUser = $crud->Update("sports_club_gallery",$data,"`club_gallery_id`='$galleryId'");
    if ($updateUser) {
      $data['successMessage'] = " Club Gallery Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Club Gallery.";
    }
  } else {
      $data['errorMessage'] = " Club Gallery Not Found!";
  }
    
  echo json_encode($data);
}
?>