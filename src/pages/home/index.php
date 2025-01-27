<?php

session_start();
$logado = isset($_SESSION['id_usuario']);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Página inicial</title>
</head>
<body>

    
    <!-- FEITO PELO PEDRO <h1>HOME</h1>
    <form action="../agendar/agendar.php" method="GET">
        <p><h3>QUADRA de FUTSal</h3></p>
        <p>ir página agendar</p>
        <button type="submit" name="id_espaco" value="1">IR</button>
    </form>
    <form action="../agendar/agendar.php?id_espaco=2" method="GET">
        <p><h3>SAlaãozinho de festa</h3></p>
        <p>ir página agendar</p>
        <button type="submit" name="id_espaco" value="2">IR</button>
    </form> -->
    <header>
        <div class="H-esquerdo">
            <h2>Início</h2>
            <h2>Explorar</h2>
            <h2>Sobre</h2>
        </div>
        <div class="H-direito">
            <?php if ($logado): ?>
                <a href="../perfil/perfil.php">
                    <img src="../../../public/icons/perfil.svg" alt="Perfil" class="icone-perfil">
                </a>
            <?php else: ?>
                <button><a href="../login/login.php">Entrar</a></button>
                <button><a href="../cadastro/index.php">Cadastrar-se</a></button>
            <?php endif; ?>
        </div>
    </header>
    <div class="carrosel">
        <div class="imagens">
            <img src="../../../public/images/carrosel1.svg" alt="">
            <img src="../../../public/images/imagem-cadastro.svg" alt="">
        </div>
        <div class="dots">
            <span class="dot" onclick="imagematual(1)"></span>
            <span class="dot" onclick="imagematual(2)"></span>
        </div>
    </div>

    <div class="controle">
        <div class="controle-restaurante">
            <div class="label-restaurante">
                <h2>McDonalds</h2>
                <?php if ($logado): ?>
                    <button><a href="../agendar/agendar.php">Realizar reserva</a></button>
                <?php else: ?>
                    <button><a href="../login/login.php">Realizar reserva</a></button>
                <?php endif; ?>
            </div>
            <div class="imagens-restaurante">
                <img src="../../../public/images/mcDonald1.svg" alt="mc1">
                <img src="../../../public/images/mcDonald2.svg" alt="mc2">
                <img src="../../../public/images/mcDonald3.svg" alt="mc3">
            </div>
        </div>
        
        <div class="controle-restaurante">
            <div class="label-restaurante">
                <h2>BurguerKing</h2>
                <?php if ($logado): ?>
                    <button><a href="../agendar/agendar.php">Realizar reserva</a></button>
                <?php else: ?>
                    <button><a href="../login/login.php">Realizar reserva</a></button>
                <?php endif; ?>
            </div>
            <div class="imagens-restaurante">
                <img src="../../../public/images/burguerKing1.svg" alt="bk1">
                <img src="../../../public/images/burguerKing2.svg" alt="bk2">
                <img src="../../../public/images/burguerKing3.svg" alt="bk3">
            </div>
        </div>
    </div>

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

    <script src="./script.js"></script>
</body>
</html>