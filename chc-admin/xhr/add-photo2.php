







<?php 
session_start();

if (isset($_FILES['image'])) {

  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");
  extract($_POST);

    $target_dir = "images/gallery/";
    $f=false;

    foreach($_FILES['image']['name'] as $key=> $val){
        $file=$val;

        $target_file = $target_dir.md5(time()).basename($file);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else{
            $uploadOk = 0;
        } 

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
     
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          $data['errorMessage'] = "Something is not right with the file.";
        } else {
              if (move_uploaded_file($_FILES["image"]["tmp_name"],"../".$target_file)) {
                $data = [
                  'gallery_img'=>$target_file
                ];
        
                // gallery_img
                // img_desc
                // img_title
                // img_posted_user_id
                // added_date
                // added_time
        
                $create = $crud->Create($data,"gallery");
        
                if($create) {
                    $data['successMessage'] = "Photo Posted Successfully";
        
                   $f= true;  
                } 
              } else {
                $f=false;
                  $data['errorMessage'] = "Error Uploading File.";
              }
            } 
            
     }


    //  if($f){
    //     $data['successMessage'] = "Photo Posted Successfully";
        
    //  }else{
    //     $data['errorMessage'] = "Error Uploading File.";
    //  }

    $data['successMessage'] = "Photo Posted Successfully";
        
    

  echo json_encode($data);

}
?>
            
<!-- 
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
          'img_title'=>$photoTitle,
          'img_desc'=>$photoDesc,
          
          'gallery_img'=>$target_file,
          'img_posted_user_id'=>$_SESSION['this_user_id'],
          'added_date'=>$today,
          'added_time'=>$time
        ];

        // gallery_img
        // img_desc
        // img_title
        // img_posted_user_id
        // added_date
        // added_time

        $create = $crud->Create($data,"gallery");

        if($create) {
            $data['successMessage'] = "Photo Posted Successfully";

          
        } 
      } else {
          $data['errorMessage'] = "Error Uploading File.";
      }
    }


  
  echo json_encode($data); -->






      <!-- if(isset($_POST['submit'])){
        // echo "jks";
        // print_r($_FILES);

        $target_dir = "uploads/";
        foreach($_FILES['doc']['name'] as $key=> $val){
            $file=$val;

            $databasePath = $target_dir.$file;
         move_uploaded_file($_FILES['doc']['tmp_name'][$key],$databasePath);
         $query = "INSERT into multiple_files (multiple_files) VALUES ('$databasePath')";
         $data = mysqli_query($con,$query);

         if($data){
            echo "Files are uploaded";
         }else{
            "wrong";
         }
        }

       
        
      }
  -->
