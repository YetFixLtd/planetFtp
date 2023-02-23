<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ContactController extends Controller
{
    function index(){
        return view('front.master');
    }
    function send(Request $request){
        
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        // $data = ['content'=>'Anything'];
        // $message2 = view('front.includes.mailBody', $data)->render();

          
        require 'PHPMailer/vendor/autoload.php';
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;                                      
        $mail->isSMTP();                                          
        $mail->Host       = env('EMAIL_HOST');                        
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = env('EMAIL_USERNAME');                  
        $mail->Password   = env('EMAIL_PASSWORD');                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;
        $mail->setFrom($email, $name); 
        $mail->addAddress('info@rsnetbd.com');
        $mail->isHTML(true);  
        $mail->Subject =  $subject;
        $mail->Body    = "<h3>Name: $name <br> Email: $email
        <br> Subject: $subject <br> Message: <br> $message  
        <br><br><br> ********This e-mail was sent from a contact form on www.rsnetbd.com*******</h3>"; 
        $dt = $mail->send();
        if($dt){
            echo 'Message has been sent successfully';
            echo '<br>';
            echo '<a href="http://103.110.162.218/">Back to home</a>';
        } else{
            echo 'Something went wrong';
        }
     



    }
}
