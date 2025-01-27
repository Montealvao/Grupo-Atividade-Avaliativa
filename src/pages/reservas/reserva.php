<?php 
session_start();

include __DIR__ . "/../../../backend/controller/userController.php";


if (!isset($_SESSION['id_usuario'])){
    header("location: ../home/index.php");
}

// ver reservas

$controller = new userController();

$id_usuario = $_SESSION['id_usuario'];

$reservas = $controller->verTodasAsReservasPorId($id_usuario);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserva.css">
    <title>Reservas</title>
</head>
<body>
<header>
        <div class="H-esquerdo">
            <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none;">Início</a></h2>
            <h2> <a href="../perfil/perfil.php"  style="text-decoration: none;" >Perfil  </a></h2>
            <?php  if ($id_usuario == 1):  ?>
                <h2> <a style="text-decoration: none;" href="../lista-usuarios/index.php">Admin  </a> </h2>
            <?php  endif;?>
        </div>
        <h2><a href="../perfil/logout.php">Logout</a></h2>
</header>


<div class="removerReserva">
    <h3>Digite o nome para cancelar reserva</h3>
    <div>
        <form action="../../../backend/router/reservaRouter.php?action=removerReserva" method="POST">
            <input type="text" name="nome_espaco" id="" placeholder="Nome:">
            <button class="botaoRemover" type="submit">Remover</button> 
        </form>
    </div>


</div>
    <div class="tabela">
        <table >
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Horário</td>
                </tr>
            </thead>

            <tbody>
                    <?php
                    $i=0;
                foreach($reservas as $item){
                    ?>
                    <tr>
                        <td> <?php  echo $item["nome"]  ?>   </td>
                        <td> <?php  echo $item["data"]  ?>   </td>
                    </tr>
                <?php } ?>
            </tbody>       
        </table>
    </div>


    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>
</body>
</html>