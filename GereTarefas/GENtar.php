<?php
include('conexao.php');

if(isset($_POST['status']) & isset($_POST['id'])){
    $sta = $_POST['status'];
    $ID  = $_POST['id'];

    if(isset($_POST['editar'])){

        $query = "DELETE from tarefas where tar_codigo = $ID";

    }elseif(isset($_POST['excluir'])){
        
        $query = "UPDATE  from tarefas where tar_codigo = $ID";

    }
    
    echo("sta: ".$sta." ID: ".$ID." exluir: ".$exc." editar: ".$edi);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        .tar{
            display: inline-block;
            margin: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>SENAI</h1>
    </header>
    <nav>
        <h2>Gerenciamento de Tarefas</h2>
        <div >
            <a href="CADusu.php">Cadastro de usuario</a>
            <a href="CADtar.php">Cadastro de tarefas</a>
            <a href="GENtar.php">Gerenciamento de tarefas</a>
        </div>
    </nav>
    <section>
        <?php

            $sql = "SELECT t.tar_codigo, t.tar_setor, t.tar_prioridade, t.tar_descricao, t.tar_status, u.usu_nome
                    FROM tarefas t, usuarios u
                    where t.usu_codigo = u.usu_codigo";

            $resultado = mysqli_query($conn,$sql);

            while($r = mysqli_fetch_assoc($resultado)){
                $id  = $r['tar_codigo'];
                $set = $r['tar_setor'];
                $pri = $r['tar_prioridade'];
                $des = $r['tar_descricao'];
                $est = $r['tar_status'];
                $nom = $r['usu_nome'];
                echo ("
                    <div class=\"tar\">
                        <form action=\"GENtar.php\" method=\"POST\">
                            <input type=\"hidden\" name=\"id\" value=\"$id\">
                            <label><strong>Setor: </strong>$set</label><br>
                            <label><strong>Prioridade: </strong>$pri</label><br>
                            <label><strong>Descrição: </strong>$des</label><br>
                            <label><strong>Usuario: </strong>$nom</label><br>
                            <label><strong>Estatos: </strong>$est</label><br>
                            <select name=\"status\">
                                <option value=\"Á fazer\">Á fazer</option>
                                <option value=\"Fazendo\">Fazendo</option>
                                <option value=\"Concluido\">Concluido</option>
                            </select><br>
                            <input type=\"submit\" name=\"editar\" value=\"Editar\">
                            <input type=\"submit\" name=\"excluir\" value=\"Excluir\">
                        </form>
                    </div>
                ");
            }
        
        ?>
        
    </section>
</body>
</html>