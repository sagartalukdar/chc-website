<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['ch_gallery_id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
 

  extract($_POST);

  
  $countUser = $crud->Count("children_gallery","`ch_g_id`='$ch_gallery_id'");
  if ($countUser>0) {

    $data = [
        'ch_g_title'=>$edit_title,  // edit_title  edit_desc  edit_date  ch_gallery_id
        'ch_g_desc'=>$edit_desc,
        'ch_g_date'=>$edit_date,
        'ch_g_keyword'=>$edit_keyword
        
        
      ];
  

// ministry_id	
// ministry_desc	
// ministry_title	
// ministry_date

    $updateUser = $crud->Update("children_gallery",$data,"`ch_g_id`='$ch_gallery_id'");
    if ($updateUser) {
      $data['successMessage'] = "Chilldren Gallery Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Chilldren Gallery.";
    }
  } else {
      $data['errorMessage'] = "Chilldren Gallery Not Found!";
  }
    
  echo json_encode($data);
}
?>