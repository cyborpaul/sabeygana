<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require('sendgrid-php/sendgrid-php.php');

//use SendGrid\Mail\Mail;

$email = new \SendGrid\Mail\Mail();
$email->setFrom("ssabeygana.iq@gmail.com", "Sabe Y Gana");
$email->setSubject("Prueba de envio de correo en SABE Y GANA");

//$email->addTo("coarpaul2000@hotmail.com", "Inventalo");
$email->addTo("saravia.lelis95@gmail.com", "Lelis");
//$email->addTo("mastaly65@gmail.com", "Inventalo");
//$email->addTo("isaacocampoy16@gmail.com", "Inventalo");
//$email->addTo("isaacocampoy@hotmail.com", "Inventalo");
//$email->addTo("leowaldir2000@gmail.com", "Paul");

$email->addContent("text/plain", "Prueba de envio de correo en SABE Y GANA");
$email->addContent(
    "text/html", "<strong>Prueba de envio de correo en SABE Y GANA</strong>"
);

//API SABE Y GANA
//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

//API PAUL
//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
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    echo "<pre>";
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
    echo "</pre>";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}