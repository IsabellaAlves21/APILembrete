<?php
 
require('./../config.php');
 
$metodo= strtoupper($_SERVER['REQUEST_METHOD']);
 
if ($metodo==='PUT') {
 
    parse_str(file_get_contents("php://input"),$put);
 
    $id = $put['id'] ?? null;
    $titulo = $put['titulo'] ?? null;
    $corpo = $put['corpo'] ?? null;
 
    //para proteger o id de colocarem letras//
    $id = filter_var($id,FILTER_VALIDATE_INT);
    $titulo = filter_var($titulo,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $corpo = filter_var($corpo,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //código delete
        if ($id && $titulo && $corpo) {
 
            $sql=$pdo->prepare("SELECT * FROM lembrete WHERE idLembrete=:id");
            $sql->bindValue(":id",$id);
            $sql->execute();
   
            if ($sql->rowCount()>0) {
       
                $sql = $pdo->prepare("UPDATE lembrete SET tituloLembrete=:titulo,corpoLembrete=:corpo WHERE idLembrete=:id");
                $sql->bindValue(":id", $id);
                $sql->bindValue(":titulo",$titulo);
                $sql->bindValue(":corpo",$corpo);
                $sql->execute();
               
                $array['result'] = [
                    "id" => $id,
                    "tituloLembrete" => $titulo,
                    "corpoLembrete" => $corpo
                ];
 
        }
        else {
            $array['error'] = "Erro: Id inexistente!";
        }
    } else {
 
        $array['error'] = "Erro: Parâmetros nulos ou inválidos!";
    }
 
} else {
    $array['error'] = "Erro: Ação inválida - método permitido apenas PUT";
}
 
require('./../return.php');