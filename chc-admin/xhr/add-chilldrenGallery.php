<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['ch_gallery_title'])) {
  include '../classes/Crud.php';  
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
//   $today = date("Y-m-d");
//   $time = date("H:i:s");
  extract($_POST);
//   $displayPass = $password;
//   $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
//   $password = hash('sha512', $password . $salt);

//   $countUser = $crud->Count("users","`username`='$username' OR `email`='$email'");
//   if ($countUser>0) {
//     $data['errorMessage']="Username or Email Already Exists.";
//     echo json_encode($data);
//     exit();
//   } else {
    $target_dir = "images/chilldrenGallery/";
    $target_file = $target_dir.md5(time()).basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else{
        $uploadOk = 0;
    } 
        // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
     
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $data['errorMessage'] = "Something is not right with the file.";
    } else {

      if (move_uploaded_file($_FILES["image"]["tmp_name"],"../".$target_file)) {
        $data = [
          'ch_g_title'=>$ch_gallery_title,  // ch_gallery_title ch_gallery_desc  ch_gallery_date
          'ch_g_desc'=>$ch_gallery_desc,
          'ch_g_date'=>$ch_gallery_date,
          'ch_g_img'=>$target_file,
          'ch_g_keyword'=>$photoKeyword
          
         
        ];

        
            // Full texts
            // ch_g_id	
            // ch_g_img	
            // ch_g_title	
            // ch_g_desc	
            // ch_g_date

        $create = $crud->Create($data,"children_gallery");

        if($create) {
            $data['successMessage'] = "Chilldren Gallery Added Successfully";

            // // sEnd mail
            // $to = $email; 
            // $from = 'founder@smartbtr.com'; 
            // $fromName = 'Willson Marandi'; 
             
            // $subject = "Welcome to SmartBTR Core Team"; 
             
            // $htmlContent = ' 
            //     <html> 
            //     <head> 
            //         <title>Welcome to SmartBTR</title> 
            //     </head> 
            //     <body> 
            //         <h4>You have been requested to manage the Admin Panel!</h4> 
            //         <p>Please use the following information to log in...</p>
            //         <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            //             <tr> 
            //                 <th>Username:</th><td>'.$username.'</td> 
            //             </tr> 
            //             <tr> 
            //                 <th>Email:</th><td>'.$email.'</td> 
            //             </tr> 
            //             <tr> 
            //                 <th>Password:</th><td>'.$displayPass.'</td> 
            //             </tr> 
                         
            //             <tr> 
            //                 <th>Website:</th><td><a href="https://www.smartbtr.com/admin">SmartBTR Private Limited</a></td> 
            //             </tr> 
            //         </table> 
            //     </body> 
            //     </html>'; 
             
            // // Set content-type header for sending HTML email 
            // $headers = "MIME-Version: 1.0" . "\r\n"; 
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
             
            // // Additional headers 
            // $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            // $headers .= 'Cc: contact@smartbtr.com' . "\r\n"; 
            // $headers .= 'Bcc: smartbtr5@gmail.com' . "\r\n"; 
             
            // // Send email 
            // if(mail($to, $subject, $htmlContent, $headers)){ 
            //     $data['emailMessage']=' Your Credentials Have Been Sent Through Email.'; 
            // }else{ 
            //     $data['emailMessage']=' We Could Not Send the email. Please Login Using the credentials you used.'; 
               
            // }
        } 
      } else {
          $data['errorMessage'] = "Error Uploading File.";
      }
    }
//   }

  
  echo json_encode($data);
}
?>