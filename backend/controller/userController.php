<?php

include __DIR__ . "/../db/database.php";

class userController{
    private $coon;

    public function __construct(){
        $dbase = new Database();
        $this->coon = $dbase->connect();
    }

    public function PegarTodosUsuarios(){
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

    public function PegarUsuariosPorPagina($indiceInicial, $usuariosLimite){
        try {
            $sql = "SELECT * FROM usuarios LIMIT :indiceInicial, :usuariosLimite";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":indiceInicial", $indiceInicial, PDO::PARAM_INT);
            $db->bindParam(":usuariosLimite", $usuariosLimite, PDO::PARAM_INT);
            $db->execute();
            $user = $db->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function CriarUsuario($nome,$email,$senha,$telefone){
        try {
            $sql = "INSERT INTO usuarios(nome,email,senha,telefone) VALUES(:nome,:email,:senha,:telefone)";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":telefone",$telefone);
            if($db->execute()){
                return ['id' => $this->coon->lastInsertId()];
            }else{
                return false;
            }
        } catch (\Throwable $th) {

        }
    }        

    public function PegarUsuarioPorId($id){
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

    public function AtualizarUsuario($id, $nome,$email,$senha,$telefone){ ##colocar $foto_perfil = null
        try {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE id = :id";
            // if ($foto_perfil){
            //     $sql .= ", foto_perfil = :foto_perfil";
            // }
            // $sql .= "WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":telefone",$telefone);
            // if ($foto_perfil){
            //     $db->bindParam(":foto_perfil", $foto_perfil);
            // }
            $db->bindParam(":id",$id);
            if($db->execute()){
                return true;
            }else{
                echo "Erro ao executar a atualização";
                return false;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    } 
    
    public function ApagarUsuario($id){
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
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

}