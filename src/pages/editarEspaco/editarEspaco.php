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
        <h3 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h3>
            <h3><a style="text-decoration: none;  color:white;" href="../perfil/perfil.php">Perfil</a></h3>
        <h3><a style="text-decoration: none;  color:white;" href="../lista-usuarios/index.php">Lista</a></h3>
        <h3><a  style="text-decoration: none; color: white;"  href="../cadastrar-espaco/cadastroPagina.php">Cadastrar espaço</a></h3>
        </div>
        <h3><a style="text-decoration: none; color: white;" href="../perfil/logout.php">Logout</a></h3>  
    </header>    

    <div class="editarEspaco">
    <div class="edit">
    
        <p id="titulo_edicao">Editar espaço:</p>
        <form action="../../../backend/router/reservaRouter.php?action=editarEspaco" method="POST">
            <div class="padding_input">
            <input type="text" placeholder="id:" name="id_espaco" id="inputs">
            </div>
            <div class="padding_input">
            <input type="text" placeholder="nome:" name="nome" id="inputs">
            </div>
            <div class="padding_input">
            <input type="text" placeholder="capacidade:" name="capacidade" id="inputs">
            </div>
            <div class="padding_input">
            <input type="text" placeholder="descrição:" name="descricao" id="inputs">
            </div>
            <div class="padding_input">
            <button type="submit" id="botao">Enviar</button>
            </div>
        </form>


    </div>
    </div>


    <div class="excluirEspaco">
    <div class="edit2">
        Excluir espaço:
        <form action="../../../backend/router/reservaRouter.php?action=excluirEspaco" method="POST">
        <div class="padding_input">
            <input type="text" placeholder="id:" name="id_espaco_excluir" id="inputs">
            </div>
            <div class="padding_input">
            <button type="submit" id="botao">Enviar</button>
            </div>
        </form>

    </div>
    </div>



 

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>
</html>