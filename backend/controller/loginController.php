<?php

include __DIR__ . "/../db/database.php";


class LoginController{
    private $conn;
    
    public function __construct(){
        $banco = new Database();
        $this->conn = $banco->connect();
    }

    public function  ValidarLogin($email,$senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $db = $this->conn->prepare($sql);
        $db->bindParam(":email",$email);
        $db->bindParam(":senha",$senha);
        echo $db->execute();
        $usuario = $db->fetchAll();


        if ($usuario){
            session_start();
            $_SESSION["id_usuario"] = $usuario[0]["id"];
            return true;
        }
        else{
            return false;
        }


    }

}
