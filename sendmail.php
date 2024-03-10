<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('en', 'phpmailer/language/'); // підключаємо мову на якій будуть виводитись помилки якщо такі будуть
    $mail->IsHTML(true); // дозволяє писати html теги

    //От кото письма
    $mail->setFrom('email@gmail.com', 'Mozayk');
    // Кому отправить
    $mail->addAddress('studio.mozayk@gmail.com');
    // Тема письма
    $mail->Subject = 'Mozayk';

    // Тело письма
    $body = '<h1>Message!</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Full Name:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['tel']))){
        $body.='<p><strong>Phone:</strong> '.$_POST['tel'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }

    $mail->Body = $body;

    //Отправляем
    if(!$mail->send()){
        $message = 'Помилка';
    } else{
        $message = 'Дані відправлені!';
    }

    $response = ['message' => $message];

    header('Content-type: applacation/json');
    echo json_encode($response);
?>