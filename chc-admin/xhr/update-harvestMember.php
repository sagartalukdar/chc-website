<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['memberId'])) {   // memberId memberAbout memberRole memberPhone memberEmail memberName
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  
  $countUser = $crud->Count("harvest_worship_members","`member_id`='$memberId'");
  if ($countUser>0) {
 
    $data = [
        'member_name'=>$memberName,
        'member_email'=>$memberEmail,
        'member_phone'=>$memberPhone,
        'member_role'=>$memberRole,
        'member_about'=> $memberAbout
     
      ];
  
// Full texts
// member_id	
// member_name	
// member_email	
// member_phone	
// member_role	
// member_photo	
// member_about

    $updateUser = $crud->Update("harvest_worship_members",$data,"`member_id`='$memberId'");
    if ($updateUser) {
      $data['successMessage'] = "Harvest Member Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Harvest Member.";
    }
  } else {
      $data['errorMessage'] = "Harvest Member Not Found!";
  }
    
  echo json_encode($data);
}
?>