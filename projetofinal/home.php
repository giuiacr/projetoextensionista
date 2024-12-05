<?php
include ("db.php");
include ("processa_login.php");
include("validalogin.php");

$primeiro_nome = explode(' ', $login_nome)[0];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="Exemplo de landing page para portfolio">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
    <header class="cabecalho">
        <div class="logo"><img src="img/logodurandal.png" alt="Logo da Durandal Technology"></div>
        <nav class="cabecalho-menu">
            <a class="cabecalho-menu-item" href="#conteudo-principal">Apresentação</a>
            <a class="cabecalho-menu-item" href="#conteudo-terciario">Meus contatos</a>
            <div class="dropdown">
                <a class="cabecalho-menu-item">Bem vindo, <?=$primeiro_nome?></a>
                <div class="dropdown-content">
                    <a href="minhaconta.php">Minha conta</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="conteudo">

        <section id="conteudo-principal" class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                <h1 class="conteudo-principal-titulo">O que é identidade visual?</h1>
                <p class="conteudo-principal-paragrafo">Na era digital, a primeira impressão é tudo. Uma identidade visual consistente ajuda sua marca a se destacar, a transmitir profissionalismo e a criar uma conexão imediata com seu público. Ela é o rosto da sua empresa, a sua assinatura visual!</p>
            </div>
            <img class="conteudo-principal-imagem" src="img/imagemhome.png" alt="">
        </section>

        <section id="conteudo-secundário" class="conteudo-secundario">
            <h3 class="conteudo-secundario-titulo">Sinais de que você precisa de uma identidade visual</h3>
            <p class="conteudo-secundario-paragrafo">1. Suas redes sociais parecem desconexas?</p>
            <p class="conteudo-secundario-paragrafo">2. A imagem da sua marca não reflete seus valores?</p>
            <p class="conteudo-secundario-paragrafo">3. Dificuldade em atrair e reter clientes?</p>
            <br>
        </section>

        <section id="conteudo-terciario" class="conteudo-terciario">
            <h3 class="conteudo-terciario-titulo">Meus contatos</h3>
            <a class="conteudo-terciario-botao" href="https://www.instagram.com/durandalti/" target="_blank">
                Instagram
            </a>
            <a class="conteudo-terciario-botao" href="https://github.com/giuiacr/PortfolioGiullia" target="_blank">
                Github
            </a>
            <a class="conteudo-terciario-botao" href="https://www.linkedin.com/in/giullia-cordeiro-rebua/" target="_blank">
                Linkedin
            </a>
            <br>
        </section>
    </main>

    <footer>
        <a class="rodape">Durandal Technology ©</a>
    </footer>
</body>
</html>