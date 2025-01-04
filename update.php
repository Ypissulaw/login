<?php
require('bancoConfig.php');
$method=strtolower($_SERVER['REQUEST_METHOD']);
if($method==='put'){
    parse_str(file_get_contents('php://input'),$input);



        $id=$input['id']??null;
        $nome=$input['nome']??null;
        $body=$input['body']??null;
        $estoque=$input['estoque']??null;
        $QuantMin=$input['QuantMin']??null;

        $id=filter_var($id);
        $nome=filter_var($nome);
        $body=filter_var($body);
        $estoque=filter_var($estoque);
        $QuantMin=filter_var($QuantMin);

        if($id && $nome && $body && $estoque && $QuantMin){
            $sql=$pdo->prepare("UPDATE produtos SET nome=:nome, body=:body, estoque=:estoque, QuantMin=:QuantMin WHERE id=:id"); //PREPARA PARA CUNSULTAR produtos QUANDO ID = ID FORNECIDO PELA URL
            $sql->bindValue(':id', $id); //ID DA CONSULTA == ID USER. assim ninguem add id inexsistente
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':body', $body);
            $sql->bindValue(':estoque', $estoque);
            $sql->bindValue(':QuantMin', $QuantMin);
            $sql->execute();

            
            if($sql->rowCount()>0){

                $array['result'] = [
                    'id' => $id, 
                    'nome' => $nome, 
                    'body' => $body, 
                    'estoque' => $estoque, 
                    'Qu antMin' => $QuantMin, 
                    ]; 
                } else 
                { $array['error'] = 'Nenhuma alteração realizada ou produto não encontrado.'; 
            } } else { $array['error'] = 'Parâmetros incompletos ou incorretos.'; 
        } } else { $array['error'] = 'Método não aceito (APENAS PUT).'; 
    } require('return.php'); ?>