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
        $hash = hash("sha256", $senha);
        $db->bindParam(":senha",$hash);
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

    public function RecuperarSenha($email,$senha){
        try {
            $sql = "UPDATE usuarios SET senha = :senha where email = :email";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":email",$email);
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
