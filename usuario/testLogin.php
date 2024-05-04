<?php
session_start();
include_once('config.php'); // Conexão com o banco de dados

if (!isset($_SESSION['user_id'])) {
    echo "Sessão inválida. Redirecionando para login...";
    header('Location: login.php');
    exit; // Certifique-se de usar 'exit' para interromper a execução
}

// Verificação do ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta ao banco de dados para verificar se o usuário existe
$sql = "SELECT * FROM usuario WHERE id = $user_id";
$result = $conexao->query($sql);

if ($result === false) {
    echo "Erro ao consultar o banco de dados. Verifique a conexão.";
    exit;
}

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado! Redirecionando para login...";
    header('Location: login.php');
    exit;
}

$logado = $user['nome'];
?>
