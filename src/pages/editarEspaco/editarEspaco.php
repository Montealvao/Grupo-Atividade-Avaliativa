<?php 
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] !=1){
        header("location: ../home/index.php");
        exit();
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $controller = new userController();
    
    
    if (isset($_GET["espacoEditado"])) {
        echo "<script>alert('Espaço editado com sucesso!')</script>";
    }
    
    else if (isset($_GET["erro"])) {
        echo "<script>alert('Nenhuma alteração foi feita ou o espaço não existe!')</script>";
    }
    
    else if (isset($_GET["sucesso"])) {
        echo "<script>alert('Espaço deletado com sucesso!')</script>";
    }
    
    else if (isset($_GET["erroComId"])) {
        echo "<script>alert('Erro ao tentar deletar o espaço!')</script>";
    }
    else if (isset($_GET["erroCapacidade"])) {
        echo "<script>alert('Insira valor na capacidade!')</script>";
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
        <h2><a  style="text-decoration: none; color: white;"  href="../cadastrar-espaco/cadastroPagina.php">Cadastrar espaço</a></h2>
        </div>
        <h2><a style="text-decoration: none; color: white;" href="../perfil/logout.php">Logout</a></h2>  
    </header>    

    <div class="editarEspaco">
        Editar espaço:
        <form action="../../../backend/router/reservaRouter.php?action=editarEspaco" method="POST">
            <input type="text" placeholder="id:" name="id_espaco" id="">
            <input type="text" placeholder="nome:" name="nome" id="">
            <input type="text" required placeholder="capacidade:" name="capacidade" id="">
            <input type="text" placeholder="descrição:" name="descricao" id="">
            <button type="submit">Enviar</button>
        </form>

    </div>


    <div class="excluirEspaco">
        Excluir espaço:
        <form action="../../../backend/router/reservaRouter.php?action=excluirEspaco" method="POST">
            <input type="text" placeholder="id:" name="id_espaco_excluir" id="">
            <button type="submit">Enviar</button>
        </form>

    </div>



 

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>
</html>