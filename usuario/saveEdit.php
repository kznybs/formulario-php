<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $cargo = $_POST['cargo'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $banco = $_POST['banco'];
        $chave = $_POST['chave'];
        $endereco = $_POST['endereco'];
        $password = $_POST['password'];
        
        $sqlInsert = "UPDATE usuario
        SET username='$username',cargo='$cargo',email='$email',telefone='$telefone',sexo='$sexo',data_nasc='$data_nasc',banco='$banco',chave='$chave',endereco='$endereco',password='$password'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: view.php');

?>
