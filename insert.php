<?php
require('bancoConfig.php');
$method=strtolower($_SERVER['REQUEST_METHOD']);
if($method==='post'){
    $nome=filter_input(INPUT_POST, 'nome');
    $body=filter_input(INPUT_POST, 'body');
    $estoque=filter_input(INPUT_POST, 'estoque');
    $QuantMin=filter_input(INPUT_POST, 'QuantMin');

    if($nome&&$body&&$estoque&&$QuantMin){
        $sql = $pdo->prepare("INSERT INTO produtos (nome,body,estoque,QuantMin) VALUES (:nome, :body, :estoque, :QuantMin)"); // prepare consulta
        $sql->bindValue(':nome', $nome); 
        $sql->bindValue(':body', $body); 
        $sql->bindValue(':estoque', $estoque); 
        $sql->bindValue(':QuantMin', $QuantMin); 
        $sql->execute();
    }else{
        $array['error']='Dados não definidos';
    }

}else{
    $array['error']='Metodo nao aceito (APENAS POST)';
}
require('return.php');