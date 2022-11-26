<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        // $mail->Host = 'smtp.mailtrap.io';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // $mail->Port = 2525;
        // $mail->Port = 465;
        $mail->Port = 587;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];
        // $mail->SMTPSecure = 'tls'; /* transport leyend security, ya no se usa ssl (secury socket player) */
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; /* transport leyend security, ya no se usa ssl (secury socket player) */

        $mail->setFrom('cuentas@alitaslegendarias.com'); 
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<div align="center"><h1 style="color: #e93b45">Confirma tu cuenta en Alitas Legendarias</h1></div>';
        $contenido .= '<br>';
        $contenido .= '<p>Hola <b>' . $this->nombre . '</b> has creado tu cuenta en Alitas Legendarias, solo debes confirmarla en el siguiente enlace</p>';
        $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/confirmar?token=' . $this->token . '">Confirmar Cuenta</a></p>';
        // $contenido .= '<p>Presiona aquí: <a href="https://damp-everglades-80146.herokuapp.com/confirmar?token=' . $this->token . '">Confirmar Cuenta</a></p>';
        $contenido .= '<br>';
        $contenido .= '<p>Si tú no creaste esta cuenta, ignora este mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        /* Por si no acepta diseño HTML */
        $mail->AltBody = 'Hola ' . $this->nombre . ' has creado tu cuenta en Alitas Legendarias, sigue el siguiente enlace para confirmar tu cuenta http://localhost:3000/confirmar?token=' . $this->token . ''; 

        /* Enviar Email */
        $mail->send();
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        // $mail->Host = 'smtp.mailtrap.io';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // $mail->Port = 2525;
        $mail->Port = 587;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];
        // $mail->SMTPSecure = 'tls'; /* transport leyend security, ya no se usa ssl (secury socket player) */
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->setFrom('cuentas@alitaslegendarias.com'); 
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablece tu password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<div align="center"><h1 style="color: #e93b45">Reestablece el password de tu cuenta en Alitas Legendarias</h1></div>';
        $contenido .= '<br>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
        // $contenido .= "<p>Presiona aquí: <a href='https://damp-everglades-80146.herokuapp.com/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .= '<br>';
        $contenido .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->AltBody = 'Hola ' . $this->nombre . ' has solicitado cambiar tu password en Alitas Legendarias, sigue el siguiente enlace para confirmar tu cuenta http://localhost:3000/reestablecer?token=' . $this->token . ''; 

        /* Enviar el email */
        $mail->send();
    }
}
