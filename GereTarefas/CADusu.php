<?php

include ('conexao.php');

if (isset($_POST['nome']) & isset($_POST['email'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $query = "INSERT into usuarios(usu_nome, usu_email) values ('$nome','$email');";

    mysqli_query($conn, $query);

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
    <section>
        <form action="CADusu.php" method="post">

            <label for="">Nome:</label><br>
            <input type="text" name="nome"><br>

            <label for="">Email:</label><br>
            <input type="text" name="email"><br>

            <input type="submit" value="Cadastrar">
        </form>
    </section>
</body>

</html>