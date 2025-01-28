<?php
include __DIR__ . "/../controller/userController.php";




session_start();

$controller = new userController();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET['action']) {
        case 'removerReserva':
            if (isset($_POST['id'])){
                $reserva = $_POST['id'];
                $controller->cancelarReserva($reserva);
                header("location: ../../src/pages/reservas/reserva.php");
            }else{
                header("location: ../../src/pages/reservas/reserva.php?erro");
            }

        break;

        case 'cadastrarEspaco':
            echo "caiu";
            if (isset($_POST['nome_espaco']) and isset($_POST['capacidade']) and isset($_POST['descricao'])){
                $nome_espaco = $_POST['nome_espaco'];
                $capacidade = $_POST['capacidade'];
                $descricao = $_POST['descricao'];
                $cadastroNovo = $controller->cadastrarEspaco($nome_espaco,$capacidade,$descricao);
                if ($cadastroNovo == "erro_nome_igual"){
                    header("location: ../../src/pages/cadastrar-espaco/cadastroPagina.php?erroNomeIgual");
                }
                else{
                    header("location: ../../src/pages/cadastrar-espaco/cadastroPagina.php?deuCerto");
                }
            }
        break;

        case 'editarEspaco':
            if (isset($_POST['id_espaco'])  and isset($_POST['nome']) and isset($_POST['capacidade']) and isset($_POST['descricao'])){
                $id_espaco = $_POST['id_espaco'];
                $nome = $_POST['nome'];
                $capacidade = $_POST['capacidade'];
                $descricao = $_POST['descricao'];
                $resultado = $controller->editarEspaco($id_espaco,$nome,$capacidade,$descricao);
                if ($resultado == "espacoAtualizado"){
                    header("location: ../../src/pages/editarEspaco/editarEspaco.php?espacoEditado");
                }
                else if ($resultado =="erro"){
                    header("location: ../../src/pages/editarEspaco/editarEspaco.php?erro");
                }
            }
            break;

        case 'excluirEspaco':
            if (isset($_POST['id_espaco_excluir'])){
                $id_espaco_excluir = $_POST['id_espaco_excluir'];
                $resultado = $controller->deletarEspaco($id_espaco_excluir);
                if ($resultado = "sucesso"){
                    header("location: ../../src/pages/editarEspaco/editarEspaco.php?sucesso");
                }
                else if ($resultado =="erroComId"){
                    header("location: ../../src/pages/editarEspaco/editarEspaco.php?erroComId");
                }
            }    
        break;
        
        default:
        echo "<h1>Not found 404</h1>";
        break;


    }


}