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

if (!isset($_GET['id_espaco'])){
    header("location: ../home/index.php");
}



$controller = new userController();

// $controller ->getRoomById($id_espaco);

$id_usuario = $_SESSION['id_usuario'];


if(isset($_GET["sucesso"])) {
    echo "<script>alert('Reserva feito com sucesso caralho')</script>";
}
else if (isset($_GET["falha"])){
    echo "<script>alert('Espaço já com reserva')</script>";

}



$reservas = $controller->verTodasAsReservasPorId($id_usuario);


if (isset($_POST['horarioSelecionado']) && !empty($_POST['horarioSelecionado'])) {

    $dataAmanha = date('Y-m-d ', strtotime('+1 day'));

    $data = $_POST['horarioSelecionado'];
    $data = strval($data);

    $data = $dataAmanha . $data;
    $id_usuario = $_SESSION['id_usuario'];
    $id_espaco = $_GET['id_espaco'];
    $controller->adicionarReserva($id_usuario, $id_espaco ,$data);
}

// INSERIR ESPAÇO NOVO
// if (isset($_POST['nome_espaco']) and isset($_POST['capacidade']) and isset($_POST['descricao'])){
//     $nome_espaco = $_POST['nome_espaco'];
//     $capacidade = $_POST['capacidade'];
//     $descricao = $_POST['descricao'];
//     $controller->cadastrarEspaco($nome_espaco,$capacidade,$descricao);
//     echo "deu CERTOOOOOO";
// }

// cancelar reserva por nome
// <form action="" method="POST">
//             <h2>cancelar reserva</h2>
//             <input name="nome_espaco" type="text">
//             <button type="submit">enviar</button>


//         </form>

// if (isset($_POST['nome_espaco'])){
//     $nome_espaco = $_POST['nome_espaco'];
//     $controller->cancelarReserva($nome_espaco);
// }





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
    <!-- <h1>AGENDAR PAGINA</h1>

    <form action="" method="POST">

        <select name="horarioSelecionado" id="">

            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="17:00:00">17:00</option>
            
        </select>
        
        <button>AGENDAR</button>

    </form>

    
        <div>
            <h2>
                <h3> NOME DE EsPAÇo </h3>
                   
                    

                    <table>
                        <thead>
                            <tr>
                                <td>horario</td>
                                <td>espaco</td>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                $i=0;
                            foreach($reservas as $item){
                                ?>
                                <tr>
                                    <td> <?php  echo $item["nome"]  ?>    </td>
                                    <td> <?php  echo $item["data"]  ?>    </td>
                                    <td> <?php  echo $i+=1?>    </td>
                                    <td>  </td>

                                </tr>
                           <?php } ?>
                        </tbody>
                    
                </table>

            </h2>
        </div>

      

    

</body>
</html>  -->




    <div class="container_1 ">

    
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






</body>
</html> 
<!-- <form action="../../../backend/router/loginRouter.php?action=validarsessao" method="POST">
    <p>agendar horario</p>
    <button>AGENDAR BUTAO</button>
</form> -->
