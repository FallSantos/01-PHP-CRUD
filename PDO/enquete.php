<?php
/**
 * User: FALL
 * Date: 19/09/2018
 * Time: 22:27
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
    <title></title>

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
    <form id="formE" name="formE" action="controller/ControllerEnquete.php" method="post">
        Você gostou do curso?<br/>
        <input type="radio" name="radio" value="sim" required>SIM<br/>
        <input type="radio" name="radio" value="nao" required>NÂO<br/>
        <input type="submit" value="Votar"/>
    </form>
</div>
<hr/>
<div class="content">
    <?php
        include_once "class/ClassCrud.php";
        $crud = new ClassCrud();
        $bSim = $crud->select("*", "enquete", "WHERE voto = ?", array("sim"));
        $bNao = $crud->select("*", "enquete", "WHERE voto = ?", array("nao"));

        $sim = $bSim->rowCount();
        $nao = $bNao->rowCount();

        echo "{$sim} - votaram SIM.<br/>";
        echo "{$nao} - votaram NÃO.";
    ?>
</div>
<?php
include_once ("includes/footer.php");
?>
</body>
</html>
