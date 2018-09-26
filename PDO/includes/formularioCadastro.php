<?php
/**
 * User: FALL
 * Date: 18/08/2018
 * Time: 10:42
 */

if(isset($_GET['id']))# Edição de cadastro
{
    include ("class/ClassCrud.php");

    $action = "update";

    $crud = new ClassCrud();
    $bfetch = $crud->select(
            "*",
            "pessoa",
            "WHERE id = ?",
            array(
                $_GET['id']
            )
    );
    $fetch = $bfetch->fetch(PDO::FETCH_ASSOC);

    $id     = $fetch['id'];
    $nome   = $fetch['nome'];
    $sexo   = $fetch['sexo'];
    $cidade = $fetch['cidade'];
}
else# Novo cadastro
{
    $action = "insert";

    $id     = "";
    $nome   = "";
    $sexo   = "";
    $cidade = "";
}
echo " - " . $action;
echo " - " . $id;
echo " - " . $nome;
echo " - " . $cidade;
echo " - " . $sexo;
?>

<table>
    <form name="formCadastro" class="formCadastro" id="formCadastro" action="controller/ControllerInsert.php" method="post">
        <input type="hidden" id="action" name="action" value="<?php echo $action; ?>"/>
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>

        <tr>
            <td>
                Nome:
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Sexo:
            </td>
        <tr>
        </tr>
        <td>
            <select name="sexo">
                <option value="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select>
        </td>
        </tr>
        <tr>
            <td>
                Cidade:
            </td>
        <tr>
        </tr>
        <td>
            <input type="cidade" name="cidade" id="cidade" value="<?php echo $cidade; ?>"/>
        </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="<?php echo $action; ?>"/>
            </td>
        </tr>
    </form>
</table>
