<?php
require('./../config.php');

$metodo = strtoupper($_SERVER{'REQUEST_METHOD'});

if ($metodo === 'DELETE') {
    parse_str(file_get_contents("php://input"),$delete);

    $id = $delete['id'] ?? null;
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if ($id) {
        //codigo delete

    }else {
        $array['error'] = 'Erro: Id Inválido!';
    }
} else {
    $array['error'] = 'Erro; Ação inválida - método permitido apenas DELETE';
}
require('./../return.php');