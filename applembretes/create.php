<?php
require('./../config.php');

$metodo = strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo === 'POST') {

    $titulo = filter_input(INPUT_POST,'titulo');
    $corpo = filter_input(INPUT_POST,'corpo');

    if ($titulo && $corpo) {
        $sql=$pdo->prepare("INSERT INTO lembrete (tituloLembrete,corpoLembrete) VALUES (:titulo,:corpo)");
        $sql->bindValue(':titulo',$titulo);
        $sql->bindValue(':corpo',$corpo);
        $sql->execute();
    } else {
        $array['error'] = 'Erro: Valores nulos ou inválidos!';
    }
} else {
    $array['error'] = 'Erro: Ação inválida - método permitido apenas POST';
}
require('./../return.php');

/* DESAFIOS para 07AGO

- Corrigir o problema com acentuação no retorno JSON - Problema de Encode
- Como faço para pegar o id do último item inserido na tabela através do PDO
- Como retornar um array(json) contendo os dados do último elemento inserido
*/
