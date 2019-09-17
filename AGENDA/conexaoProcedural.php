<?php

//Conexao Procedural
$conexao = mysqli_connect("localhost", "root", "");
if (!$conexao) {
    die("Erro ao conectar com o banco de dados " .
            mysqli_connect_errno() . "<br>" .
            mysqli_connect_error());
}
if (!mysqli_select_db($conexao, "agenda")) {
    die("O banco de dados não existe<br>");
}
echo "Conectado com o banco de dados: ";
mysqli_close($conexao);
?>
 