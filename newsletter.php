
<?php

include 'chc-admin/classes/Crud.php';
$crud = new Crud();




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    extract($_POST);

    $data['email']=$email;

    $checkEmail = $crud->Read("subscribers", "`email`='$email'");
    if(!$checkEmail){

    
        $create = $crud->Create($data, "subscribers");
    if($create){



        $to      = $email;
        $subject = 'Mail From The Website.';
        $message = 'Greetings CITY HERVEST CHURCH';
        $message.=$email. "join the church letter .";
            $headers = 'From: contactCHC@gmail.com'       . "\r\n" .
                         'Reply-To: contactCHC@gmail.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
        
             ini_set('max_execution_time', 600); ini_set('memory_limit','1024M');            
            if(mail($to, $subject, $message, $headers)){
                $data['successMessage'] ="Subscribe mail sent.";
            } else {     
                $data['errorMessage'] ="Subscribe mail not sent.";
            }

    
    }else{
        
        $data['errorMessage'] ="Subscription creation error.";

    }

    } else {     
        $data['alreadySubscribed'] ="You are already subscribed us";
    }

    

}









    echo json_encode($data);

?>

