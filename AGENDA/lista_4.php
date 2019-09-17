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
$ordem = "nome";
if (!empty($_GET["ordem"])) {
    $ordem = $_GET["ordem"];
}

include("conexao.php");
$sql = "SELECT * FROM pessoa order by $ordem";
$resultado = $conexao->query($sql);
if ($resultado) {
    ?>
    <table border="1">
        <tbody>
            <tr>
                <th><a href="?ordem=nome">Nome</a></th>
                <th>Endereço</th> 
                <th><a href="?ordem=cidade">Cidade</a></th>
                <th>Telefone</th>
                <th colspan="2">Ações</th>
            </tr>
        </tbody>
        <?php
        $i = 0;
        while ($linha = $resultado->fetch_array()) {
            $codigo = $linha["codigo"];
            $resto = $i % 2;
            echo "<tr class='c$resto'>";
            echo "<td>" . $linha["nome"] . "</td><td>" .
            $linha["endereco"] . "</td><td>" .
            $linha["cidade"] . "</td><td>" .
            $linha["telefone"] . "</td>".
            "<td><a href='formularioAlterar.php?codigo=$codigo'>Alterar</a></td>".
            "<td>Excluir</td>"        ;
            echo "</tr>";
            $i++;
        }
        echo "<tfoot>"
        . "<tr>"
        . "<th colspan='6'>Quantidade de Registros: $i </th>"
        . "</tr>"
        . "</tfoot>";
        echo "</table>";
        
    } else {
        echo "Erro SQL: " . $conexao->error;
    }
    $conexao->close();
    ?>
        <a href="formulario.php">Incluir</a>
        