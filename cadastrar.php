<?php
require_once "DBConnection.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $telefone = trim($_POST["telefone"]);

    if ($nome && $email && $senha) {
        // Verifica se já existe esse email
        $check = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $check->bindParam(":email", $email);
        $check->execute();

        if ($check->rowCount() > 0) {
            $mensagem = "❌ Já existe uma conta com esse email.";
        } else {
            // Criptografar senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha, telefone) 
                    VALUES (:nome, :email, :senha, :telefone)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senhaHash);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->execute();

            $mensagem = "✅ Cadastro realizado com sucesso! Agora você pode fazer login.";
        }
    } else {
        $mensagem = "❌ Preencha todos os campos obrigatórios.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar - Pedidos de Bolo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    h2 {
      color: #C6955D;
      margin-bottom: 20px;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      background: linear-gradient(to right, #C6955D, #a87745);
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: linear-gradient(to right, #a87745, #C6955D);
    }
    .msg {
      margin-top: 15px;
      font-size: 14px;
      color: #333;
    }
    .links {
      margin-top: 20px;
    }
    .links a {
      text-decoration: none;
      font-size: 14px;
      color: #6199B5;
    }
    .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Crie sua conta 🍰</h2>

    <form method="post" action="">
      <input type="text" name="nome" placeholder="Seu nome" required>
      <input type="email" name="email" placeholder="Seu email" required>
      <input type="password" name="senha" placeholder="Crie uma senha" required>
      <input type="text" name="telefone" placeholder="Seu WhatsApp (opcional)">
      <button type="submit">Cadastrar</button>
    </form>

    <?php if ($mensagem): ?>
      <div class="msg"><?= $mensagem ?></div>
    <?php endif; ?>

    <div class="links">
      <a href="login.php">Já tem conta? Faça login</a>
    </div>
  </div>

</body>
</html>
