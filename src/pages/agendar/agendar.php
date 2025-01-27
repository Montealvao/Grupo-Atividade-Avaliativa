<?php

session_start();
include __DIR__ . "/../../../backend/controller/userController.php";

if (!isset($_SESSION["id_usuario"])){
    header("location: ../login/login.php");
}

// if (!isset($_GET['id_espaco'])){
//     header("location: ../home/index.php");
// }

$logado = isset($_SESSION['id_usuario']);


$controller = new userController();

// $controller ->getRoomById($id_espaco);

$id_usuario = $_SESSION['id_usuario'];

if(isset($_GET["sucesso"])) {
    echo "<script>alert('Reserva feito com sucesso caralho')</script>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./agendar.css">
    <title>Document</title>
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
                <button><a href="../login/login.php">Entrar</a></button>
                <button><a href="../cadastro/index.php">Cadastrar-se</a></button>
            <?php endif; ?>
        </div>
    </header>
    
    
    <h1>AGENDAR PAGINA</h1>

    <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
        <select name="horarioSelecionado" id="">
            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="17:00:00">17:00</option>
        </select>
        
        <button>AGENDAR</button>

    </form>


    
</body>
</html>