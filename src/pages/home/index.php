<?php

session_start();
$logado = isset($_SESSION['id_usuario']);


include __DIR__ . "/../../../backend/controller/userController.php";
$userController = new userController();


$espacos = $userController->listarEspacoCadastrado()

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
                <a href="../login/login.php"><button>Entrar</button></a>
                <a href="../cadastro/index.php"><button>Cadastrar-se</button></a>
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
    <?php   
    foreach ($espacos as $itens){
        echo "<div class='controle-restaurante'>
                <div class='imagem-restaurante'>
                    <img src='https://s2-techtudo.glbimg.com/L9wb1xt7tjjL-Ocvos-Ju0tVmfc=/0x0:1200x800/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2023/q/l/TIdfl2SA6J16XZAy56Mw/canvaai.png' alt='reserva'>
                </div>
                <div class='label-restaurante'>
                    <label>Nome:{$itens['nome']}</label>
                    <label>Capacidade: {$itens['capacidade']}</label>
                    <label>Descrição: {$itens['descricao']}</label>'1                                    
                </div>
                <input type='hidden' value='{$itens['id']}'>
            </div>";
            }
        ?>
    </div>

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

    <script src="./script.js"></script>
</body>
</html>