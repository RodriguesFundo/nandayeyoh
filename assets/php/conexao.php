<?php
// Dados de conexão com o banco de dados
$servername = "localhost";
$database = "nandayeyoh";
$username = "root";
$password = "";

// Conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>
