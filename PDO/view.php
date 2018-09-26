<?php
/**
 * User: FALL
 * Date: 19/08/2018
 * Time: 23:28
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
    <title>View</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href=""/>
</head>
<body>
<div class="content">
    <?php
        include_once ("class/ClassCrud.php");

        $idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $crud = new ClassCrud();

        $bfetch = $crud->select(
            "*",
            "pessoa",
            "WHERE id=?",
            array(
                $idUser
            )
        );
        $fetch = $bfetch->fetch(PDO::FETCH_ASSOC);

    ?>
    <h1>Dados do usuário</h1>
    <hr/>
    <table>
        <tr>
            <td><strong>ID:</strong></td><td><?php echo $fetch['id']; ?></td>
        </tr>
        <tr>
            <td><strong>Nome:</strong></td><td><?php echo $fetch['nome']; ?></td>
        </tr>
        <tr>
            <td><strong>Sexo:</strong></td><td><?php echo $fetch['sexo']; ?></td>
        </tr>
        <tr>
            <td><strong>Cidade:</strong></td><td><?php echo $fetch['cidade']; ?></td>
        </tr>
    </table>

</div>
</body>
</html>

