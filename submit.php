 <?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['sub'])){
        
        
     // =========================== PHP MAILER FOR  FORM TO SEND TO MAIL ==============================
        try{
        require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $phone = $_POST['phone'];
        $msg = $_POST['message'];


        $recipient = 'info@fascotexchange.com';

        $message = '<html><body>';
        $message .= '<p>subject: '.$subject.'</p>';
        $message .= "<p>name: ".$name."</p>";
        $message .= "<p>Phone: ".$phone."</p>";
        $message .= "<p>Email: ".$email."</p>";
        $message .= "<p>Message: ".$msg."</p>";
        $message .= "</body></html>";


        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3; //use this for debugging purpose
        $mail->isSMTP();

        $mail->SMTPSecure = 'ssl';

        $mail->SMTPAuth = true;

        $mail->Host = 'mail.fascotexchange.com';

        $mail->Port = 465;

        $mail->Username = 'contact@fascotexchange.com';

        $mail->Password = 'Fascot95833268';

        $mail->setFrom('contact@fascotexchange.com');

        $mail->addAddress($recipient);

        $mail->isHTML(true);

        $mail->Subject = "Mail From Fascot Website Contact Page";

       $mail->MsgHTML($message);

        if (!$mail->send()) {
           echo "Error occured. Try again.";
        } else {
            echo "OK";
            //header("Location: https://fascotexchange.com/");
        }
        }catch(Exception $ex){
            echo "Message Not sent";//$ex->getMessage();
        }
    }else{
        echo "Error occured. Try again.";
    }
}else{
    //Error occured
   echo "405 method not allowed";
}