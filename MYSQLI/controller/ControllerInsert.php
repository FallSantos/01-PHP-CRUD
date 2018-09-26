<?php
/**
 * Created by PhpStorm.
 * User: FALL
 * Date: 17/08/2018
 * Time: 09:03
 */

include ("../includes/variables.php");
include ("../class/ClassCrud.php");

//echo "ID: {$id}<br/>Nome: {$nome}<br/>Sexo: {$sexo}<br/>Cidade: {$cidade}";

$crud = new ClassCrud();

if($action == "insert")
{
    $crud->insert(
        "pessoa",
        "?,?,?,?",
        "isss", # Tipos
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
        "sssi", # Tipos
        array(
            $nome,
            $sexo,
            $cidade,
            $id
        )
    );

    echo "Cadastro atualizado com sucesso!";
}





