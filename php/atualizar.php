<?php

require "conexao.php";


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../home/lista.php");
    exit;
}


$id       = (int)($_POST["id"] ?? 0);
$nome     = trim($_POST["nome"] ?? "");
$endereco = trim($_POST["endereco"] ?? "");
$email    = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$placa = strtoupper(trim($_POST["placa"] ?? ""));


if ($id <= 0 || empty($nome) || empty($endereco) || empty($email) || empty($telefone)) {
    die("Dados inválidos. <a href='../home/lista.php'>Voltar</a>");
}


if (empty($placa)) {
    $placa = null;
}


$stmt = $conexao->prepare(
    "UPDATE moradores SET nome = ?, endereco = ?, email = ?, telefone = ?, placa = ? WHERE id = ?"
);


$stmt->bind_param("sssssi", $nome, $endereco, $email, $telefone, $placa, $id);


if ($stmt->execute()) {
    echo "Morador atualizado com sucesso!";
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>


<br><br>
<a href="../home/lista.php">Voltar para a lista</a>
