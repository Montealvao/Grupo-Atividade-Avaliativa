<?php

use function PHPSTORM_META\type;

include_once __DIR__ . "/../db/database.php";

class reservaController{
    private $coon;

    public function __construct(){
        $banco_dados = new Database();
        $this->coon = $banco_dados->connect();
    }
    public function fazerReserva($id_espaco,$id_usuario,$pessoas,$data,$horario){
        try{
            $sql = "SELECT capacidade FROM espacos WHERE id = :id_espaco";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id_espaco",$id_espaco);
            $db->execute();
            $capacidade_total = $db->fetchColumn();
            echo $capacidade_total;
            echo "<br>";
            echo $pessoas;

            if ($pessoas > $capacidade_total){
                echo "<br>Capacidade total atingida";
                return "<br>Capacidade total atingida";
            }

            $data_obj = DateTime::createFromFormat('d-m-Y', $data); //<-- funciona, não mexe!!
            $data_formatada = $data_obj->format('Y-m-d');           // eu sei oq é? não. ass:Celestiinoo.
            echo "<br>";
            echo $data_formatada;
            echo "<br>";
            echo $horario;
            echo "<br>";
            $data_horario = $data_formatada. " " . $horario;
            echo $data_horario;

            $sql = "SELECT COUNT(*) FROM reservas 
            INNER JOIN espacos 
            ON espacos.id = reservas.id_espaco 
            WHERE reservas.id_espaco = :id_espaco and reservas.data = :data_horario";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id_espaco",$id_espaco);
            $db->bindParam(":data_horario",$data_horario);
            $db->execute();
            $reservaExistente = $db->fetchColumn();

            if ($reservaExistente>0){   
                echo "Espaço já reservado";  
                return 1;
            }

            else{

                $sql = "INSERT INTO reservas  VALUES (default,:id_usuario, :id_espaco, :data_horario)";
                $db = $this->coon->prepare($sql);
                $db->execute([
                    ":id_usuario"=> $id_usuario,
                    ":id_espaco"=> $id_espaco,
                    ":data_horario"=>$data_horario,
                ]);
                echo "Reserva feita";
                return 0;
            }

            


            



        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }





}