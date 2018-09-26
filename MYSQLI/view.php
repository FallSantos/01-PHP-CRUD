<?php
/**
 * User: FALL
 * Date: 20/08/2018
 * Time: 00:01
 */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="index, follow"/>
    <meta name="author" content="Fall Santos"/>
    <title>PDO</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href=""/>
</head>
<body>
    <div class="content">
        <?php
            include_once ('class/ClassCrud.php');

            $idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

            $crud = new ClassCrud();

            $bfetch = $crud->select(
                "*",           # Campos
                "pessoa",      # Tabela
                "WHERE id = ?",# Condição
                "i",
                array(         # parâmetros
                    $idUser # <<<<<<<<<<<<<<
                )
            );

            $result = $bfetch->fetch_all();

            foreach ($result as $fetch):
        ?>
        <h1>Dados do usuário</h1> <a href="select.php" class="back"><</a>
        <hr/>
        <table>
            <tr>
                <td><strong>Nome:</strong></td><td><?php echo $fetch[1];?></td>
            </tr>
            <tr>
                <td><strong>Sexo:</strong></td><td><?php echo $fetch[2];?></td>
            </tr>
            <tr>
                <td><strong>Cidade:</strong></td><td><?php echo $fetch[3];?></td>
            </tr>
        </table>
        <?php endforeach; ?>
    </div>
</body>
</html>
