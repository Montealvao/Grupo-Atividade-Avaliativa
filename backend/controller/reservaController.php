<?php

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

            if ($pessoas > $capacidade_total){
                echo "<br>Capacidade total atingida";
                return "<br>Capacidade total atingida";
            }

            else{

                $data_hoje = date("Y-m-d");
                echo "data de hoje: ",$data_hoje;
                if ($data<=$data_hoje){
                    echo "data invalida";
                    return 2;
                }

                else{

                    $data_horario = $data . " " . $horario;
                    echo "<br>data selecionada: ",$data;
                    echo "<br>data selecionada: ",$data_horario;
        
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
                }
            }

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }

}