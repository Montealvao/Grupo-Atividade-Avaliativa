<?php

session_start();
include __DIR__ . "/../../../backend/controller/userControler.php";

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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./agendar.css">
</head>
<body>
    <h1>AGENDAR PAGINA</h1>

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
</html> 






