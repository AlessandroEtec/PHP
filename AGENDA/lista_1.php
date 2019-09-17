<meta charset="UTF-8">

<?php
include("conexao.php");
$sql = "SELECT * FROM pessoa";
$resultado = $conexao->query($sql);
if ($resultado) {
    ?>
    <table border="1">
        <tbody>
            <tr>
                <th>Nome</th>
                <th>Endereço</th> 
                <th>Cidade</th>
                <th>Telefone</th>
            </tr>
        </tbody>
        <?php
        while ($linha = $resultado->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $linha["nome"] . "</td><td>" .
            $linha["endereco"] . "</td><td>" .
            $linha["cidade"] . "</td><td>" .
            $linha["telefone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Erro SQL: " . $conexao->error;
    }
    $conexao->close();
    ?>
