
<?php
session_start();
require_once "DBConnection.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $login = $_POST["login"] ?? "";
$senha = $_POST["senha"] ?? "";}


    $sql = "SELECT id_usuario, nome, senha, telefone 
        FROM usuarios 
        WHERE email = :login OR telefone = :login 
        LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":login", $login);
$stmt->execute();


   if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se você estiver usando password_hash no cadastro:
    if (password_verify($senha, $usuario["senha"])) {
        $_SESSION["usuario_id"] = $usuario["id_usuario"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        $_SESSION["usuario_telefone"] = $usuario["telefone"];
        header("Location: orcamento.php");
        exit;
    } else {
        $mensagem = "❌ Senha incorreta.";
    }
} else {
    $mensagem = "❌ Usuário não encontrado.";
}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Pedidos de Bolo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    /* ---------- HEADER ---------- */
    header {
      background-color: white;
      padding: 40px;
      text-align: center;
      color: #6199B5;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    header h1 {
      font-size: 4em;
      margin: 0;
      font-family: 'Brush Script MT', 'Brush Script Std', cursive;
    }
    header p {
      font-size: 1.2em;
      font-weight: bold;
    }

    /* ---------- NAV ---------- */
    nav {
      background-color: #C6955D;
      overflow: hidden;
    }
    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }
    nav a {
      color: #e9e0d5ff;
      padding: 10px 15px;
      text-align: center;
      display: inline-block;
      text-decoration: none;
      font-size: 1.1em;
    }
    nav a:hover {
      background-color: #a87745;
      color: white;
    }

    /* ---------- CONTEÚDO LOGIN ---------- */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 200px); /* ocupa a tela menos o header/nav */
      padding: 20px;
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
      display: flex;
      justify-content: space-between;
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

  <!-- HEADER -->
  <header>
    <h1>Bloomed Cakes</h1>
    <p>Delícias Artesanais - Onde o sabor encontra a elegância</p>
  </header>

  <!-- NAV -->
  <nav>
    <ul>
      <li><a href="index.php">Início</a></li>
      <li><a href="produtos.php">Nossos Produtos</a></li>
      <li><a href="logout.php">Sair</a></li>
    </ul>
  </nav>

  <!-- LOGIN BOX -->
  <div class="container">
    <div class="card">
      <h2>Pedidos de Bolo 🍰</h2>
      <p>Faça login para acessar sua conta</p>

      <form method="post" action="">
        <input type="text" name="login" placeholder="Email ou telefone" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
      </form>

      <?php if (isset($mensagem) && $mensagem): ?>
        <div class="msg"><?= $mensagem ?></div>
      <?php endif; ?>

      <div class="links">
        <a href="cadastrar.php">Cadastrar</a>
        <a href="esqueciasenha.php">Esqueci a senha</a>
      </div>
    </div>
  </div>

</body>
</html>