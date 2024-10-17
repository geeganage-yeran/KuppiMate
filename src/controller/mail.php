<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';
require __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST['email']) || isset($_SESSION['email'])) {

    $user=new User();
    $email = $_POST['email'];

    if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
    }

    if($user->verifyUser(Dbconnector::getConnection(),$email)){
        header("Location: /KuppiMate/src/view/recovery_password.php?id=101");
        exit();
    }else{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $_SESSION['email'] = $email;
            $otp = rand(10000, 99999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_time'] = time(); // Store current time
    
            $mail = new PHPMailer(true);
    
            try {
                // Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                    
                $mail->isSMTP();                          
                $mail->Host       = 'smtp.gmail.com';  
                $mail->SMTPAuth   = true;               
                $mail->Username   = 'kuppimate@gmail.com'; 
                $mail->Password   = 'naoi ouog tqkw jgkr';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                // Recipients
                $mail->setFrom('kuppimate@gmail.com', 'KuppiMate');
                $mail->addAddress($email);
    
                // Content
                $mail->isHTML(true);                            
                $mail->Subject = 'Verification OTP KuppiMate';
                $mail->Body = '
                        <html>
                        <head>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    background-color: #f4f4f4;
                                    margin: 0;
                                    padding: 20px;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: auto;
                                    background: white;
                                    padding: 20px;
                                    border-radius: 8px;
                                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                                }
                                .header {
                                    text-align: center;
                                    background-color: #007bff;
                                    color: white;
                                    padding: 20px;
                                    border-radius: 8px 8px 0 0;
                                }
                                .otp {
                                    font-size: 2em;
                                    color: #333;
                                    text-align: center;
                                    margin: 20px 0;
                                    padding: 10px;
                                    border: 2px solid #007bff;
                                    border-radius: 5px;
                                    display: inline-block;
                                }
                                .footer {
                                    text-align: center;
                                    margin-top: 20px;
                                    font-size: 0.9em;
                                    color: #666;
                                }
                                .footer p{
                                    font-size:15px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <div class="header">
                                    <h1>Your Verification Code</h1>
                                </div>
                                <div class="otp">' . $otp . '</div>
                                <div class="footer">
                                    <p>This code will expire in 2 minute.</p>
                                </div>
                            </div>
                        </body>
                        </html>
                        ';
    
                if($mail->send()){
                    header("Location: /KuppiMate/src/view/otp.php?id=102");
                    exit();  
                }else{
                    header("Location: /KuppiMate/src/view/otp.php?id=103");
                    exit(); 
                }
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    
        }
    }  
}

