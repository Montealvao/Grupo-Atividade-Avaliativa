<?php

session_start();
include __DIR__ . "/../../../backend/controller/userController.php";

if (!isset($_SESSION["id_usuario"])){
    header("location: ../login/login.php");
}

if (!isset($_GET['id_espaco'])){
    header("location: ../home/index.php");
}


$controller = new userController();

// $controller ->getRoomById($id_espaco);

$id_usuario = $_SESSION['id_usuario'];


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
    
    <div class="opcoes_1">

        <strong><p>Home</p></strong>
        <p>Explorar</p>
        <p>sobre</p>

    </div>

    <input type="text" placeholder="  Pesquisar" id="pesquisa">   

    <div class="Usuario">
        <img src="https://cdn-images.dzcdn.net/images/artist/427f1c47b0e448e77172ef64e9363ad3/500x500.jpg" alt="">
    </div>
    </div>
    <div id="imgReserva">
        <p>Reserva de casa de festas FAST-FOOD</p>
        <img id="mc" src="https://www.arcosdorados.com/wp-content/uploads/2023/11/Novo-McDonalds-Montes-Claros.png" alt="">
    </div>
    <div id="therock">
        
    </div>





</body>
</html> 
<!-- <form action="../../../backend/router/loginRouter.php?action=validarsessao" method="POST">
    <p>agendar horario</p>
    <button>AGENDAR BUTAO</button>
</form> -->
