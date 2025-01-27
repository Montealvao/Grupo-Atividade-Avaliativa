<?php 
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] !=1){
        header("location: ../home/index.php");
        exit();
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $controller = new userController();
    
    if (isset($_POST['id_espaco'])  and isset($_POST['nome']) and isset($_POST['capacidade']) and isset($_POST['descricao'])){
        $id_espaco = $_POST['id_espaco'];
        $nome = $_POST['nome'];
        $capacidade = $_POST['capacidade'];
        $descricao = $_POST['descricao'];
        $controller->editarEspaco($id_espaco,$nome,$capacidade,$descricao);
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Editar Espaço</title>
</head>
<body>
    <header>
        <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
            <h2><a style="text-decoration: none;  color:white;" href="../perfil/perfil.php">Perfil</a></h2>
        <h2><a style="text-decoration: none;  color:white;" href="../lista-usuarios/index.php">Lista</a></h2>
        <h2><a  style="text-decoration: none; color: white;"  href="../cadastar-espaco/cadastroPagina.php">Cadastrar espaço</a></h2>
        </div>
        <h2><a style="text-decoration: none; color: white;" href="../perfil/logout.php">Logout</a></h2>  
    </header>    

    <div class="editarEspaco">
        Editar espaço:
        <form action="" method="POST">
            <input type="text" name="id_espaco" id="">
            <input type="text" name="nome" id="">
            <input type="text" name="capacidade" id="">
            <input type="text" name="descricao" id="">
            <button type="submit">Enviar</button>
        </form>

    </div>



 

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>
</html>