<?php

session_start();
include __DIR__ . "/../../../backend/controller/userController.php";
$controller = new userController();

if (!isset($_SESSION["id_usuario"])){
    header("location: ../login/login.php");
}




$logado = isset($_SESSION['id_usuario']);


if (!isset($_GET['id_espaco'])){
    header("location: ../home/index.php");
}
else{
    $id_espaco = $_GET["id_espaco"];  

}



$id_usuario = $_SESSION['id_usuario'];








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./agendar.css">
    <title>Document</title>
    <link rel="stylesheet" href="./agendar.css">
</head>
<body>

    <div class="container_1 ">

    
    <header>
        <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
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
  
    <main>
        <h2> <?php $controller->getRoomById($id_espaco,"nome"); ?> </h2>
        <div class="imagem">
            <img src="../../../public/images/mcDonald2.svg" alt="carregou não">
        </div>
                <p>sobre:</p>

        <div class="descricao"><?php $controller->getRoomById($id_espaco,"descricao");?>
            <p>Capacidade: <?php $controller->getRoomById($id_espaco,"capacidade");?>                          </p>
        </div>

    </main>


    <div class="horarios">
        <div class="segunda">
            <h2>Segunda</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Monday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST">
                <input  type="hidden" name="dia_semana" value="Monday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>TERÇA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Tuesday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST">
                <input  type="hidden" name="dia_semana" value="Tuesday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>QUARTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Wednesday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST">
                <input  type="hidden" name="dia_semana" value="Wednesday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>QUINTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Thursday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST">
                    <input  type="hidden" name="dia_semana" value="Thursday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>SEXTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Friday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=<?php echo $id_espaco; ?>" method="POST">
                <input  type="hidden" name="dia_semana" value="Friday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        
        
    </div>
    
    <!-- <h1>AGENDAR PAGINA</h1>

    <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
        <select name="horarioSelecionado" id="">
            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="17:00:00">17:00</option>
        </select>
        
        <button>AGENDAR</button>

    </form> -->


    
</body>
</html>






</body>
</html> 
<!-- <form action="../../../backend/router/loginRouter.php?action=validarsessao" method="POST">
    <p>agendar horario</p>
    <button>AGENDAR BUTAO</button>
</form> -->
