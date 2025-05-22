<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class Message {
        private $destination = null;
        private $subject = null;
        private $message = null;
        public $status = ['status_code' => null, 'description_status' => ''];

        public function __get($attr) {
            return $this->$attr;
        }
        public function __set($attr, $value) {
            $this->$attr = $value;
        }
        public function validateMessage() {
            if(empty($this->destination) || empty($this->subject) || empty($this->message)) {
                return false;
            }
            return true;
        }
    }
    $message = new Message();
    $message->__set('destination', $_POST['destination']);
    $message->__set('subject', $_POST['subject']);
    $message->__set('message', $_POST['message']);
    if(!$message->validateMessage()) {
        header('Location: index.php?error=empty_field');
        die();
    }
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'teste@email.com'; // e-mail
        $mail->Password = 'zxczxcvsdfweas'; // Password
        $mail->SMTPSecure = 'TLS'; // TLS/SSL
        $mail->Port = 587; // 587/465
        //Recipients
        $mail->setFrom('teste@email.com', 'MailerGo');
        $mail->addAddress($message->__get('destination'));
        /* ----------------------------------------------
        $mail->addAddress('ellen@example.com');
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
        ---------------------------------------------- */
        //Content
        $mail->isHTML(true);
        $mail->Subject = $message->__get('subject');
        $mail->Body = $message->__get('message');
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $message->status['status_code'] = 1;
        $message->status['description_status'] = 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        $message->status['status_code'] = 2;
        $message->status['description_status'] = 'Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <title>MailerGo</title>
</head>
<body>
    <main class="container">
        <header>
            <img src="./assets/MalierGo.png" alt="MailerGO" width="300px">
            <p>Seu app de envio de e-mails particular!</p>
        </header>
        <div class="status">
            <?php if($message->status['status_code'] == 1) { ?>

                <div class="box-status">
                    <h1 class="title-success"><i class="fa-solid fa-circle-check fa-beat"></i> Enviado com Sucesso!</h1>
                    <p><?= $message->status['description_status']; ?></p>
                    <a href="index.php" class="btn-back">Voltar</a>
                </div>
        
            <?php } else {?>

                <div class="box-status">
                    <h1 class="title-error"><i class="fa-solid fa-triangle-exclamation fa-beat"></i> Ops! Erro ao enviar o e-mail.</h1>
                    <p><?= $message->status['description_status']; ?></p>
                    <a href="index.php" class="btn-back">Voltar</a>
                </div>
                
            <?php } ?>
        </div>
    </main>
</body>
</html>