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
    if (!empty($dados['exercicio']) && !empty($dados['serie']) && !empty($dados['peso_medio'])) {
        var_dump($dados);
    }

    ?>
    <form method="POST" action="">
        <label for="exercicio">Exercício: </label>
        <input type="text" name="exercicio" required><br><br>
        <label for="serie">Séries: </label>
        <input type="text" name="serie" required><br><br>
        <label for="peso_medio">Peso médio: </label>
        <input type="text" name="peso_medio" required><br><br>
        <input type="submit" value="Cadastrar" name="CadTreino">
    </form>
</body>

</html>