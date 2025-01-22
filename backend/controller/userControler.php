<?php

include __DIR__ . "/../db/database.php";

class userController{
    private $coon;

    public function __construct(){
        $dbase = new Database();
        $this->coon = $dbase->connect();
    }

    public function getAlluser(){
        try {
            $sql = "SELECT * FROM usuarios";
            $db = $this->coon->prepare($sql);
            $db->execute();
            $user = $db->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function CreateUser($nome,$email,$senha,$telefone){
        try {
            $sql = "INSERT INTO usuarios(nome,email,senha,telefone) VALUES(:nome,:email,:senha,:telefone)";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":telefone",$telefone);
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {

        }
    }        

    public function getUserById($id){
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id",$id);
            $db->execute();
            $user = $db->fetch(PDO::FETCH_ASSOC);
            if($user){
                return $user;
            }else{
                return false;
            }
        } catch (\Throwable $th) {

        }
    }        

    public function UserUpdate($id, $nome,$senha,$email,$telefone){
        try {
            $sql = "UPDATE users SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":telefone",$telefone);
            $db->bindParam(":id",$id);
            if($db->execute()){
                return true;
            }else{
                return false;
            }
            
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    } 
    
    public function deleteUser($id){
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id",$id);
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    } 

    public function getRoomById($id){
        try {
            $sql = "SELECT * FROM espacos WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id",$id);
            $db->execute();
            $id_room = $db->fetch(PDO::FETCH_ASSOC);
            if($id_room){
                return $id_room;
            }else{
                return false;
            }
        } catch (\Throwable $th) {

        }
    }    
    
    
    public function adicionarReserva($id_usuario,$id_espaco,$data){
        try{
            // verificar se já existe uma reserva

            $sql = "SELECT COUNT(*) FROM reservas WHERE id_espaco = :id_espaco  AND data = :data";
            $db = $this->coon->prepare($sql);
            //$db->bindParam(":id_espaco",$id_espaco);
            //$db->bindParam(":data",$data);
            $db->execute([
                ":id_espaco" => $id_espaco,
                ":data" => $data,
            ]);
            $reservaExistente = $db->fetchColumn();
            if ($reservaExistente>0){
                echo "ja existe uma reserva no espaco e horario";
            }


            else{
                //ISERT NA TABELA RESERVA
                $sql = "INSERT INTO reservas  VALUES (default,:id_usuario, :id_espaco, :data)";
                $db = $this->coon->prepare($sql);
                //$db->bindParam(":id_usuario", $id_usuario);
                //$db->bindParam(":id_room", $id_room);
                //$db->bindParam(":data", $data);
                $db->execute([
                    ":id_usuario"=> $id_usuario,
                    ":id_espaco"=> $id_espaco,
                    ":data"=>$data,
                ]);
                echo "reserva inserida com susseso";
            }


            }
        catch (\Throwable $th) {
            echo $th->getMessage();
        }

        }

    public function verTodasAsReservas(){
        try {
            $sql = "SELECT espacos.nome, reservas.data FROM espacos INNER JOIN reservas WHERE reservas.id_espaco = espacos.id";
            $db = $this->coon->prepare($sql);
            $db->execute();
            $reservas = $db->fetchAll(PDO::FETCH_ASSOC);
            return $reservas;
        } catch (\Throwable $th) {
            //throw $th;
        }
    
    }

  




}



