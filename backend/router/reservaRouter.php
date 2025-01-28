<?php
include __DIR__ . "/../controller/userController.php";




session_start();

$controller = new userController();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET['action']) {
        case 'removerReserva':
            if (isset($_POST['nome_espaco'])){
                $nome_espaco = $_POST['nome_espaco'];
                $controller->cancelarReserva($nome_espaco);
                header("location: ../../src/pages/reservas/reserva.php");
                
            }
        


    }


}