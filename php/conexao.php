<?php

$servidor = "localhost";  // o MySQL está no seu próprio computador
$usuario  = "root";       // usuário padrão do XAMPP
$senha    = "";           // senha padrão do XAMPP é vazia
$banco    = "cadastro_moradores";       // nome do banco que criamos


$conexao = new mysqli($servidor, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}


$conexao->set_charset("utf8mb4");
