<?php

include __DIR__ . "/../controller/userController.php";

$userController = new userController();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_GET["acao"]) {
        case 'cadastrar':
            if(!(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['telefone']))){
                $resultado = $userController->CriarUsuario($_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["telefone"]);
                if($resultado){
                    session_start();
                    $_SESSION['id_usuario'] = $resultado['id'];
                    header("location: ../../src/pages/home/index.php");
                }else{
                    header("location: ../../src/pages/cadastro/index.php?error=true");
                }
            }else{ 
                header("location: ../../src/pages/cadastro/index.php?error=true");
            }
            break;
        
        case "editar":
            if(!(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['telefone']))){
                // $foto_perfil = null;
                // if (!empty($_FILES['foto_perfil']['fotoPerfil'])){
                //     $dir = __DIR__ . "/../../public/uploads/";
                //     $file = $dir . basename($_FILES["foto_perfil"]["fotoPerfil"]);
                //     if (move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $file)){
                //         $foto_perfil = $file;
                //     } else {
                //         echo "Erro ao carregar.";
                //         exit();
                //     }
                // }
                $resultado = $userController->AtualizarUsuario($_POST["id"], $_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["telefone"]); ##colocar $foto_perfil
                if($resultado){
                    header("location: ../../src/pages/perfil/perfil.php");
                }else{
                    echo "Erro ao atualizar o usuario";
                    exit();
                    // header("location: ../../src/pages/perfil/perfil.php?error=true");
                }
            }else{
                echo "Campos obrigatorios estao faltando.";
                exit();
                // header("location: ../../src/pages/perfil/perfil.php?error=true");
            }
            break;
        
        case "delete":
            if (!empty($_POST['id'])){
                $resultado = $userController->ApagarUsuario($_POST["id"]);
                if($resultado){
                    header("location: ../../src/pages/lista-usuarios/index.php");
                }else{
                    header("location: ../../src/pages/lista-usuarios/index.php?error=true");
                }
            } else {
                header("location: ../../src/pages/lista-usuarios/index.php?error=true");
            }
            break;

            default:
            echo 'Não achei';
            break;
    }
}

