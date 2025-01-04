<?php
require('bancoConfig.php');

$method=strtolower($_SERVER['REQUEST_METHOD']);
if($method==='get'){

    $sql=$pdo->query("SELECT * FROM produtos");
    if($sql->rowCount()>0){
        $data=$sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item){
            $array['result'][] = [
                'id'=>$item['id'],
                'nome'=>$item['nome'],
                'body'=>$item['body'],
                'estoque'=>$item['estoque'],
                'QuantMin'=>$item['QuantMin'],
            ];
        }

    }else{
        $array['error']='Tabela vazia.';
    }

}else{
    $array['error']='Metodo não aceito (Apenas get.)';
}
require('return.php');