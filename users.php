<?php

include('protect.php');

session_start();

// Conexão ao banco de dados
$host = 'localhost'; // Alterar conforme necessário
$user = 'id22093732_kznybs'; // Alterar conforme necessário
$password = '12345678a&A'; // Alterar conforme necessário
$dbname = 'id22093732_login'; // Alterar conforme necessário

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios"; // Consulta para obter todos os usuários
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Administradores</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f0f0; /* Fundo claro */
            margin: 0;
            padding: 20px; /* Espaço ao redor */
        }

        h2 {
            text-align: center; /* Centraliza o título */
            color: rgb(197, 94, 10); /* Cor do título */
        }

        p {
            text-align: center; /* Centraliza parágrafos */
        }

        a {
            text-decoration: none; /* Remove sublinhado */
            color: #d9534f; /* Cor do link "Sair" */
            font-weight: bold; /* Negrito */
        }

        a:hover {
            color: #c9302c; /* Cor ao passar o mouse */
        }

        table {
            width: 100%; /* Ocupa toda a largura */
            border-collapse: collapse; /* Remove espaços entre células */
            margin: 20px auto; /* Centraliza a tabela */
            background: white; /* Fundo branco */
            border-radius: 8px; /* Borda arredondada */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        th {
            background: rgb(197, 94, 10); /* Cor do cabeçalho da tabela */
            color: white; /* Cor do texto */
            padding: 10px; /* Espaçamento */
            text-align: left; /* Alinhamento à esquerda */
        }

        td {
            padding: 10px; /* Espaçamento */
            text-align: left; /* Alinhamento à esquerda */
            border-bottom: 1px solid #ddd; /* Borda inferior */
        }

        tr:hover {
            background: #f5f5f5; /* Cor ao passar o mouse nas linhas */
        }
    </style>
</head>
<body>
    <h2>AçoMax - Service</h2>
    <p>Bem-vindo ao painel, <?php echo $_SESSION['nome']; ?>.</p>
    <p>
        <a href="painel.php">Voltar</a>
    </p>

    <?php
    if ($result->num_rows > 0) {
        // Criação de uma tabela para exibir os usuários
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }

    $conn->close(); // Fecha a conexão com o banco de dados
    ?>
</body>
</html>
