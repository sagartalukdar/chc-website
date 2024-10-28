<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['blogId'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  $countUser = $crud->Delete("blog","`blog_id`='$blogId'");
  if ($countUser) {
    $data['successMessage'] = "Blog Deleted Successfully";
  } else {
      $data['errorMessage'] = "Error Deleting Blog.";
  }
    
  echo json_encode($data);
}
?>