<?php

include __DIR__ . "/../controller/userController.php";

$userController = new userController();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
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

        case "editar_foto":
            $dir = "../../public/uploads/";
            $tiposPermitidos = ["image/jpeg","image/png"];
            $id = $_GET["id"];
            
            if(!is_dir($dir)){
                mkdir($dir,0777,true);
            }

            if(isset($_FILES["foto_perfil"]) && in_array($_FILES["foto_perfil"]["type"],$tiposPermitidos)){
                $fileTemp = $_FILES["foto_perfil"]["tmp_name"];
                $fileNome = $_FILES["foto_perfil"]["name"];
                $fileExtensao = pathinfo($fileNome,PATHINFO_EXTENSION);
                $novoNome = uniqid("perfil_") . "." . $fileExtensao;
                $destino = $dir . $novoNome;

                if(move_uploaded_file($fileTemp, $destino)){
                    $resultado = $userController->AtualizarFoto($novoNome,$id);
                    header("location: ../../src/pages/perfil/perfil.php?suceso");
                }
                else{
                    header("location: ../../src/pages/perfil/perfil.php?erro");
                }
            }

            break;

        case "editar":
            if(!(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['telefone']))){
                $resultado = $userController->AtualizarUsuario($_POST["id"], $_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["telefone"]); ##colocar $foto_perfil
                if($resultado){
                    header("location: ../../src/pages/perfil/perfil.php?sucesso");
                }else{
                    header("location: ../../src/pages/perfil/perfil.php?error=true");
                }
            }else{
                 header("location: ../../src/pages/perfil/perfil.php?error=true");
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

