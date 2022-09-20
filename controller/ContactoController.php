<?php
class ContactoController
{
    // método por defecto (config.php)
    public function index()
    {
        //carga la vista de portada
        include '../views/contacto.php';
    }

    public function send()
    {
        if (empty($_POST['enviar']))
            throw new Exception('No se recibió el formulario de contacto.');

        $to = CONTACT_EMAIL;
        $from = $_POST['email'];
        $name = $_POST['nombre'];
        $subject = $_POST['asunto'];
        $message = $_POST['mensaje'];

        // TODO: Configure SMTP in the server!
        /*
        $mail = new Email($to, $from, $name, $subject, $message);
        if (!$mail->enviar())
            throw new Exception('No se pudo enviar el email de contacto');
        */

        $mensaje = 'Mensaje enviado, en breve recibirás una respuesta';
        include '../views/exito.php';
    }
}