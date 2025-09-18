<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Esqueci minha senha</title>
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
  p {
    color: #333;
    margin-bottom: 20px;
  }
  input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
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

<div class="card">
  <h2>Recuperar Senha 🔑</h2>
  <p>Digite seu e-mail para receber o código de recuperação.</p>

  <form method="post" action="recuperar_senha.php">
    <input type="email" name="email" placeholder="Digite seu e-mail" required>
    <button type="submit">Enviar Código</button>
  </form>

  <div class="msg">
    <!-- Mensagem de sucesso ou erro aparecerá aqui -->
  </div>

  <div class="links">
    <a href="login.php">Voltar ao login</a>
    <a href="cadastrar.php">Cadastrar</a>
  </div>
</div>

</body>
</html>
