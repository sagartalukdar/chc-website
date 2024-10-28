<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['aboutId'])) {         
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");

  extract($_POST);


//   about_id
//   about_intro
//   about_title
//   about_desc
//   about_img
  
  $countUser = $crud->Count("about","`about_id`='$aboutId'");
  if ($countUser>0) {
    $currDate = date('d/m/y'); 
    $currTime = time();  
    $data = [
        'about_intro'=>$aboutIntro,
        'about_title'=>$aboutTitle,
       
        'about_desc'=> $aboutDesc,
        'about_link'=> $aboutLink
        
     
      ];
  

    $updateUser = $crud->Update("about",$data,"`about_id`='$aboutId'");
    if ($updateUser) {
      $data['successMessage'] = "About Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating About.";
    }
  } else {
      $data['errorMessage'] = "About Not Found!";
  }
    
  echo json_encode($data);
}
?>