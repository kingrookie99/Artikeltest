<?

require_once '../classes/c_simpleMail.php';

echo '<h1>Mail-Tests</h1>';
/* @var SimpleMail $mail */
$mail = new SimpleMail();
$mail->setTo('duetschke@cyclos-design.de', 'Recipient 1')
     ->setTo('goecking@cyclos-design.de', 'Recipient 2')
     ->setSubject('Test Message')
     ->setFrom('duetschke@cyclos-design.de', 'Mail Bot')
     ->addMailHeader('Reply-To', 'duetschke@cyclos-design.de', 'Mail Bot')
     ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
     ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
     ->setMessage('<strong>This is a test message.</strong>')
     ->setWrap(78);
$send = $mail->send();
//echo $mail->debug();
if ($send) {
    echo 'Email was sent successfully!';
} else {
    echo 'An error occurred. We could not send email';
}
