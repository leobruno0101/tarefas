<?php

include('conexao.php');

if(isset($_POST['setor']) & isset($_POST['prioridade']) & isset($_POST['descricao']) & isset($_POST['usuario'])){
    $setor  = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $usuario = $_POST['usuario'];

    $query = "INSERT into tarefas(tar_setor, tar_prioridade, tar_descricao, tar_status, usu_codigo) 
              values ('$setor','$prioridade','$descricao','Á Fazer','$usuario');";

    mysqli_query($conn,$query);

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <header>
        <h1>SENAI</h1>
    </header>
    <nav>
        <h2>Gerenciamento de Tarefas</h2>
        <div>
            <a href="CADusu.php">Cadastro de usuario</a>
            <a href="CADtar.php">Cadastro de tarefas</a>
            <a href="GENtar.php">Gerenciamento de tarefas</a>
        </div>
    </nav>
    <form action="CADtar.php" method="post">

        <label for="">Setor:</label><br>
        <input type="text" name="setor"><br>

        <label for="">Prioridade:</label><br>
        <select name="prioridade">
            <option value="Baixo">Baixo</option>
            <option value="Médio">Médio</option>
            <option value="Alto">Alto</option>
        </select>
        <br>

        <label for="">Descrição:</label><br>
        <input type="text" name="descricao"><br>

        <label for="">usuario:</label><br>
        <select name="usuario">
            <?php
                $sql = "SELECT * from usuarios";

                $resultado = mysqli_query($conn,$sql);

                while($r = mysqli_fetch_assoc($resultado)){
                    $cod  = $r['usu_codigo'];
                    $nome = $r['usu_nome'];
                    echo ("<option value=\"$cod\">$nome</option>");
                }
            ?>
        </select>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>