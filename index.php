<?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Verifica se os campos 'email' ou 'senha' foram enviados pelo método POST
if (isset($_POST['email']) || isset($_POST['senha'])) {
    // Verifica se o campo 'email' está vazio
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu usuário"; // Mensagem de erro para o usuário
    // Verifica se o campo 'senha' está vazio
    } elseif (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha"; // Mensagem de erro para o usuário
    } else {
        // Escapa caracteres especiais para prevenir injeção de SQL
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Consulta SQL para verificar se existe um usuário com o email e senha fornecidos
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        // Obter a quantidade de linhas retornadas pela consulta
        $quantidade = $sql_query->num_rows;

        // Se um usuário foi encontrado, a autenticação é bem-sucedida
        if ($quantidade == 1) {
            // Obtém os dados do usuário
            $usuario = $sql_query->fetch_assoc();

            // Inicia a sessão, se não estiver iniciada
            if (!isset($_SESSION)) {
                session_start(); // Inicia uma nova sessão
            }

            // Armazena informações do usuário na sessão
            $_SESSION['id'] = $usuario['id']; // ID do usuário
            $_SESSION['nome'] = $usuario['nome']; // Nome do usuário

            // Redireciona para a página do painel
            header("Location: painel.php");
            exit; // Garante que o script pare após o redirecionamento
        } else {
            // Se nenhum usuário foi encontrado, a autenticação falhou
            echo "Falha ao logar! Usuário ou senha incorretos."; // Mensagem de erro para o usuário
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres -->
    <title>AçoMax</title> <!-- Título da página -->
    <style>
        /* Estilos gerais para a página */
        a {
            text-decoration: none; /* Remove sublinhado dos links */
            transition: color 0.3s; /* Transição suave para mudança de cor */
        }

        a:hover {
            color: #000000; /* Cor do link ao passar o mouse */
        }

        body {
            background-color: #f0f0f0; /* Cor de fundo da página */
            font-family: Arial, sans-serif; /* Fonte para o texto */
            margin: 0; /* Remove margens externas */
            padding: 0; /* Remove preenchimento interno */
        }

        /* Estilos para a seção centralizada */
        .center {
            text-align: center; /* Alinha texto ao centro */
            margin: 0 auto; /* Centraliza horizontalmente */
            padding: 20px; /* Espaçamento interno */
        }

        /* Estilos para a tabela */
        table {
            border-collapse: collapse; /* Junta as bordas das células */
            width: 60%; /* Largura da tabela */
            margin: 20px auto; /* Centraliza a tabela */
            background: #fff; /* Fundo branco */
            border: 1px solid #ccc; /* Borda da tabela */
            border-radius: 8px; /* Bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adiciona sombra à tabela */
        }

        /* Estilos para células de tabela */
        th, td {
            padding: 10px; /* Espaçamento interno */
            text-align: center; /* Alinhamento central */
            border-bottom: 1px solid #ddd; /* Borda inferior */
        }

        th {
            background-color: #f2f2f2; /* Fundo para células de cabeçalho */
        }

        /* Estilo para botões */
        .botao {
            text-decoration: none; /* Remove sublinhado */
            color: rgb(0, 0, 0); /* Cor do texto */
            background-color: #dcdcdc; /* Cor do botão */
            padding: 3px 5px; /* Espaçamento interno */
            border-radius: 0px; /* Borda do botão */
            display: inline-block; /* Para uso em linha */
            font-family: Arial, sans-serif; /* Fonte do botão */
            font-size: 15px; /* Tamanho do texto */
        }

        .botao:hover {
            background-color: #298814; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <!-- Tabela com imagem e mensagem de boas-vindas -->
    <table>
        <tr>
            <td>
                <!-- Exibe uma imagem de link externo -->
                <img src="https://i.imgur.com/k3bdhP5.png" alt="AçoMax" width="156" /> <!-- Logo da empresa -->
            </td>
            <td>
                <h3>Welcome to AçoMax - Service</h3> <!-- Título de boas-vindas -->
                <p>Administrador: <a href="https://www.instagram.com/glxckzn_/">vaconcelos</a></p> <!-- Link para o administrador -->
            </td>
        </tr>
    </table>

    <!-- Linha horizontal para separar seções -->
    <hr />

    <!-- Formulário de login -->
    <form action="" method="POST"> <!-- Início do formulário para login -->
        <label>Usuário:</label> <!-- Rótulo para o campo de email -->
        <input type="text" name="email" placeholder="Seu Usuário" required> <!-- Campo para entrada de email -->
        
        <label>Senha:</label> <!-- Rótulo para o campo de senha -->
        <input type="password" name="senha" placeholder="Sua Senha" required> <!-- Campo para entrada de senha -->

        <input type="submit" value="Entrar" /> <!-- Botão para enviar o formulário -->
    </form>

    <!-- Links para cadastro e login de funcionários -->
    <p><a href="usuario/formulario.php" class="botao">Cadastro Funcionário</a>&nbsp;|&nbsp;<a href="usuario/login.php" class="botao">Login Funcionário</a></p> <!-- Link para formulário de cadastro e login de funcionários -->

    <!-- Seção com informações sobre a empresa -->
    <center>
        <p>Empresa Industrial: Fazendo a sua empresa funcionar.</p> <!-- Frase da empresa -->
        <p>Máquinas e equipamentos industriais.</p> <!-- Descrição dos produtos -->
        <p>Atendemos toda a região de <a href="https://www.cuiaba.mt.gov.br/">Cuiabá</a> e <a href="https://varzeagrande.pi.gov.br/">Várzea Grande</a>.</p> <!-- Área de atendimento -->
    </center>

    <!-- Links para redes sociais -->
    <center>
        <p>
            <a href="https://w.app/acomaxservice">WhatsApp</a> /
            <a href="https://www.instagram.com/acomax.service/">Instagram</a> /
            LinkedIn
        </p> <!-- Links para redes sociais -->
    </center>

    <!-- Links para serviços e localização -->
    <center>
        <p>
            <a href="contato/serviços.html">Serviços</a> /
            <a href="localizçao.html">Localização</a>
        </p> <!-- Links para serviços e localização -->
    </center>

    <!-- Seção para metas da empresa -->
    <center>
        <h3>Metas</h3> <!-- Título para a seção de metas -->
    </center>

    <!-- Tabela para apresentar metas da empresa -->
    <table> <!-- Início da tabela para mostrar metas e funções -->
        <thead> <!-- Cabeçalho da tabela -->
            <tr>
                <th>Sites</th> <!-- Coluna para o nome do site -->
                <th>Função</th> <!-- Coluna para a função do site -->
            </tr>
        </thead>
        <tbody> <!-- Corpo da tabela -->
            <tr>
                <td>AçoMax Online</td> <!-- Nome do site -->
                <td>Comércio</td> <!-- Função do site -->
            </tr>
            <tr>
                <td>PagMax</td> <!-- Nome do segundo site -->
                <td>Pagamentos Empresariais</td> <!-- Função do segundo site -->
            </tr>
        </tbody>
    </table>
</body>
</html>
