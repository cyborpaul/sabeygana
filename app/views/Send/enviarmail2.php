<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require('sendgrid-php/sendgrid-php.php');


use SendGrid\Mail\From;
use SendGrid\Mail\HtmlContent;
use SendGrid\Mail\Mail;
use SendGrid\Mail\PlainTextContent;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;

$from = new From("ssabeygana.iq@gmail.com", "SABE Y GANA");
$subject = new Subject("Restablecimiento de contraseña");
$to = new To("leowaldir2000@gmail.com", "Paul");
$plainTextContent = new PlainTextContent(
    "Restablecimiento de contraseña."
);
$codigo=$_GET['codigo'];
$htmlContent = new HtmlContent(
    "<html>
    <head>
    <style type='text/css'>
    @font-face {
      font-family: 'Open Sans';
      font-style: normal;
      font-weight: 400;
      src: local('Open Sans'), local('OpenSans'), url(http://themes.googleusercontent.com/static/fonts/opensans/v6/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
    }
    body {
        color: #333;
        font-family: 'Open Sans', sans-serif;
        margin: 0px;
        font-size: 16px;
    }
    .pie {
        font-size:12px;
        color:#999797;
    }
    .centro {
        font-size:16px;
    }
    .centro a{
        text-decoration:none;
        color: #0487b8;
    }
    .centro a:hover{
        text-decoration: underline;
        color: #0487b8;
    }
    </style>
    </head>
    <body>
    <table width='593' height='324' border='0' align='center'>
        <tr>
            <td>
                <div style='background-color: purple; width: 100%;'>
                    <div style='width: 80%; height: 55px; padding: 10px; color: white;'>
                        <p><strong>SABE     Y    GANA</strong></p>
                    </div>    
                </div>
            </td>
    
        </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height='97' valign='top' class='centro'><h3>Sabe y gana código de recuperación de contraseña: 
        </h3>
       Para recuperar tu contraseña utiliza este PIN: </td>
      </tr>
      <tr>
        <td height='17' style='text-align:center;'><h2>". $codigo."</h2></td>
      </tr>
      <tr>
        <td height='27' class='pie'>Este email es una notificaci&oacute;n autom&aacute;tica</td>
      </tr>
    </table>
    </body>
    </html>"
);
$email = new Mail(
    $from,
    $to,
    $subject,
    $plainTextContent,
    $htmlContent
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}