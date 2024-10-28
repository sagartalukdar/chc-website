






<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['message'])) {

    date_default_timezone_set("Asia/Kolkata");
    $today = date("Y-m-d");
    extract($_POST);


           $to = 'smartbtrofficial@gmail.com';
            $from = $email;
            $subject = 'User Mail From The CHC Website.';
            // $message = "<h2>Mail Received!</h2>";
            $message .=" My Name is: ". $fname. "My Contact Details are as follows Email :". $email." and my message is :".$message. "<br>Please Consider me as a CHC website User";

            $header = "From:" . $email . " \r\n";
            $header .= "MIME-Version: 1.0 \r\n";
            $header .= "Content-type: text/html;charset=UTF-8 \r\n";

            $result = mail($to, $subject, $message, $header);

            if($result){
            
                // header("location: C:\xampp\htdocs\chc\chc-admin\xhr\contact-chc.php");
                $data['success'] = "The mail has been sent";
        
            } else {
                $data['error'] =  "The mail could not be sent";
                
                // header("location: join-trader.php");
            }
            echo json_encode($data);

        }
        ?>
