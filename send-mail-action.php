<?php


require_once 'vendor/autoload.php';
include 'send-mail.php';
if (isset($_POST['title'])) {
    if (isset($_POST['content'])) {
        if (isset($_POST['submit'])) {

            $title = $_POST["title"];
            $content = $_POST["content"];
            $submit = $_POST["submit"];

            $transport = (new Swift_SmtpTransport('smtp.mailgun.org', 587))
                ->setUsername('postmaster@sandbox0bf6c57f45474365b44cb7f0217a7690.mailgun.org')
                ->setPassword('c58d10239c58d31c8db2eba4bdef4347');


            $mailer = new Swift_Mailer($transport);


            $message = (new Swift_Message("$title"))
                ->setFrom(['krzysztofdyrygent@orkiestra.com' => 'Krzysztof Dyrygent'])
                ->setTo(['grzegorz0kedzierski@gmail.com' => 'Grzegorz Kędzierski'])
                ->setBody("$content");


            $result = $mailer->send($message);

            if (isset ($result)) {
                echo "Wiadomość wysłana!";
            }


        }
    }
}

