<?php
/**
 * User: FALL
 * Date: 19/09/2018
 * Time: 22:38
 */

include_once "../includes/variables.php";
include_once "../class/ClassCrud.php";

$crud = new ClassCrud();



if($radio != null){
    $crud->insert("enquete", "?,?", array($id, $radio));

    header("location:../enquete.php?ok");
}else{
    header("location:../enquete.php?no");
}
