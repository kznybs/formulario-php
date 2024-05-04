Dentro do seu public_html coloque os arquivos do formulario-php.
----------------------------------------------------------------
Substitua os dados de conexao.php e config.php com seus dados do servidor.
---------------------------------------------------------------------------
Dentro do seu phpMyadmin importe o arquivo ( principal.sql ).
-------------------------------------------------------------
O index principal faz login somente com os dados criado dentro do phpMyadmin.
-----------------------------------------------------------------------------
Defeito na pagina edit.php, na url pode alterar outros id.
----------------------------------------------------------
Banco de dados: `principal`
--------------------------
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `chave` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-----------------------------------------------------------------
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-----------------------------------------------------------------
