<?php
if (isset($_POST['submit'])) {
    include('config.php'); // Conexão ao banco de dados

    // Pegue os valores do formulário
    $username = $_POST['username'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $banco = $_POST['banco'];
    $chave = $_POST['chave'];
    $endereco = $_POST['endereco'];
    $password = $_POST['password'];

    // Prepared statement para evitar SQL injection
    $stmt = $conexao->prepare("INSERT INTO usuario (username, cargo, email, telefone, sexo, data_nasc, banco, chave, endereco, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssss', $username, $cargo, $email, $telefone, $sexo, $data_nasc, $banco, $chave, $endereco, $password);

    if ($stmt->execute()) { // Se a execução for bem-sucedida
        header('Location: /painel.php'); // Redireciona após a inserção
        exit; // Certifique-se de sair para evitar execução adicional
    } else {
        // Em caso de falha, exibe o erro
        echo "Erro ao inserir no banco de dados: " . $stmt->error;
    }

    $stmt->close(); // Fecha o prepared statement
    $conexao->close(); // Fecha a conexão com o banco de dados
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário AçoMax</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #f0f0f0, #f0f0f0);
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid rgb(197, 94, 10);
        }
        legend{
            border: 1px solid rgb(197, 94, 10);
            padding: 10px;
            text-align: center;
            background-color: rgb(197, 94, 10);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(255, 255, 255);
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(197, 94, 10), rgb(197, 94, 10));
            width: 100%;
            border: none;
            padding: 15px;
            color: rgb(255, 255, 255);
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,#009320, #009320);
        }
    </style>
</head>
<body>
    <a href="/painel.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário Funcionario</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="username" id="username" class="inputUser" required>
                    <label for="username" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cargo" id="cargo" class="inputUser" required>
                    <label for="cargo" class="labelInput">Cargo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="banco" id="banco" class="inputUser" required>
                    <label for="banco" class="labelInput">Banco</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="chave" id="chave" class="inputUser" required>
                    <label for="chave" class="labelInput">Chave Pix</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                    <div class="inputBox">
                    <input type="text" name="password" id="password" class="inputUser" required>
                    <label for="password" class="labelInput">Senha Para Login</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
