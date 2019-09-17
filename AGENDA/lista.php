<meta charset="UTF-8">

<?php
include("conexao.php");
$sql = "SELECT * FROM pessoa";
$resultado = $conexao->query($sql);
if ($resultado) {
    while ($linha = $resultado->fetch_array()) {
        $codigo = $linha["codigo"];
        echo $linha["nome"] . " - " .
        $linha["endereco"] . " - " .
        $linha["cidade"] . " - " .
        $linha["telefone"] . "<br>";
    }
} else {
    echo "Erro SQL: " . $conexao->error;
}
$conexao->close();
?>
