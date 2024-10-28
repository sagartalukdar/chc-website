<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['edit_blog_id'])) {
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");


  extract($_POST);

  
  $countUser = $crud->Count("blog","`blog_id`='$edit_blog_id'");
  if ($countUser>0) {
  
    $data = [
        'blog_title'=>$edit_btitle,  // blogTitle blogDescription blogCategory blogId
        'blog_desc'=>$edit_bdesc,
        'blog_category'=>$edit_bcategory,
        'blog_posted_uid'=>$_SESSION['this_user_id'],
        'blog_id'=> $edit_blog_id
      ];
  // blog_id
// blog_title
// blog_desc
// blog_date
// blog_img
// blog_category
// bolg_posted_uid

    $updateUser = $crud->Update("blog",$data,"`blog_id`='$edit_blog_id'");
    if ($updateUser) {
      $data['successMessage'] = "Blog Updated Successfully";
    } else {
      $data['errorMessage'] = "Error Updating Blog.";
    }
  } else {
      $data['errorMessage'] = "Blog Not Found!";
  }
    
  echo json_encode($data);
}
?>