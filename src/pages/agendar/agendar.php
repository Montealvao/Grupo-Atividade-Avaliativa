<?php

session_start();
include __DIR__ . "/../../../backend/controller/userControler.php";

$controller = new userController();

$controller ->getRoomById(1);


$controller->adicionarReserva(1,1,"2025-10-10 15:00:00");

$reservas = $controller->verTodasAsReservas();





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./agendar.css">
</head>
<body>
    <h1>AGENDAR PAGINA</h1>
    <form action="../../../backend/router/loginRouter.php?action=validarsessao" method="POST">
        <p>agendar horario</p>
        <button>AGENDAR BUTAO</button>
    </form>
    
    
    




    <form action="">


        <div>
            <h2>
                <h3>MACDONALDS</h3>
                    <select name="selectHorarios" id="">
                        <option value="">1:30</option>
                        <option value="">3:30</option>
                        <option value="">5:30</option>
                    </select>
                    

                    <table>
                        <thead>
                            <tr>
                                <td>horario</td>
                                <td>espaco</td>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                $i=1;
                            foreach($reservas as $item){
                                ?>
                                <tr>
                                    <td> <?php  echo $item["nome"]  ?>    </td>
                                    <td> <?php  echo $item["data"]  ?>    </td>
                                    <td> <?php  echo $i+=1?>    </td>
                                    <td>  </td>

                                </tr>
                           <?php } ?>
                        </tbody>


        
                        
                    
                    
                </table>


                <p>
                    <button> RESERVAR </button>
                </p>
            </h2>
        </div>
    </form>

    

</body>
</html> 