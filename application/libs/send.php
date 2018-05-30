<?php
// Файлы phpmailer
require 'PHPMailer.php';
require 'SMTP.php';

// Переменные
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];

// Настройки
$mail = new \\PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'yourlogin'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'yourpass'; // Ваш пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('workdanilenko@gmail.com'); // Ваш Email
$mail->addAddress('danilenko_work@mail.ru'); // Email получателя


// Прикрепление файлов
 for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
 $filename = $_FILES['userfile']['name'][$ct];
 if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
        $mail->addAttachment($uploadfile, $filename);
    } else {
        $msg .= 'Failed to move file to ' . $uploadfile;
 }
 }

// Письмо
$mail->isHTML(true);
$mail->Subject = "Message Header"; // Заголовок письма
$mail->Body = "Name $name . Post $email”; // Hello!

// Результат
if(!$mail->send()) {
    echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'ok';
}
?>