<?php
include __DIR__ . "/../controller/userController.php";




session_start();

$controller = new userController();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET['id_espaco']) {
        case '1':
            if (isset($_POST['horarioSelecionado']) && !empty($_POST['horarioSelecionado'])) {

              
                $dia = $_POST['dia_semana'];
                $dia = date('Y-m-d', strtotime('next '.$dia));
                $data = $_POST['horarioSelecionado'];
                $data = strval($data);
                $data = $dia . " " . $data;
                $id_usuario = $_SESSION['id_usuario'];
                $id_espaco = $_GET['id_espaco'];
                $adicionar =$controller->adicionarReserva($id_usuario, $id_espaco ,$data);
                if ($adicionar == 1){
                        header("location: ../../src/pages/agendar/agendar.php?falha");
                }
                else{
                    header("location: ../../src/pages/agendar/agendar.php?sucesso");
                }
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



