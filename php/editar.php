<?php

require "conexao.php";


$id = (int)($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: ../home/lista.php");
    exit;
}


$stmt = $conexao->prepare("SELECT id, nome, endereco, email, telefone, placa FROM moradores WHERE id = ?");
$stmt->bind_param("i", $id);   
$stmt->execute();

$resultado = $stmt->get_result();
$morador = $resultado->fetch_assoc();


if (!$morador) {
    die("Morador não encontrado. <a href='../home/lista.php'>Voltar</a>");
}


$semPlaca = empty($morador["placa"]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Morador</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <nav class="menu">
        <a href="../home/cadastro_morador.html">Cadastrar</a>
        <a href="../home/lista.php">Ver moradores</a>
    </nav>

    <div class="container">
        <h1>Editar Morador</h1>

        <form action="atualizar.php" method="POST">

           
            <input type="hidden" name="id" value="<?php echo $morador["id"]; ?>">

          
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $morador["nome"]; ?>" required>

            <label>Endereço (bloco/apto)</label>
            <input type="text" name="endereco" value="<?php echo $morador["endereco"]; ?>" required>

            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $morador["email"]; ?>" required>

            <label>Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?php echo $morador["telefone"]; ?>" required>

            <label>Placa do veículo</label>
            
            <input type="text" name="placa" id="placa" maxlength="7"
                   value="<?php echo $morador["placa"]; ?>"
                   <?php if ($semPlaca) { echo "disabled"; } ?>>

            
            <label class="opcao">
                <input type="checkbox" id="semVeiculo" <?php if ($semPlaca) { echo "checked"; } ?>>
                Não tenho veículo
            </label>

            <button type="submit">Salvar alterações</button>
        </form>
    </div>

   
    <script src="../js/morador_novo.js"></script>
</body>
</html>
