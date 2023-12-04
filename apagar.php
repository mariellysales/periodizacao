<?php
include_once './config.php';
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
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
    try {
        $query_exercise = "DELETE FROM training WHERE id=:id";
        $delete_exercise = $conn->prepare($query_exercise);
        $delete_exercise->bindParam(':id', $id, PDO::PARAM_INT);
        $delete_exercise->execute();

        if ($delete_exercise->rowCount() > 0) {
            header("Location: index.php?mensagem=UsuarioApagado");
            exit();
        } else {
            echo "Erro: usuário não apagado<br><hr>";
        }
    } catch (Exception $e) {
        echo "Erro:" . $e->getMessage() . "";
    }

    ?>
</body>

</html>