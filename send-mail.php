<?php


require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mailgun.org', 587))
    ->setUsername('postmaster@sandbox0bf6c57f45474365b44cb7f0217a7690.mailgun.org')
    ->setPassword('c58d10239c58d31c8db2eba4bdef4347')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Powiadomienie orkiestrowe!'))
    ->setFrom(['krzysztofdyrygent@orkiestra.com' => 'Krzysztof Dyrygent'])
    ->setTo(['grzegorz0kedzierski@gmail.com'=> 'Grzegorz Kędzierski'])
    ->setBody('Dodatkowa próba w czwartek o 19!')
;

// Send the message
$result = $mailer->send($message);