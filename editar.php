<?php
include_once './config.php';
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>

<body>
    <a href="index.php"> Listar</a>
    <a href="cadastro.php">Cadastrar</a><br>
    <hr>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['reg_training'])) {
        try {
            $query_up_exercise = "UPDATE training SET exercise=:exercise, serie=:serie, avg_weight=:avg_weight WHERE id=:id";
            $edit_up_exercise = $conn->prepare($query_up_exercise);
            $edit_up_exercise->bindParam(":id", $dados['id'], PDO::PARAM_INT);
            $edit_up_exercise->bindParam(':exercise', $dados['exercise'], PDO::PARAM_STR);
            $edit_up_exercise->bindParam(':serie', $dados['serie'], PDO::PARAM_INT);
            $edit_up_exercise->bindParam(':avg_weight', $dados['avg_weight'], PDO::PARAM_STR);
            $edit_up_exercise->execute();
            if ($edit_up_exercise->rowCount() > 0) {
                echo "Exercício editado com sucesso!<br><hr>";
                echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
            } else {
                echo "Nenhuma alteração realizada ou ID não encontrado.<br><hr>";
            }
        } catch (Exception $e) {
            echo "Erro:" . $e->getMessage();
        }
    }

    try {
        $query_exercise = "SELECT id, exercise, serie, avg_weight FROM training WHERE id=:id LIMIT 1";
        $edit_exercise = $conn->prepare($query_exercise);
        $edit_exercise->bindParam(':id', $id, PDO::PARAM_INT);
        $edit_exercise->execute();
        $row_edit_exercise = $edit_exercise->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $er) {
        echo "Erro:" . $er->getMessage();
    }
    ?>

    <form method="POST" action="">
        <p></p>
        <?php
        $id = "";
        if (isset($row_edit_exercise['id'])) {
            $id = $row_edit_exercise['id'];
        }
        ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php
        $exercise = "";
        if (isset($row_edit_exercise['exercise'])) {
            $exercise = $row_edit_exercise['exercise'];
        }
        ?>
        <label for="exercise">Exercício: </label>
        <input type="text" name="exercise" value="<?php echo $exercise; ?>" required><br><br>
        <?php
        $serie = "";
        if (isset($row_edit_exercise['serie'])) {
            $serie = $row_edit_exercise['serie'];
        }
        ?>
        <label for="serie">Séries: </label>
        <input type="text" name="serie" value="<?php echo $serie; ?>" required><br><br>
        <?php
        $avg_weight = "";

        if (isset($row_edit_exercise['avg_weight'])) {
            $avg_weight = $row_edit_exercise['avg_weight'];
        }
        ?>
        <label for="avg_weight">Peso médio: </label>
        <input type="text" name="avg_weight" value="<?php echo $avg_weight; ?>" required><br><br>
        <input type="submit" value="Cadastrar" name="reg_training">
    </form>
</body>

</html>