<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] != 1) {
    header("location: ../home/index.php");
    exit();
}

include __DIR__ . "/../../../backend/controller/userController.php";
$controller = new userController();

if (isset($_POST['nome_espaco']) and isset($_POST['capacidade']) and isset($_POST['descricao'])) {
    $nome_espaco = $_POST['nome_espaco'];
    $capacidade = $_POST['capacidade'];
    $descricao = $_POST['descricao'];
    $controller->cadastrarEspaco($nome_espaco, $capacidade, $descricao);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Lista de Usuários</title>
</head>

<body>
    <header>
        <div class="H-esquerdo">
            <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
            <h2><a style="text-decoration: none;  color:white;" href="../perfil/perfil.php">Perfil</a></h2>
        </div>
    </header>


    <h1>Lugar Cadastrado</h1>

 



    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>

</html>