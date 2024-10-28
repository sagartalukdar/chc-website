<?php 
session_start();
if (isset($_SESSION['userType'])) {
  if ($_SESSION['userType']!="ADMIN") {
    $_SESSION['errorLogin'] = "Access Denied!";
    header('location: ../sign-in.php');
    exit();
  }
   
}
if (isset($_POST['cname'])) {
    include '../classes/Crud.php';
    $crud = new Crud();
    date_default_timezone_set("Asia/Kolkata");
    $today = date("Y-m-d");
    $time = date("H:i:s");
    extract($_POST);

    $countUser = $crud->Count("clients","`phone`='$phone' or `email`='$email'");
    
    if ($countUser>0) {
        $data['errorMessage']="Phone or Email Already Exists.";
        echo json_encode($data);
        exit();
    }else {
        $data = [
          'client_name'=>$cname,
          'company_name'=>$oname,
          'email'=>$email,
          'phone'=>$phone,
          'added_date'=>$today,
          'added_time'=>$time
        ];

        $create = $crud->Create($data,"clients");

        if($create) {
            $data['successMessage'] = "Client Created Successfully";

            // sEnd mail
            $to = $email; 
            $from = 'founder@smartbtr.com'; 
            $fromName = 'Willson Marandi'; 
             
            $subject = "Welcome to SmartBTR ".$cname; 
             
            $htmlContent = ' 
                <html> 
                <head> 
                    <title>Welcome to SmartBTR</title> 
                </head> 
                <body> 
                    <h4>Thank you for choosing smartBTR. </h4>
                    <p>On behalf of the entire SmartBTR Private Limited team, I am thrilled to extend a warm welcome to you!</p>

                    <p>We are honored that you have chosen SmartBTR as your partner for your upcoming project. Our team is excited about the opportunity to collaborate with you and bring your vision to life through innovative and tailor-made software solutions.</p>

                    <p>At SmartBTR, we pride ourselves on delivering high-quality, cutting-edge technology that exceeds our clients&#39; expectations. We understand the unique challenges and goals of your project, and we are committed to working closely with you to ensure its success.</p>

                    <p>As we embark on this journey together, our dedicated team of experts is ready to provide you with exceptional service, technical expertise, and a commitment to excellence. We believe in open communication and transparency throughout the entire project lifecycle, ensuring that you are informed and involved at every step.</p>

                    <p>If there are specific goals, requirements, or expectations you would like to discuss further, please do not hesitate to reach out. Your satisfaction is our top priority, and we are here to make your experience with SmartBTR a positive and rewarding one.</p>

                    <p>Once again, welcome to the SmartBTR family! We look forward to a successful collaboration and achieving great results together.</p>

                    <p>Best regards,</p>
                    <p>Willson Marandi,<br>Director,<br>SmartBTR Private Limited.</p>
                    <p></p>
                    
                </body> 
                </html>'; 
             
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
             
            // Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            $headers .= 'Cc: contact@smartbtr.com' . "\r\n"; 
            $headers .= 'Bcc: smartbtr5@gmail.com' . "\r\n"; 
             
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers)){ 
                $data['emailMessage']=' Client has been added and the email has been sent.'; 
            }else{ 
                $data['emailMessage']=' Could Not Send the email.'; 
            } 

        }else {
          $data['errorMessage'] = "Client Could Not Be Added!";
    }

}

  
  echo json_encode($data);
}
?>