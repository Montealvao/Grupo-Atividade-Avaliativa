<?php

include __DIR__ . "/../controller/loginController.php";

session_start();

$loginController = new LoginController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET['action'])  {
        case 'validarLogin':
            echo "FUNCINA";
            $resultado = $loginController->ValidarLogin($_POST["email"], $_POST["senha"]);

            if ($resultado){
                header("Location: ../../src/pages/agendar/agendar.php");
            }
            else{
                header("location: ../../src/pages/login/login.php");
            }
            break;

        case  'validarsessao':
            if (!isset($_SESSION["id_usuario"])){
                header("location: ../../src/pages/login/login.php");
            }
            else {
                header("location: ../../src/pages/agendar/agendar.php");
            } 
            break;
        default:
            echo "<h1>Not found 404</h1>";
            break;
    }
}