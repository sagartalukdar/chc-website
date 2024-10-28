<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['detailsId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  
  $countUser = $crud->Count("sports_club_details","`sports_club_id`='$detailsId'");
  if ($countUser>0) {

    $data = [
        'sports_club_intro'=>$deatilsIntro,  
        'sports_club_title'=>$detailsTitle,
        'sports_club_desc'=>$detailsDescription
        
      ];
  

    //   Full texts
    //   sports_club_id
    //   sports_club_intro
    //   sports_club_title
    //   sports_club_desc

    $updateUser = $crud->Update("sports_club_details",$data,"`sports_club_id`='$detailsId'");
    if ($updateUser) {
      $data['successMessage'] = "Club Details Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Club Details.";
    }
  } else {
      $data['errorMessage'] = "Club Details Not Found!";
  }
    
  echo json_encode($data);
}
?>