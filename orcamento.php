<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
} 
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pedido de Bolo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<style>
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
            font-family: 'Brush Script MT', 'Brush Script Std', 'cursive';
        }
        header p {
            font-size: 1.2em;
            font-weight: bold;
        }
        nav {
            background-color: #C6955D; /* Marrom claro */
            overflow: hidden;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;            /* organiza lado a lado */
            justify-content: center;  /* centraliza na barra */
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
            background-color: #C6955D; /* Dourado suave */
            color: white;
        }
  :root {
    --cor-principal: #C6955D;
    --cor-texto: #333;
    --cor-fundo: #fff;
    --cor-campo: #f9f9f9;
    --sombra-bloco: rgba(0,0,0,0.1);
  }

  body {
    font-family: 'Georgia', serif;
    background-color: #F2F2F2;
    color: var(--cor-texto);
    margin: 0;
    padding: 0;
  }

  h1, h2 {
    text-align: center;
    color: var(--cor-principal);
    margin-bottom: 10px;
  }

  .container {
    max-width: 900px;
    margin: 30px auto;
    padding: 0 20px;
  }

  /* Formulário elegante */
  .formulario-pedido {
    background: var(--cor-fundo);
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 6px 20px var(--sombra-bloco);
  }

  .campo {
    position: relative;
    margin-bottom: 20px;
  }

  .campo i {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: var(--cor-principal);
    font-size: 18px;
  }

  .campo input, .campo textarea {
    width: 100%;
    padding: 12px 15px 12px 40px;
    border-radius: 10px;
    border: 1px solid #ddd;
    background: var(--cor-campo);
    font-size: 14px;
    color: var(--cor-texto);
  }

  .campo input:focus, .campo textarea:focus {
    border-color: var(--cor-principal);
    outline: none;
  }

  .formulario-pedido button {
    width: 100%;
    background-color: var(--cor-principal);
    color: #fff;
    border: none;
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s;
  }

  .formulario-pedido button:hover {
    background-color: #a87745;
    transform: scale(1.03);
  }

  /* Responsividade */
  @media (max-width: 500px) {
    .campo input, .campo textarea {
      padding-left: 35px;
    }
  }
</style>
</head>
<body>
   <header>
        <h1>Bloomed Cakes</h1>
        <p>Delícias Artesanais - Onde o sabor encontra a elegância</p>
    </header>


    <nav>
  <ul>
    <li><a href="index.php">Início</a></li>
    <li><a href="produtos.php">Nossos Produtos</a></li>
    <li><a href="logout.php">Sair</a></li>
  </ul>
</nav>


<div class="container">
  <h1>Faça seu pedido</h1>
  <p style="text-align:center; margin-bottom:30px;">Conte-nos como você quer seu bolo, e enviaremos direto para o WhatsApp da boleira!</p>

  <form class="formulario-pedido" id="pedidoBolo">

   <div class="campo">
  <i class="bi bi-person-fill"></i>
  <input type="text" id="nome" placeholder="Seu nome">
</div>

<div class="campo">
  <i class="bi bi-whatsapp"></i>
  <input type="text" id="telefone" placeholder="Seu WhatsApp">
</div>


    <div class="campo">
      <i class="bi bi-cup-straw"></i>
      <input type="text" id="sabor" placeholder="Sabor do bolo" required>
    </div>

    <div class="campo">
      <i class="bi bi-aspect-ratio"></i>
      <input type="text" id="tamanho" placeholder="Tamanho do bolo" required>
    </div>

    <div class="campo">
      <i class="bi bi-pencil-fill"></i>
      <textarea id="detalhes" rows="5" placeholder="Detalhes adicionais (decoração, cores, recheio...)" required></textarea>
    
    </div>

    <button type="submit">Enviar pedido via WhatsApp</button>
  </form>
</div>



<script>
  const form = document.getElementById('pedidoBolo');
  form.addEventListener('submit', function(e){
    e.preventDefault();

    const nome = document.getElementById('nome').value;
    const telefone = document.getElementById('telefone').value;
    const sabor = document.getElementById('sabor').value;
    const tamanho = document.getElementById('tamanho').value;
    const detalhes = document.getElementById('detalhes').value;

    const mensagem = `Olá! Meu nome é ${nome}. Quero fazer um pedido de bolo:\n- Sabor: ${sabor}\n- Tamanho: ${tamanho}\n- Detalhes: ${detalhes}\nMeu WhatsApp: ${telefone}`;

    const numeroBoleira = "5511976892406"; // Coloque o WhatsApp da boleira aqui
    window.open(`https://wa.me/${numeroBoleira}?text=${encodeURIComponent(mensagem)}`, '_blank');
  });
</script>

</body>
</html>