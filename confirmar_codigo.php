<?php
session_start();
require 'DBConnection.php'; // seu arquivo de conexão PDO
require __DIR__ . '/vendor/autoload.php';

$email = isset($_GET['email']) ? $_GET['email'] : '';

if (!$email) {
    echo "E-mail não fornecido.";
    exit;
}

// Passo 1: verificar se o código foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['codigo'])) {
        // Validar código
        $codigo = trim($_POST['codigo']);

        $sql = "SELECT codigo_reset, expira_reset FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch();
            $agora = date("Y-m-d H:i:s");

            if ($usuario['codigo_reset'] === $codigo && $usuario['expira_reset'] >= $agora) {
                // Código válido → mostrar formulário de nova senha
                $_SESSION['email_reset'] = $email;
                $_SESSION['codigo_valido'] = true;
                header("Location: redefinir_senha.php");
                exit;
            } else {
                $erro = "Código inválido ou expirado.";
            }
        } else {
            $erro = "Usuário não encontrado.";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Confirmar Código</title>
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
    <h2>Digite o Código 🔑</h2>
    <p>Um código foi enviado para <b><?php echo htmlspecialchars($email); ?></b></p>

    <form method="post">
        <input type="text" name="codigo" placeholder="Digite o código" required>
        <button type="submit">Confirmar Código</button>
    </form>

    <?php if(isset($erro)) { echo "<div class='msg'>$erro</div>"; } ?>
</div>
</body>
</html>
