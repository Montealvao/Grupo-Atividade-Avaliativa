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
else if (isset($_GET["falha"])){
    echo "<script>alert('Espaço já com reserva')</script>";

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
  
    <main>
        <h2>$nome</h2>
        <div class="imagem">
            <img src="../../../public/images/mcDonald2.svg" alt="carregou não">
        </div>

        <div class="descricao">
            $descricao
        </div>
    </main>


    <div class="horarios">
        <div class="segunda">
            <h2>Segunda</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Monday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
                <input  type="hidden" name="dia_semana" value="Monday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>TERÇA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Tuesday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
                <input  type="hidden" name="dia_semana" value="Tuesday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>QUARTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Wednesday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
                <input  type="hidden" name="dia_semana" value="Wednesday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>QUINTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Thursday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
                    <input  type="hidden" name="dia_semana" value="Thursday">
                    <button name="horarioSelecionado" value="11:00:00">Reservar</button>
                </form>
        </div>
        <div class="segunda">
            <h2>SEXTA</h2>
                
                <div><?php  $dia = date('d/m', strtotime('next Friday')); echo $dia;?></div>
                <button class="time">11:00</button>
                <form action="../../../backend/router/agendarRouter.php?id_espaco=1" method="POST">
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