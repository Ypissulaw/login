<?php
require('bancoConfig.php');

    if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];

    //pega minha strig e converte em array associativo...
    $sql = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        echo "Registro deletado com sucesso.";
    } else {
        echo "Nenhum registro encontrado para deletar.";
    }
} else {
    echo "ID inválido ou método não permitido.";
}

require('return.php');
?>
