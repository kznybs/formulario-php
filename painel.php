<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel AçoMax</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: #f0f0f0; /* Fundo claro */
        }

        .painel {
            display: flex; /* Para layout flexível */
            flex-direction: column;
            height: 100vh; /* Altura total da tela */
        }

        .header {
            background: rgb(61, 60, 59); /* Cor do cabeçalho */
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px; /* Tamanho do texto */
        }

        .menu {
            background: rgb(90, 90, 89); /* Fundo do menu */
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px; /* Espaçamento */
        }

        .menu a {
            color: white; /* Cor do texto */
            text-decoration: none; /* Sem sublinhado */
            padding: 10px;
            transition: background 0.3s; /* Transição suave */
            border-radius: 5px;
        }

        .menu a:hover {
            background: #0a6c19; /* Cor ao passar o mouse */
        }

        .content {
            flex: 1; /* Ocupa o espaço restante */
            padding: 20px;
            background: #f0f0f0; /* Fundo claro */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Sombra */
            border-radius: 10px; /* Borda arredondada */
        }

        .actions {
            display: flex; /* Layout flexível */
            gap: 10px; /* Espaço entre botões */
        }

        .button {
            padding: 10px 20px;
            color: white;
            text-decoration: none; /* Sem sublinhado */
            border-radius: 5px; /* Borda arredondada */
            transition: background 0.3s;
        }

        .button.view-users {
            background: rgb(197, 94, 10); /* Cor para visualizar usuários */
        }

        .button.add-user {
            background: #0a6c19; /* Cor para adicionar usuário */
        }

        .button:hover {
            background: #0206fb; /* Cor ao passar o mouse */
        }

        .logout {
            background: #d9534f; /* Cor para logout */
            padding: 10px 20px;
            color: white;
            text-decoration: none; /* Sem sublinhado */
            border-radius: 5px;
            transition: background 0.3s;
        }

        .logout:hover {
            background: #c9302c; /* Cor ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="painel">
        <div class="header">
            Painel Administrativo AçoMax
        </div>
        
        <div class="menu">
            <span>Bem-vindo, <?php echo $_SESSION['nome']; ?>.</span>
            <a href="logout.php" class="logout">Sair</a>
        </div>
        
        <div class="content">
            <h2>Funções do Painel</h2>
            <div class="actions">
                <a href="users.php" class="button view-users">Administradores</a> 
                <!-- Alterado para redirecionar para 'formulario/sistema.php' -->
                <a onclick="window.location.href='formulario/sistema.php'" class="button add-user">Dados Funcionário</a> 
                <!-- Novo botão para acessar 'formulario/formulario.php' -->
                <a onclick="window.location.href='formulario/formulario.php'" class="button add-user">Cadastrar Funcionário</a>
            </div>
            <p>Neste painel você pode ver informações sobre administradores, ver os funcionários cadastrados, e cadastrar funcionários.</p>
        </div>
    </div>
</body>
</html>
