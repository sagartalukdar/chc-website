<?php 
session_start();
// if (isset($_SESSION['userType'])) {
//   if ($_SESSION['userType']!="ADMIN") {
//     $_SESSION['errorLogin'] = "Access Denied!";
//     header('location: ../sign-in.php');
//     exit();
//   }
   
// }
if (isset($_POST['speakerName']) && $_POST['eveId'])  { 
  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");
  extract($_POST);



  $target_file = "";
    if (!empty($_FILES["image"]["tmp_name"])) {
        if ($_FILES["image"]["error"] != 0) {
            echo json_encode(['status' => 'error', 'message' => 'Error uploading experience file']);
            exit;
        }

      
       $target_dir = "images/speakers/";
        $target_file =  $target_dir.md5(time()).basename($_FILES["image"]["name"]);
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
                'name'=>$speakerName,
                'info'=>$spekerInfo,
               
                'img'=>$target_file,
                
                'start_time'=>$startTime,
                'end_time'=>$endTime,
                'events_id'=>$eveId
              ];
              // id	name	info	start_time	end_time	img	
              $create = $crud->Create($data,"event_spekers");
      
              if($create) {
                  $data['successMessage'] = "Speaker Added Successfully";
      
               
              } 
            } else {
                $data['errorMessage'] = "Error Uploading File.";
            }
            
          }

         
       
    } else {

      $data = [          
        'name'=>$speakerName,
        'info'=>$spekerInfo,
       
        'img'=>$target_file,
        
        'start_time'=>$startTime,
        'end_time'=>$endTime,
        'events_id'=>$eveId
      ];
      // id	name	info	start_time	end_time	img	
      $create = $crud->Create($data,"event_spekers");

      if($create) {
          $data['successMessage'] = "Speaker Added Successfully";

       
      } 

    }

    echo json_encode($data);



    // $target_dir = "images/speakers/";
    // $target_file = $target_dir.md5(time()).basename($_FILES["image"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // $check = getimagesize($_FILES["image"]["tmp_name"]);
    // if($check !== false) {
    //     $uploadOk = 1;
    // } else{
    //     $uploadOk = 0;
    // } 
    //     // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
     
    //     $uploadOk = 0;
    // }

    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //   $data['errorMessage'] = "Something is not right with the file.";
    // } else {


    //   if (move_uploaded_file($_FILES["image"]["tmp_name"],"../".$target_file)) {
    //     $data = [          
    //       'name'=>$speakerName,
    //       'info'=>$spekerInfo,
         
    //       'img'=>$target_file,
          
    //       'start_time'=>$startTime,
    //       'end_time'=>$endTime,
    //       'events_id'=>$eveId
    //     ];
    //     // id	name	info	start_time	end_time	img	
    //     $create = $crud->Create($data,"event_spekers");

    //     if($create) {
    //         $data['successMessage'] = "Speaker Added Successfully";

         
    //     } 
    //   } else {
    //       $data['errorMessage'] = "Error Uploading File.";
    //   }
    // }

}
?>