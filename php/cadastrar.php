<?php

require "conexao.php";


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../home/cadastro_morador.html");
    exit;
}


$nome     = trim($_POST["nome"] ?? "");
$endereco = trim($_POST["endereco"] ?? "");
$email    = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");


$placa = strtoupper(trim($_POST["placa"] ?? ""));


if (empty($nome) || empty($endereco) || empty($email) || empty($telefone)) {
    die("Preencha todos os campos obrigatórios. <a href='../home/cadastro_morador.html'>Voltar</a>");
}


if (empty($placa)) {
    $placa = null;
}


$stmt = $conexao->prepare(
    "INSERT INTO moradores (nome, endereco, email, telefone, placa) VALUES (?, ?, ?, ?, ?)"
);


$stmt->bind_param("sssss", $nome, $endereco, $email, $telefone, $placa);


if ($stmt->execute()) {
    echo "Morador cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}
?>


<br><br>
<a href="../home/cadastro_morador.html">Cadastrar outro</a> |
<a href="../home/lista.php">Ver moradores</a>



