<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>
    <a href="index.php"> Listar</a>
    <a href="cadastro.php">Cadastrar</a>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['exercise']) && !empty($dados['serie']) && !empty($dados['avg_weight'])) {
        var_dump($dados);
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