<?php
session_start();
require 'DBConnection.php'; // arquivo de conexão PDO

// Verificar se o código foi validado
if (!isset($_SESSION['email_reset']) || !isset($_SESSION['codigo_valido']) || $_SESSION['codigo_valido'] !== true) {
    header("Location: esqueci_senha.php");
    exit;
}

$email = $_SESSION['email_reset'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha1 = trim($_POST['senha1']);
    $senha2 = trim($_POST['senha2']);

    // Validar se as senhas coincidem
    if ($senha1 !== $senha2) {
        $erro = "As senhas não coincidem.";
    } elseif (strlen($senha1) < 6) {
        $erro = "A senha deve ter no mínimo 6 caracteres.";
    } else {
        // Atualizar senha no banco
        $hash = password_hash($senha1, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET senha = :senha, codigo_reset = NULL, expira_reset = NULL WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':senha', $hash);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Limpar sessão e redirecionar
        unset($_SESSION['email_reset']);
        unset($_SESSION['codigo_valido']);

        header("Location: login.php?status=senha_atualizada");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Redefinir Senha</title>
<style>
body { font-family: Arial; display:flex; justify-content:center; align-items:center; height:100vh; background:#f2f2f2; }
.card { background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); width:100%; max-width:400px; text-align:center; }
input { width:100%; padding:12px; margin:8px 0; border:1px solid #ccc; border-radius:8px; box-sizing:border-box; }
button { width:100%; padding:12px; margin-top:10px; background:#C6955D; border:none; border-radius:8px; color:white; font-weight:bold; cursor:pointer; }
button:hover { background:#a87745; }
.msg { margin-top:15px; color:red; }
</style>
</head>
<body>
<div class="card">
    <h2>Redefinir Senha 🔐</h2>
    <form method="post">
        <input type="password" name="senha1" placeholder="Nova senha" required>
        <input type="password" name="senha2" placeholder="Confirme a nova senha" required>
        <button type="submit">Atualizar Senha</button>
    </form>

    <?php if(isset($erro)) { echo "<div class='msg'>$erro</div>"; } ?>
</div>
</body>
</html>
