<?php

$db_servidor = 'localhost';
$db_database = 'apilembretesdb';
$db_usuario = 'Isabella';
$db_pwd = '99767isa';

$pdo = new PDO('mysql:host='.$db_servidor.';dbname='.$db_database,$db_usuario,$db_pwd);


$array =[
    'error'=>"",
    'result'=>[]
];

/* Meu Método
$arrayResult['result'] = [
    "hello"=>"world"
];


$arrayError['error'] = "Um erro ocorreu";

$combinedArray = array_merge($arrayResult, $arrayError);
echo json_encode($combinedArray);
*/


?>