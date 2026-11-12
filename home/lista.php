<?php

require "../php/conexao.php";


$resultado = $conexao->query("SELECT id, nome, endereco, email, telefone, placa FROM moradores");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Moradores</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <nav class="menu">
        <a href="cadastro_morador.html">Cadastrar</a>
        <a href="lista.php">Ver moradores</a>
    </nav>

    <div class="container">
        <h1>Moradores Cadastrados</h1>

        
        <?php if ($resultado->num_rows > 0) { ?>

            <table>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Placa</th>
                    <th>Ações</th>
                </tr>

                
                <?php while ($morador = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $morador["nome"]; ?></td>
                        <td><?php echo $morador["endereco"]; ?></td>
                        <td><?php echo $morador["email"]; ?></td>
                        <td><?php echo $morador["telefone"]; ?></td>

                        <td>
                            <?php
                            
                            if (!empty($morador["placa"])) {
                                echo $morador["placa"];
                            } else {
                                echo "Sem veículo";
                            }
                            ?>
                        </td>

                        <td>
                            
                            <a href="../php/editar.php?id=<?php echo $morador["id"]; ?>">Editar</a>

                            
                            <a href="../php/excluir.php?id=<?php echo $morador["id"]; ?>"
                               onclick="return confirm('Excluir este morador?');">Excluir</a>
                        </td>
                    </tr>
                <?php }  ?>
            </table>

        <?php } else { ?>

            
            <p>Nenhum morador cadastrado ainda.</p>

        <?php }  ?>
    </div>

</body>
</html>
