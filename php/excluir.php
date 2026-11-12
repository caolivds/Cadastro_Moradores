<?php

require "conexao.php";


$id = (int)($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: ../home/lista.php");
    exit;
}


$stmt = $conexao->prepare("DELETE FROM moradores WHERE id = ?");


$stmt->bind_param("i", $id);


if ($stmt->execute()) {
    
    header("Location: ../home/lista.php");
    exit;
} else {
    echo "Erro ao excluir: " . $stmt->error;
}
?>

<br><br>
<a href="../home/lista.php">Voltar para a lista</a>
