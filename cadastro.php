<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>
    <a href="index.php"> Listar</a>
    <a href="cadastro.php">Cadastrar</a><br>
    <hr>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['reg_training'])) {
        try {
            $query_exercise = "INSERT INTO training (exercise, serie, avg_weight) VALUES (:exercise, :serie, :avg_weight)";
            $data_exercise = $conn->prepare($query_exercise);
            $data_exercise->bindParam(':exercise', $dados['exercise'], PDO::PARAM_STR);
            $data_exercise->bindParam(':serie', $dados['serie'], PDO::PARAM_INT);
            $data_exercise->bindParam(':avg_weight', $dados['avg_weight'], PDO::PARAM_STR);
            $data_exercise->execute();

            if ($data_exercise->rowCount() > 0) {
                echo "Exercício cadastrado com sucesso.<br><hr>";
            }
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
    ?>
    <form method="POST" action="">
        <label for="exercise">Exercício: </label>
        <input type="text" name="exercise" required><br><br>
        <label for="serie">Séries: </label>
        <input type="text" name="serie" required><br><br>
        <label for="avg_weight">Peso médio: </label>
        <input type="text" name="avg_weight" required><br><br>
        <input type="submit" value="Cadastrar" name="reg_training">
    </form>
</body>

</html>