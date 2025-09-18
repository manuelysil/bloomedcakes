<?php
session_start();
require 'DBConnection.php'; // conexão PDO ao banco
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // 1. Verificar se o e-mail existe no banco
    $sql = "SELECT id_usuario FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // 2. Gerar código e data de expiração
        $codigo = rand(100000, 999999); // ex: 348192
        $expira = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        // 3. Salvar no banco
        $sql = "UPDATE usuarios 
                   SET codigo_reset = :codigo, expira_reset = :expira 
                 WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':expira', $expira);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // 4. Enviar o e-mail
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hercodeweb@gmail.com';       // seu Gmail
            $mail->Password   = 'izgt vlzy yrpq gtat';              // senha de app gerada no Google
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('SEU_EMAIL@gmail.com', 'Suporte do Sistema');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body    = "
                <h3>Recuperação de Senha</h3>
                <p>Seu código de recuperação é: <b>$codigo</b></p>
                <p>Esse código é válido até <b>$expira</b>.</p>
            ";

            $mail->send();

            // 5. Redirecionar com mensagem de sucesso
            header("Location: confirmar_codigo.php?email=" . urlencode($email));
exit;

        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        // e-mail não encontrado
        header("Location: confirmar_codigo.php?email=" . urlencode($email));
        exit;
    }
}
