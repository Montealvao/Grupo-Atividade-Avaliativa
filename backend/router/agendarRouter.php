<?php
include __DIR__ . "/../controller/userController.php";




session_start();

$controller = new userController();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET['id_espaco']) {
        case '1':
            if (isset($_POST['horarioSelecionado']) && !empty($_POST['horarioSelecionado'])) {

                $dataAmanha = date('Y-m-d ', strtotime('+1 day'));
                $data = $_POST['horarioSelecionado'];
                $data = strval($data);

                $data = $dataAmanha . $data;
                $id_usuario = $_SESSION['id_usuario'];
                $id_espaco = $_GET['id_espaco'];
                $controller->adicionarReserva($id_usuario, $id_espaco ,$data);
                header("location: ../../src/pages/agendar/agendar.php?sucesso");
            }
            break;


    }

}


// if ($_SERVER["REQUEST_METHOD"] == "POST"){
//     switch ($_GET['action']) {
//         case 'removerReserva':
//             echo $_POST["nome_espaco"];


//     }

// }


?>



