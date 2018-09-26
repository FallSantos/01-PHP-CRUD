
<?php
    include_once("../class/ClassCrud.php");

    $crud = new ClassCrud();

    $idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

    $crud->delete(
        "pessoa",
        "id = ?",
        array(
            $idUser
        )
    );

    echo "Dado deletado com sucesso!";


