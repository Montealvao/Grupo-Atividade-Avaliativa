<?php
include __DIR__ . "/../controller/userController.php";
include __DIR__ . "/../controller/reservaController.php";




session_start();

$controller = new userController();

$reservaController = new reservaController();



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_espaco = $_GET['id_espaco'];
        switch ($_GET['id_espaco']) {
    //     case $id_espaco:
    //         if (isset($_POST['horarioSelecionado']) && !empty($_POST['horarioSelecionado'])) {

                
    //             $dia = $_POST['dia_semana'];
    //             $dia = date('Y-m-d', strtotime('next '.$dia));
    //             $data = $_POST['horarioSelecionado'];
    //             $data = strval($data);
    //             $data = $dia . " " . $data;
    //             $id_usuario = $_SESSION['id_usuario'];
    //             $id_espaco = $_GET['id_espaco'];
    //             $adicionar =$controller->adicionarReserva($id_usuario, $id_espaco ,$data);
    //             if ($adicionar == 1){
    //                     header("location: ../../src/pages/home/index.php?falha");
    //             }
    //             else{
    //                 header("location: ../../src/pages/home/index.php?sucesso");
    //             }
    //         }
    //         break;

        case $id_espaco:
            echo "caiu";
            $id_espaco = $_GET['id_espaco'];
            $id_usuario = $_SESSION['id_usuario'];
            $pessoas = $_POST['pessoas_selecionadas'];
            $data = $_POST['data_selecionada'];
            $horario = $_POST['horario_selecionado'];
            $resultado = $reservaController->fazerReserva($id_espaco,$id_usuario,$pessoas,$data,$horario);
            break;
            header("location: ../../src/pages/home/index.php?sucesso");

            
        
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



