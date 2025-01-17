<?php

include __DIR__ . "/../controller/loginController.php";

$loginController = new LoginController();

if (!isset($_SESSION["id_usuario"])){
    header("location: ../../src/pages/login/login.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // if(isset($routes[$_GET["action"]])) {
    //     $routes[$_GET["action"]]();
    // }

    switch ($_GET['action'])  {
        case 'validarLogin':
            echo "FUNCINA";
            $resultado = $loginController->ValidarLogin($_POST["email"], $_POST["senha"]);
            if ($resultado){
                header("Location: ../../src/pages/home/index.php");
            }
            else{
                header("location: ../../src/pages/login/login.php");
            }
            
            break;
        
        default:
            echo "<h1>Not found 404</h1>";
            break;
    }
}
