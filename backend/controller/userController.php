<?php

use function PHPSTORM_META\type;

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
    
    public function AtualizarFoto($id,$foto_perfil){
        try{   
            $sql = "UPDATE usuarios SET foto_perfil = :foto_perfil WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":foto_perfil", $foto_perfil);
            $db->bindParam(":id", $id);
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

    public function AtualizarUsuario($id, $nome,$email,$senha,$telefone){
        try {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->bindParam(":telefone",$telefone);
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

    public function getRoomById($id,$tipo){
        try {
            $sql = "SELECT * FROM espacos WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id",$id);
            $db->execute();
            $id_room = $db->fetch(PDO::FETCH_ASSOC);
            if($id_room and $tipo == "nome"){
                echo $id_room['nome'];
                return $id_room;
            }
            if($id_room and $tipo == "descricao"){
                echo $id_room['descricao'];
                return $id_room;
            }
            if($id_room and $tipo == "capacidade"){
                echo $id_room['capacidade'];
                return $id_room;
            }
            else{
                return false;
            }
        } catch (\Throwable $th) {

        }
    }    
    
    
    public function adicionarReserva($id_usuario,$id_espaco,$data){
        try{
            $sql = "SELECT COUNT(*) 
                FROM reservas 
                INNER JOIN espacos ON espacos.id = reservas.id_espaco 
                WHERE reservas.id_espaco = :id_espaco and reservas.data = :data";
            $db = $this->coon->prepare($sql);
            $db->execute([
                ":id_espaco" => $id_espaco,
                ":data"=> $data,
            ]);
            $reservaExistente = $db->fetchColumn();
            if ($reservaExistente>0){   
                echo "Espaço já reservado";  
                return 1;
            }
            else{

                $sql = "INSERT INTO reservas  VALUES (default,:id_usuario, :id_espaco, :data)";
                $db = $this->coon->prepare($sql);
                $db->execute([
                    ":id_usuario"=> $id_usuario,
                    ":id_espaco"=> $id_espaco,
                    ":data"=>$data,
                ]);
                return 0;
            }

            }
        catch (\Throwable $th) {
            echo $th->getMessage();
        }

        }

    public function verTodasAsReservasPorId($id_usuario){
        try {
            $sql = " SELECT reservas.data, espacos.nome, reservas.id FROM reservas INNER JOIN espacos ON reservas.id_espaco = espacos.id
 WHERE reservas.id_usuario = :id_usuario ORDER BY reservas.data ASC";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id_usuario", $id_usuario);
            $db->execute();
            $reservas = $db->fetchAll(PDO::FETCH_ASSOC);
            return $reservas;
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    
    
    public function cancelarReserva($id){
        try{
            $sql = "DELETE FROM reservas WHERE id = :id";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id", $id);
            $db->execute();
            }
            catch (\Throwable $th) {
                //throw $th;
            }
    }

    public function cadastrarEspaco($nome,$capacidade,$descricao){
        try{

            $sql = "SELECT COUNT(*) FROM espacos WHERE nome = :nome";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":nome", $nome);
            $db->execute();
            $quantidade = $db->fetchColumn();
            if ($quantidade>0){
                echo "Nome igual";
                return "erro_nome_igual";
            }
            else{
                $sql = "INSERT INTO espacos VALUES (default,:nome,:capacidade,:descricao)";
                $db = $this->coon->prepare($sql);
                $db->bindParam(":nome", $nome);
                $db->bindParam(":capacidade", $capacidade);
                $db->bindParam(":descricao", $descricao);
                $db->execute();
                }


            }


            catch (\Throwable $th) {
                //throw $th;
            }
    }

    public function listarEspacoCadastrado(){
        try{
            $sql = "SELECT * FROM espacos";
            $db = $this->coon->prepare($sql);
            $db->execute();
            $espacos = $db->fetchAll(PDO::FETCH_ASSOC);
            return $espacos;
        }
        catch (PDOException $e) {
            // Caso ocorra um erro
            echo "Erro ao listar espaços: " . $e->getMessage();
        }

    }          


    public function editarEspaco($id_espaco,$nome,$capacidade,$descricao = null){
        try{
            $sql = "UPDATE espacos 
            SET nome = :nome,
                capacidade = :capacidade, 
                descricao = :descricao 
            WHERE id = :id";

            $db = $this->coon->prepare($sql);
            $db->bindParam(":id", $id_espaco, PDO::PARAM_INT);
            $db->bindParam(":nome", $nome, PDO::PARAM_STR);
            $db->bindParam(":capacidade", $capacidade, PDO::PARAM_STR);
            $db->bindParam(":descricao", $descricao, PDO::PARAM_STR);
            $db->execute();
            if ($db->rowCount() > 0) {
                echo "Espaço atualizado com sucesso!";
                return "espacoAtualizado";
            } else {
                echo "<div class='teste'> Nenhuma alteração foi feita ou o espaço não existe </div>" ;
                return "erro";
            }
            } catch (PDOException $e) {
                echo "Erro ao editar o espaço: " . $e->getMessage();
            }
        }


    public function deletarEspaco($id_espaco){
        try{
            $sql = "DELETE FROM espacos WHERE id = :id_espaco";
            $db = $this->coon->prepare($sql);
            $db->bindParam(":id_espaco", $id_espaco, PDO::PARAM_INT);
            $db->execute();
    
            if ($db->rowCount() > 0) {
                echo "Espaço com ID $id_espaco deletado com sucesso.";
                return "sucesso";
            } else {
                echo "Erro ao tentar deletar o espaço com ID $id_espaco.";
                return "erroComId";
            }
        } catch (PDOException $e) {
            echo "Erro ao deletar espaço: " . $e->getMessage();
        }


        }

    }




