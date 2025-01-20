<?php

include __DIR__ . "/../controller/userController.php";

$userController = new userController();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_GET["acao"]) {
        case 'cadastrar':
            if(!(empty($_POST['name']) || empty($_POST['password']))){
                $resultado = $userController->CriarUsuario($_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["telefone"]);
                if($resultado){
                    header("location: ../../pages/home/index.php");
                }else{
                    header("location: ../../pages/signUp/index.php?error=true");
                }
            }else{ 
                header("location: ../../pages/signUp/index.php?error=true");
            }
            break;
        
        case "edit":
            if(!(empty($_POST['name']) || empty($_POST['password']))){
                $resultado = $userController->AtualizarUsuario($_POST["id"], $_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["telefone"]);
                if($resultado){
                    header("location: ../../pages/home/index.php");
                }else{
                    header("location: ../../pages/signUp/index.php?error=true");
                }
            }else{
                header("location: ../../pages/signUp/index.php?error=true");
            }
            break;
        
        case "delete":
            $resultado = $userController->ApagarUsuario($_POST["id"]);
            if($resultado){
                header("location: ../../pages/home/index.php");
            }else{
                header("location: ../../pages/home/index.php?error=true");
            }
            break;


            default:
            echo 'Não achei';
            break;
    }
}