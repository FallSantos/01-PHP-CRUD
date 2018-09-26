<?php
/**
 * User: FALL
 * Date: 16/09/2018
 * Time: 11:10
 */

include_once ("../includes/variables.php");
include_once ("../class/ClassCrud.php");

$crud = new ClassCrud();

if($action == 'insert')
{
    $crud->insert(
        "pessoa",
        "?,?,?,?",
        array(
            $id,
            $nome,
            $sexo,
            $cidade
        )
    );

    echo "Cadastro realizado com sucesso!";
}
else
{
    $crud->update(
        "pessoa",
        "nome = ?, sexo = ?, cidade = ?",
        "id = ?",
        array(
            $nome,
            $sexo,
            $cidade,
            $id
        )
    );

    echo "Cadastro atualizado com sucesso!";
}



