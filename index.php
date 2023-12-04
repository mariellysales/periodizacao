<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Exercícios</title>
</head>

<body>
    <a href="index.php"> Listar</a>
    <a href="cadastro.php">Cadastrar</a><br>
    <hr>

    <?php
    if (isset($_GET['mensagem']) && $_GET['mensagem'] === 'UsuarioApagado') {
        echo "Usuário apagado com sucesso!<br><hr>";
    }
    try {
        $query_exercise = "SELECT id, exercise, serie, avg_weight, created_at, updated_at FROM training ORDER BY id DESC";
        $result_exercise = $conn->prepare($query_exercise);
        $result_exercise->execute();

        while ($row_exercise = $result_exercise->fetch(PDO::FETCH_ASSOC)) {
            extract($row_exercise);
            echo  "ID: $id <br>";
            echo  "Exercício: $exercise <br>";
            echo  "Séries: $serie <br>";
            echo  "Peso médio: $avg_weight <br>";
            echo  "Criado em: $created_at <br>";

            if (!empty($updated_at)) {
                echo  "Editado em: $updated_at <br>";
            }

            echo "<a href='editar.php?id=$id'>Editar</a><br>";
            echo "<a href='apagar.php?id=$id'>Apagar</a><br><hr>";
        }
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage() . '';
    }
    ?>


</body>

</html>