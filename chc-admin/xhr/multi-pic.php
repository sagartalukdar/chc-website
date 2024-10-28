
<?php

  session_start();

  include '../classes/Crud.php';
  $crud = new Crud();
  date_default_timezone_set("Asia/Kolkata");
  $today = date("Y-m-d");
  $time = date("H:i:s");
  extract($_POST);
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    
    // Handle file uploads
    $uploadedFiles = [];
    $errors = [];
    $create=[];
    
    if(isset($_FILES['images'])){
        $total = count($_FILES['images']['name']);
        
        for($i=0; $i < $total; $i++) {
            $fileName = $_FILES['images']['name'][$i];
            $fileTmpName = $_FILES['images']['tmp_name'][$i];
            $fileSize = $_FILES['images']['size'][$i];
            $fileError = $_FILES['images']['error'][$i];
            
            // Handle file upload logic here, for example:
            $fileDestination = "images/gallery/" . $fileName;
            
            if(move_uploaded_file($fileTmpName,'../'. $fileDestination)){
                $uploadedFiles[] = $fileName;

                $data = [
                    'img_title'=>$title,
                    'img_desc'=>$desc,
                    
                    'gallery_img'=>$fileDestination,
                    'img_posted_user_id'=>$_SESSION['this_user_id'],
                    'added_date'=>$today,
                    'added_time'=>$time
                ];
                $create[] = $crud->Create($data,"gallery");
                
            } else {
                $errors[] = "Failed to upload $fileName";
            }
        }
    }
    
    // Check if files were uploaded successfully
    if(!empty($uploadedFiles) && !empty($create) && empty($errors)) {
        // Process the uploaded files and other data
        // For example, save data to database
        
        // Assume processing was successful
        $data['successMessage'] = "images Added Successfully";
    } else {
        // Handle errors
        $data['errorMessage'] = "Error uploading images.";
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($data);
    
} else {
    // Handle invalid request method
    $data['errorMessage'] = "Something went wrong.";
}

?>
