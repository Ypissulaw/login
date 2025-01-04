<?php
require('bancoConfig.php');

$method = strtolower($_SERVER["REQUEST_METHOD"]);
if ($method === 'get') {
    $id = filter_input(INPUT_GET, 'id'); // valor da URL

    if ($id) { // SE ID FOI FORNECIDO
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id"); // prepare consulta
        $sql->bindValue(':id', $id); // ID DA CONSULTA == ID USER
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'][] = [
                'id' => $data['id'],
                'nome' => $data['nome'],
                'body' => $data['body'],
                'estoque' => $data['estoque'],
                'QuantMin' => $data['QuantMin'],
            ];
        } else {
            $array['error'] = 'Nenhum produto encontrado com esse ID.';
        }
    } else {
        $array['error'] = 'ID não reconhecido.';
    }
} else {
    $array['error'] = 'Método não aceito (Apenas GET).';
}

require('return.php');
?>
