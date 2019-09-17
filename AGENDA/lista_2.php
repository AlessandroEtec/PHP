<meta charset="UTF-8">
<style>
    .c0{
        background-color: lightgray;
    }
    .c1{
        background-color: white;
    }
</style>
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
        $i = 0;
        while ($linha = $resultado->fetch_array()) {
            $resto = $i % 2 ;
            echo "<tr class='c$resto'>";
            echo "<td>" . $linha["nome"] . "</td><td>" .
            $linha["endereco"] . "</td><td>" .
            $linha["cidade"] . "</td><td>" .
            $linha["telefone"] . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    } else {
        echo "Erro SQL: " . $conexao->error;
    }
    $conexao->close();
    ?>
