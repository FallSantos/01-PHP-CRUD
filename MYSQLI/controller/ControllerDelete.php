<?php
/**
 * User: FALL
 * Date: 20/08/2018
 * Time: 18:44
 */

include ("../includes/variables.php");# <<< NÃO ESQUECER***
include ("../class/ClassCrud.php");

$crud = new ClassCrud();

$crud->delete(
    "pessoa",
    "id = ?",
    "i",
    array(
        $id
    )
);

echo "Dados apagados com sucesso!";