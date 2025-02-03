<?php
include __DIR__ . "/../controller/userController.php";
include __DIR__ . "/../controller/reservaController.php";

session_start();

$controller = new userController();

$reservaController = new reservaController();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_espaco = $_GET['id_espaco'];
        switch ($_GET['id_espaco']) {

        case $id_espaco:
            $id_espaco = $_GET['id_espaco'];
            $id_usuario = $_SESSION['id_usuario'];
            $pessoas = $_POST['pessoas_selecionadas'];
            $data = $_POST['data_selecionada'];
            $horario = $_POST['horario_selecionado'];
            $resultado = $reservaController->fazerReserva($id_espaco,$id_usuario,$pessoas,$data,$horario);
            if ($resultado == 2){
                header("location: ../../src/pages/agendar/index.php?id_espaco=$id_espaco&erro_dataAntiga");

            }

            else if ($resultado == 1){
                header("location: ../../src/pages/agendar/index.php?id_espaco=$id_espaco&erro_reservaExistente");
                // header("location: ../../src/pages/home/index.php?erro_reservaExistente");
            }
            else if ($resultado == 0){
                header("location: ../../src/pages/agendar/index.php?id_espaco=$id_espaco&sucesso");
            }

            break;
    }
    

}

?>



