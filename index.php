<?php
session_start(); // necessário para acessar a sessão
$usuario_logado = false;
$nome_usuario = "";

if (isset($_SESSION['usuario_id'])) {
    $usuario_logado = true;
    $nome_usuario = $_SESSION['usuario_nome'];
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloomed Cakes - Delícias Artesanais</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #F2F2F2;
            margin: 0;
            padding: 0;
            color: #333;
        }
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
        section.historia {
            padding: 60px 20px;
            background-color: #ffffff;
            text-align: center;
            margin: 40px auto;
            max-width: 1000px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
          }

          /* título bonito */
          section.historia h2 {
            color: #6199B5; /* Azul elegante */
            font-size: 3em;
            font-family: 'Brush Script MT', 'Brush Script Std', cursive;
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
          }

          /* layout da foto e texto lado a lado */
          .conteudo-historia {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap; /* se for tela pequena, quebra */
            gap: 30px;
          }

          /* caixa azul com foto */
          .foto-box {
            background-color: #6199B5; /* azul suave */
            padding: 15px;
            border-radius: 20px;
            flex: 1 1 300px;
            max-width: 300px;
            display: flex;
            justify-content: center;
          }

          .foto-box img {
            max-width: 100%;
            border-radius: 15px;
            display: block;
          }

          /* caixa de texto */
          .texto-box {
            flex: 2 1 500px;
            text-align: left;
          }

          .texto-box p {
            font-size: 1.2em;
            color: #444; /* mais suave que preto */
            font-family: 'Quicksand', sans-serif; /* fonte redondinha */
            line-height: 1.8;
          }

        section.intro {
            padding: 60px 20px;
            background-color: white;
            text-align: center;
            margin-bottom: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        section.intro h2 {
            color: rgb(221, 160, 86); /* Dourado suave */
            font-size: 2.5em;
        }
        section.intro p {
            font-size: 1.2em;
            color: #555;
            max-width: 900px;
            margin: 20px auto;
            line-height: 1.6;
        }
        section.produtos {
            padding: 50px 20px;
            background-color: white;
            text-align: center;
            clear:both;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        section.produtos h2 {
            color: #C6955D;
            font-size: 2.5em;
            font-family:'Brush Script MT', 'Brush Script Std', 'cursive';
        }
        .produto-categoria {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        .categoria {
            width: 30%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .categoria img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .categoria h3 {
            font-size: 1.6em;
            color: #6199B5;
            margin-bottom: 10px;
        }
        .categoria p {
            color: #666;
            font-size: 1.1em;
        }

        footer {
            background-color: #C6955D; /* Marrom claro */
            color: white;
            padding: 15px;
            text-align: center;
            clear: both;
        }
        footer p {
            margin: 0;
        }
        #right{
        width: 300px; /* define uma largura para não ocupar a tela toda */
        float: right; /* faz a div ir para a direita */
        text-align: justify; /* deixa o texto alinhado bonito */
        margin: 20px 100px 20px 20px;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        padding: 20px
        }

        /*estilo do nossos sabores:*/
        section.sabores {
    padding: 50px 20px;
    background-color: white;
    text-align: center;
}


/* wrapper do título fica centralizado e serve de referência para a borboleta */
.titulo-sabores {
  position: relative;
  display: inline-block;   /* mede só o tamanho do h2 */
  margin: 0 auto 20px;     /* centraliza e dá respiro embaixo */
}

/* deixa o h2 no estilo do seu site */
.titulo-sabores h2 {
  color: #C6955D; 
  font-size: 2.5em;
 margin-bottom: 10px;
  font-family: 'Brush Script MT', 'Brush Script Std', 'cursive';
}

/* borboleta fica ABSOLUTA à esquerda do título, sem empurrar o h2 */
.titulo-sabores .borboleta {
  position: absolute;
  right: 100%;           /* encosta à esquerda do wrapper */
  margin-right: 14px;    /* espaço entre borboleta e texto */
  top: 50%;
  transform: translateY(-50%);
  width: 150px;           /* ajuste o tamanho como quiser */
  height: auto;
  pointer-events: none;  /* só decorativa */
}

/* ajuste para telas pequenas */
@media (max-width: 520px) {
  .titulo-sabores .borboleta { width: 38px; margin-right: 10px; }
}

.titulo-sabores .borboleta.direita {
  left: 100%;          /* gruda no lado direito */
  margin-left: 14px;   /* espaço até o texto */
}

.sabores-container {
    display: flex;
    justify-content: center;
    gap: 50px;
    flex-wrap: wrap;
    margin-top: 30px;
    
}

.grupo-sabores {
    flex: 1;
    min-width: 300px;
}

.grupo-sabores h3 {
    color: #6199B5;
    font-size: 2em;
    margin-bottom: 20px;
    font-family:'Brush Script MT', 'Brush Script Std', 'cursive';
}

.lista-sabores {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.sabor {
    width: 160px;
    background-color: #F2F2F2;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.2s;
}

.sabor:hover {
    transform: scale(1.05);
}

.sabor img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.sabor h4 {
    color:  #C6955D;
    margin: 0;
}
/*fim do estilo dos sabores*/
/*estilo botão orçamento*/
.btn-orcamento {
    display: block; 
    margin: 20px auto 0 ;  
    margin-bottom:20px;
    padding: 15px 30px;
    background-color: #C6955D; /* Marrom/dourado do site */
    color: white;
    text-decoration: none;
    font-size: 1.2em;
    border-radius: 8px;
    transition: background-color 0.3s, transform 0.2s;
    width: fit-content; 
}

.btn-orcamento:hover {
    background-color: #a87745; /* tom mais escuro ao passar o mouse */
    transform: scale(1.05);
}

/* --- Galeria --- */
.galeria h2{
    color: #6199B5;
    font-size: 3em;
    margin-bottom: 20px;
    font-family:'Brush Script MT', 'Brush Script Std', 'cursive';
    text-align: center;
}
.galeria p {
  font-size: 1.2em;
  color: #444; /* mais suave que preto */
  line-height: 1.8;
  text-align: center;
 
}
/* Filtros da galeria */
.galeria-filtros {
  padding: 0;
  margin: 0 auto 20px auto;
  list-style: none;
  text-align: center;
}
.galeria-filtros li {
  cursor: pointer;
  display: inline-block;
  padding: 8px 20px;
  margin: 0 5px;
  font-size: 15px;
  font-weight: 500;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
  background-color: #ffffff;
  
}
.galeria-filtros li:hover,
.galeria-filtros li.filtro-ativo {
  background-color: #C6955D;
  color: white;
}

/* Itens da galeria */
.item-galeria {
  position: relative;
  overflow: hidden;
  border-radius: 12px;
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  margin-bottom: 20px;
}

/* Imagem da galeria */
.isotope-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 1px;
  background-color: white;
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.item-galeria img {
  width: 100%;
  height: 250px;
  object-fit: cover; /* mantém o corte bonito sem distorcer */
  border-radius: 12px;
  transition: transform 0.3s;
}

.item-galeria:hover img {
  transform: scale(1.05);
}


/* Informações da galeria (texto sobre a imagem) */
.info-galeria {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0,0,0,0.6);
  color: white;
  padding: 10px;
  opacity: 0;
  transition: opacity 0.3s;
  text-align: center;
  font-size: 0.9em;
}
.item-galeria:hover .info-galeria {
  opacity: 1;
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
    <li><a href="#historia">Minha História</a></li>
    <li><a href="#produtos">Produtos</a></li>
    <li><a href="#galeria">Galeria</a></li>
    <li><a href="#sabores">Nossos Sabores</a></li>
    <li><a href="orcamento.php">Orçamento</a></li>

    <?php if ($usuario_logado): ?>
      <li>
        <i class="bi bi-person-circle"></i> <!-- ícone de logado -->
        <span><?= htmlspecialchars($nome_usuario) ?></span>
        <a href="logout.php">Sair</a>
      </li>
    <?php else: ?>
      <li><a href="login.php">Entrar</a></li>
    <?php endif; ?>
  </ul>
</nav>
        <section id="historia" class="historia">
  <h2>Minha História</h2>
  <div class="conteudo-historia">
    <div class="foto-box">
      <img src="img/karla.JPG" alt="Foto de Karla Criscuolo">
    </div>
    <div class="texto-box">
      <p>
        Tudo começou há cerca de 12 anos, quando decidi trocar os ares do aeroporto pela doçura da confeitaria. Desde então, me dedico a aprender e aperfeiçoar cada detalhe. <br><br>
        Fiz inúmeros cursos para oferecer não apenas bolos e doces, mas experiências que transformam momentos em memórias especiais.
      </p>
    </div>
  </div>
</section>

    <!-- Seção de Apresentação -->

    <!-- Seção de Produtos -->
    <section id="produtos" class="produtos">
        <h2>Descubra Nossos Sabores</h2>
        <p>Selecionamos as melhores opções de doces para deixar seu evento ainda mais especial.</p>

        <div class="produto-categoria">
            <div class="categoria">
                <h3>Bolos</h3>
                <img src="bombons.jpg" alt="Bombons gourmet">
                <p>Bombons recheados com ingredientes exclusivos e toques refinados, para uma experiência única.</p>
            </div>

            <div class="categoria">
                <h3>Doces finos</h3>
                <img src="macarons.jpg" alt="Macarons coloridos">
                <p>Delicados macarons de cores vibrantes, preparados com os melhores sabores e texturas.</p>
            </div>

            <div class="categoria">
                <h3>Flores em porcelana</h3>
                <img src="doces.jpg" alt="Doces finos de festa">
                <p>Doces criados especialmente para complementar a sua festa, com charme e sabor.</p>
            </div>
        </div>
    </section>

   <!--galeria-->
<section id="galeria" class="galeria">
  <div class="container section-title">
    <h2>Galeria</h2>
    <p>Alguns dos meus trabalhos feitos com muito carinho:</p>
  </div>

  <div class="container">
    <ul class="galeria-filtros isotope-filtros">
      <li data-filter="*" class="filtro-ativo">Tudo</li>
      <li data-filter=".bolos">Bolos - Aniversário</li>
      <li data-filter=".doces">Bolos - Casamento</li>
      <li data-filter=".flores">Flores de Porcelana</li>
    </ul>

    <div class="isotope-container">
      
      <!-- ================= Bolos Aniversário ================= -->
      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver1.jpg" class="glightbox"><img src="img/blniver1.jpg" alt="Bolo decorado 1"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver2.jpg" class="glightbox"><img src="img/blniver2.jpg" alt="Bolo decorado 2"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver3.jpg" class="glightbox"><img src="img/blniver3.jpg" alt="Bolo decorado 3"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver4.jpg" class="glightbox"><img src="img/blniver4.jpg" alt="Bolo decorado 4"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver5.jpg" class="glightbox"><img src="img/blniver5.jpg" alt="Bolo decorado 5"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver6.png" class="glightbox"><img src="img/blniver6.png" alt="Bolo decorado 6"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver7.png" class="glightbox"><img src="img/blniver7.png" alt="Bolo decorado 7"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver8.png" class="glightbox"><img src="img/blniver8.png" alt="Bolo decorado 8"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver10.png" class="glightbox"><img src="img/blniver10.png" alt="Bolo decorado 9"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>

      <div class="item-galeria isotope-item bolos">
        <a href="img/blniver11.png" class="glightbox"><img src="img/blniver11.png" alt="Bolo decorado 10"></a>
        <div class="info-galeria"><h4>Bolo Decorado</h4></div>
      </div>


      <!-- ================= Bolos Casamento ================= -->
      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa1.jpg" class="glightbox"><img src="img/blcasa1.jpg" alt="Bolo casamento 1"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>

      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa2.jpg" class="glightbox"><img src="img/blcasa2.jpg" alt="Bolo casamento 2"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>

      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa3.jpg" class="glightbox"><img src="img/blcasa3.jpg" alt="Bolo casamento 3"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>

      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa4.jpg" class="glightbox"><img src="img/blcasa4.jpg" alt="Bolo casamento 4"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>

      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa6.jpg" class="glightbox"><img src="img/blcasa6.jpg" alt="Bolo casamento 6"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>

      <div class="item-galeria isotope-item doces">
        <a href="img/blcasa7.jpg" class="glightbox"><img src="img/blcasa7.jpg" alt="Bolo casamento 7"></a>
        <div class="info-galeria"><h4>Bolo de Casamento</h4></div>
      </div>


      <!-- ================= Flores Porcelana ================= -->
      <div class="item-galeria isotope-item flores">
        <a href="img/flor1.jpg" class="glightbox"><img src="img/flor1.jpg" alt="Flor 1"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor2.jpg" class="glightbox"><img src="img/flor2.jpg" alt="Flor 2"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor3.jpg" class="glightbox"><img src="img/flor3.jpg" alt="Flor 3"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor4.jpg" class="glightbox"><img src="img/flor4.jpg" alt="Flor 4"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor5.jpg" class="glightbox"><img src="img/flor5.jpg" alt="Flor 5"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor6.png" class="glightbox"><img src="img/flor6.png" alt="Flor 6"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor7.png" class="glightbox"><img src="img/flor7.png" alt="Flor 7"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

      <div class="item-galeria isotope-item flores">
        <a href="img/flor8.jpg" class="glightbox"><img src="img/flor8.jpg" alt="Flor 8"></a>
        <div class="info-galeria"><h4>Detalhes Florais</h4></div>
      </div>

    </div>
  </div>
</section>


    <!--nossos sabores-->
<section id="sabores" class="sabores">
    
    <div class="titulo-sabores">
    <h2>Nossos Sabores</h2>
    <p>Confira nossas opções de massas e recheios para montar o bolo perfeito.</p>
    <img src="img/borboleta.png"
         class="borboleta" alt="borboleta dourada">
     <img src="img/borboleta2.jpg"
       class="borboleta direita" alt="">
  </div>

    <div class="sabores-container">
        <!-- Massas -->
        <div class="grupo-sabores">
            <h3>Massas</h3>
            <div class="lista-sabores">
                <div class="sabor">
                    <img src="img/redvelvet.jpg" alt="Massa Red Velvet">
                    <h4>Red Velvet</h4>
                </div>
                <div class="sabor">
                    <img src="img/baunilhapapoula.jpg" alt="Massa Baunilha com Semente de Papoula">
                    <h4>Baunilha com Semente de Papoula</h4>
                </div>
                <div class="sabor">
                    <img src="img/chocolatemassa.jpg" alt="Massa Chocolate">
                    <h4>Chocolate</h4>
                </div>
                <div class="sabor">
                    <img src="img/boloindiano.jpg" alt="Massa Bolo Indiano">
                    <h4>Bolo Indiano</h4>
                </div>
                <div class="sabor">
                    <img src="img/limao.jpg" alt="Massa Limão Siciliano">
                    <h4>Limão Siciliano</h4>
                </div>
                <div class="sabor">
                    <img src="img/laranja.jpg" alt="Massa Laranja">
                    <h4>Laranja</h4>
                </div>
            </div>
        </div>

        <!-- Recheios -->
        <div class="grupo-sabores">
            <h3>Recheios</h3>
            <div class="lista-sabores">
                <div class="sabor">
                    <img src="img/docedeleite.jpg" alt="Recheio Doce de Leite">
                    <h4>Doce de Leite</h4>
                </div>
                <div class="sabor">
                    <img src="img/nozes.jpg" alt="Recheio Creme de Nozes">
                    <h4>Creme de Nozes</h4>
                </div>
                <div class="sabor">
                    <img src="img/babademoca.jpg" alt="Recheio Baba de Moça">
                    <h4>Baba de Moça</h4>
                </div>
                <div class="sabor">
                    <img src="img/maracuja.jpg" alt="Recheio Ganache de Maracujá">
                    <h4>Ganache de Maracujá</h4>
                </div>
                <div class="sabor">
                    <img src="img/ganachechocolate.jpg" alt="Recheio Ganache de Chocolate">
                    <h4>Ganache de Chocolate</h4>
                </div>
                <div class="sabor">
                    <img src="img/gianduia.jpg" alt="Recheio Gianduia">
                    <h4>Gianduia</h4> 
                </div>
            </div>
        </div>
    </div>
</section>
<a href="orcamento.php" class="btn-orcamento">Faça seu Orçamento</a>



    <footer>
        <p>&copy; 2025 Bloomed Cakes - Todos os direitos reservados</p>
    </footer>
 <!-- Scripts da galeria -->
<script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  // Inicializa o Isotope
  var iso = new Isotope('.isotope-container', {
    itemSelector: '.item-galeria', // atualizado para nova classe
    layoutMode: 'masonry',
    percentPosition: true,
    masonry: {
      columnWidth: '.item-galeria'
    }
  });

  // Filtros da galeria
  document.querySelectorAll('.galeria-filtros li').forEach(filtro => {
    filtro.addEventListener('click', function() {
      // Remove a classe do filtro ativo
      document.querySelector('.galeria-filtros .filtro-ativo').classList.remove('filtro-ativo');
      this.classList.add('filtro-ativo');

      // Aplica o filtro
      iso.arrange({ filter: this.getAttribute('data-filter') });
    });
  });

  // Inicializa o GLightbox
  const lightbox = GLightbox({ 
    selector: '.glightbox',
    touchNavigation: true,
    loop: true,
    zoomable: true
  })
  </script>
</body>
</html>