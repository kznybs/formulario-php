<?php

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: index.php");

// Para botão que ira sair
