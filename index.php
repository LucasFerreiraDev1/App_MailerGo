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
        <form action="submit.php" method="post">
            <div class="form-box">
                <label for="email"><i class="fa-solid fa-share"></i> Para</label>
                <input type="email" name="destination" id="email">
            </div>
            <div class="form-box">
                <label for="subject"><i class="fa-solid fa-paperclip"></i> Assunto</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div class="form-box">
                <label for="message"><i class="fa-solid fa-envelope"></i> Mensagem</label>
                <textarea name="message" id="message"></textarea>
            </div>

            <?php if(isset($_GET['error']) && $_GET['error'] == 'empty_field') { ?>
                <p class="text-error">
                    <i class="fa-solid fa-circle-exclamation"></i> Preencha todos os campos para enviar o e-mail.
                </p>
            <?php } ?>

            <button type="submit" id="btn_submit"><i class="fa-solid fa-paper-plane"></i> Enviar Mensagem</button>
        </form>
    </main>
</body>
</html>