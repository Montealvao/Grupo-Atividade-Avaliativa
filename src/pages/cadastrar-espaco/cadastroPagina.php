<?php 
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] !=1){
        header("location: ../home/index.php");
        exit();
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $controller = new userController();
    
   
    $espacos = $controller->listarEspacoCadastrado();


if (isset($_GET['erroNomeIgual'])){
    echo "<script>alert('Erro nome igual a outro espaço')</script>";
}
else if (isset($_GET['deuCerto'])){
    echo "<script>alert('Espaço cadastrado')</script>";
}
else if (isset($_GET['erroSemNome'])){
    echo "<script>alert('Erro nome vazio')</script>";
}
else if (isset($_GET['erroCapacidadeNula'])){
    echo "<script>alert('Erro capacidade não inserida')</script>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Lista de Usuários</title>
</head>
<body>
    <header>
        <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
            <h2><a style="text-decoration: none;  color:white;" href="../perfil/perfil.php">Perfil</a></h2>
        <h2><a style="text-decoration: none;  color:white;" href="../lista-usuarios/index.php">Lista</a></h2>
        <h2><a style="text-decoration: none;  color:white;" href="../editarEspaco/editarEspaco.php">Editar</a></h2>
        </div>
        <h2><a style="text-decoration: none; color: white;" href="../perfil/logout.php">Logout</a></h2>  
    </header>    
    <main>


        <div class="cadastroEspaco">
            <form action="../../../backend/router/reservaRouter.php?action=cadastrarEspaco" method="POST">
                <h2>Cadastrar novo espaço:</h2>
                <div class="form-group">
                    <label for="nome">Nome do Espaço:</label>
                    <input type="text" id="nome" name="nome_espaco" required>
                </div>
                <div class="form-group">
                    <label for="nome">Capacidade:</label>
                    <input type="text" id="nome" name="capacidade" required>
                </div>
                <div class="form-group">
                    <label for="nome">Descrição:</label>
                    <input type="text" id="nome" name="descricao" required>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
            </form>
            
        </div>
        
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Capacidade</td>
                        <td>Descrição</td>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach($espacos as $item){
                        
                        echo "
                        <tr>
                            <td data-label='ID:'>{$item['id']}</td>
                            <td data-label='Nome:'>{$item['nome']}</td>
                            <td data-label='Capacidade:'>{$item['capacidade']}</td>
                            <td data-label='Descrição:'>{$item['descricao']}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
</main>
</body>
</html>