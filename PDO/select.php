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
    include_once ("class/ClassCrud.php");
?>

<div class="content">
    <table class="tableList">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Estrutura de loop -->
            <?php
                $crud = new ClassCrud();

                $idUser = 1;

                $bFetch = $crud->select(
                    "*",      # Campos
                    "pessoa", # Tabela
                    "",       # Condição -> Ex: WHERE id = ?
                    array()
                );

                while ($fetch = $bFetch->fetch(\PDO::FETCH_ASSOC))
                {
            ?>
                <tr>
                    <td><?php echo $fetch['nome']; ?></td>
                    <td><?php echo $fetch['sexo']; ?></td>
                    <td><?php echo $fetch['cidade']; ?></td>

                    <td>
                        <ul>
                            <li>
                                <a href="<?php echo "view.php?id={$fetch['id']}"; ?>"><img src="img/view.svg" alt="Visualizar"></a>
                            </li>
                            <li>
                                <a href="<?php echo "insert.php?id={$fetch['id']}"; ?>"><img src="img/edit.svg" alt="Editar"></a>
                            </li>
                            <li>
                                <a class="deletar" href="<?php echo "controller/ControllerDelete.php?id={$fetch['id']}"; ?>"><img src="img/delete.svg" alt="Alterar"></a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once ("includes/footer.php");
?>
<script src="js/javascript.js"></script>
<script src="js/zepto.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    /* Confirmar antes de deletar os dados */
    $('.deletar').on('click',function (event) {
        event.preventDefault();

        var link = $(this).attr('href');

        if(confirm("Deseja mesmo deletar este registro?")){
            window.location.href = link;
        }else{
            return false;
        }
    });
</script>
</body>
</html>
