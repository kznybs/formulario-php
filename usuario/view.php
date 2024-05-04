<?php
session_start(); // Inicia a sessão
include('config.php'); // Conecta ao banco de dados

// Verifica se o usuário está logado, se não, redireciona para o login
if (!isset($_SESSION['user_id'])) {
    header('Location: dist/login.php'); 
    exit; // Finaliza o script
}

// Obtem o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Verifica se o ID do usuário existe na tabela de usuários
$sql = "SELECT * FROM usuario WHERE id = $user_id"; // Use a tabela correta
$result = $conexao->query($sql);

if ($result->num_rows > 0) { // Se o usuário existe
    $user = $result->fetch_assoc(); // Obtem os dados do usuário
} else {
    echo "Usuário não encontrado!"; 
    exit; // Finaliza se não encontrar
}

$logado = $user['username']; // Nome do usuário logado
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>AçoMax - Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, rgb(149, 71, 7), rgb(149, 71, 7));
            color: white;
            text-align: center;
        }

        .table-bg {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search {
            display: flex;
            justify-content: center;
            gap: 0.1%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AçoMax - Service</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <a href="sair.php" class="btn btn-danger me-5">Sair</a> <!-- Botão para sair -->
            </div>
        </div>
    </nav>
    
    <br>
    <h1>Bem-vindo, <?php echo $logado; ?></h1> <!-- Saudações com o nome do usuário -->
    </div>

    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Data de Nascimento</th>
                    <th>Banco</th>
                    <th>Chave Pix</th>
                    <th>Endereço</th>
                    <th>Senha</th>
                    <th>Data da Criação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "<td>{$user['id']}</td>"; // Exibe ID
                echo "<td>{$user['username']}</td>"; // Nome de usuário
                echo "<td>{$user['cargo']}</td>"; // Cargo
                echo "<td>{$user['email']}</td>"; // Email
                echo "<td>{$user['telefone']}</td>"; // Telefone
                echo "<td>{$user['sexo']}</td>"; // Sexo
                echo "<td>{$user['data_nasc']}</td>"; // Data de nascimento
                echo "<td>{$user['banco']}</td>"; // Banco
                echo "<td>{$user['chave']}</td>"; // Chave Pix
                echo "<td>{$user['endereco']}</td>"; // Endereço
                echo "<td>{$user['password']}</td>"; // Senha (descriptografada)
                echo "<td>{$user['created_at']}</td>"; // Data de criação
                    echo "<td>
               <a class='btn btn-sm btn-primary' href='edit.php?id=$user[id]' title='Editar'>
    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
    </svg>
    </a> 
        </td>";
                ?>
            </tbody>
        </table>
    </div>

    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData(); // Chama a função searchData se o enter for pressionado
            }
        });

        function searchData() {
            window.location = 'view.php?search=' + search.value; // Busca por dados na página view.php
        }
    </script>
</body>
</html>
