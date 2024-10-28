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
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);

//   gallery
//   gallery_id	
//   gallery_img	
//   img_desc	
//   img_title	
//   img_posted_user_id	
//   added_date	
//   added_time
  
  $countUser = $crud->Count("gallery","`gallery_id`='$galleryId'");
  if ($countUser>0) {
    
    $data = [
        'img_title'=>$imgTitle,
        'img_desc'=>$imgDescription,
        // 'sermonLink'=>$SermonLink,
        'img_posted_user_id'=>$_SESSION['this_user_id'],
        'added_date'=> $today,
        'added_time'=>$time
      ];
  

    $updateUser = $crud->Update("gallery",$data,"`gallery_id`='$galleryId'");
    if ($updateUser) {
      $data['successMessage'] = "Picture Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Picture.";
    }
  } else {
      $data['errorMessage'] = "Picture Not Found!";
  }
    
  echo json_encode($data);
}
?>