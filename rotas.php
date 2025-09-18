<?php
// Pega a URL passada como parâmetro, ou define 'index' como padrão
$url = isset($_GET['url']) ? $_GET['url'] : 'index'; // Rota padrão para 'index'

// Verifica a URL e redireciona para a página correspondente
if ($url == 'index') {
   require 'index.php';  // Redireciona para index.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'produtos') {
    require 'produtos.php';  // Redireciona para produtos.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'orcamento') {
    require 'orcamento.php';  // Redireciona para orcamento.php
    exit();  // Não continua o script depois do redirecionamento
}  elseif ($url == 'login') {
    require 'login.php';  // Redireciona para login.php
    exit();  // Não continua o script depois do redirecionamento
}  elseif ($url == 'cadastrar') {
    require 'cadastrar.php';  // Redireciona para cadastrar.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'logout') {
    require 'logout.php';  // Redireciona para cadastrar.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'esqueciasenha') {
    require 'esqueciasenha.php';  // Redireciona para esqueciasenha.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'recuperar_senha') {
    require 'recuperar_senha.php';  // Redireciona para esqueciasenha.php
    exit();  // Não continua o script depois do redirecionamento
} elseif ($url == 'confirmar_codigo') {
    require 'confirmar_codigo.php';  // Redireciona para esqueciasenha.php
    exit();  // Não continua o script depois do redirecionamento
}elseif ($url == 'redefinir_senha') {
    require 'redefinir_senha.php';  // Redireciona para esqueciasenha.php
    exit();  // Não continua o script depois do redirecionamento
}
else {
    // Se a URL não for 'index' nem 'produtos', exibe o erro 404
    echo "<h1>Erro 404</h1>";
    echo "<p>Página não encontrada.</p>";
}
?>
