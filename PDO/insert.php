<?php
/**
 * User: FALL
 * Date: 14/08/2018
 * Time: 13:57
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
    <title>Cadastro</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href=""/>
</head>
<body>
    <?php
        include_once("includes/header.php");
    ?>

    <div class="result">
        <p>Cadastro realizado com sucesso!</p>
    </div>

    <div class="content">
        <div class="form">
            <h1>Cadastro</h1>
            <?php
                include ("includes/formularioCadastro.php");
            ?>
        </div>
    </div>

    <?php
        include_once ("includes/footer.php");
    ?>
    <script>

    </script>
</body>
</html>
