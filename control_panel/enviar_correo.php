<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (empty($_POST['email']) && empty($_POST['mensaje_correo'])) {

        echo json_encode('vacio');

    } else {

        $destino= $_POST['email'];
        $mensaje = $_POST["mensaje_correo"];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                     //Enable verbose debug output
            $mail->isSMTP();                                           //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'integradora.jrl@gmail.com';             //SMTP username
            $mail->Password   = 'JRL.integradora1';                      //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('integradora.jrl@gmail.com', 'Alarmas - OPSS');
            $mail->addAddress("$destino", "Cliente");     //Add a recipient

            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Respuesta';
            $mail->Body    = "$mensaje";

            $mail->send();

            echo json_encode('correcto');

        } catch (Exception $e) {
            
            echo json_encode('error');
            
        }
    
    }
    
?>