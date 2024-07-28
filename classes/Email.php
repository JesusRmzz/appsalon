<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {   
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        //Crear objeto del mail
        $mail = new PHPMailer();        

        //Configurar SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['EMAIL_PORT'];

        // Configurar Contenido del  Email
        $mail->setFrom('admin@appsalon.com');
        $mail->addAddress('admin@appsalon.com', "appsalon.com");
        $mail->Subject = 'Confirma tu cuenta';

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        
        $contenido = "<html> <p>Confirma tu cuenta en: <a href='" . $_ENV['APP_URL'] .  "/confirmar-cuenta?token=" . $this->token .  "'>Confirmar Cuenta</a></p> </html>";
        $mail->Body = $contenido;

        if($mail->send()) {
            echo "Mensaje enviado correctamente";
        } else {
            echo "El mensaje no se pudo enviar";
        }
    }

    public function enviarInstrucciones() {
        //Crear objeto del mail
        $mail = new PHPMailer();        

        //Configurar SMTP
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['EMAIL_PORT'];

        // Configurar Contenido del  Email
        $mail->setFrom('admin@appsalon.com');
        $mail->addAddress('admin@appsalon.com', "appsalon.com");
        $mail->Subject = 'Reestablece tu password';

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        
        $contenido = "<html> <p>Confirma tu cuenta en: <a href='" . $_ENV['APP_URL'] .  "/recuperar?token=" . $this->token .  "'>Reestablecer Password</a></p> </html>";
        $mail->Body = $contenido;

        if($mail->send()) {
            echo "Mensaje enviado correctamente";
        } else {
            echo "El mensaje no se pudo enviar";
        }
    }
}