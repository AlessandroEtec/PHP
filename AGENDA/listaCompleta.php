<meta charset="UTF-8">
<style>
    table{
        margin: 0 auto;
        border-collapse: collapse;
    }
    tr.c0{
        background-color: #eeeeee;
    }
    tr.c1{
        background-color: #999999;
    }
    tfoot{
        background-color: #cccccc;
        color: blue;
    }
    a{
        color:blue;
    }
    .pgAtual{
        color: black;
        text-decoration: none;
    }
</style>
<?php
include("conexao.php");
$ordem = "nome";
if (!empty($_GET["ordem"])) {
    $ordem = $_GET["ordem"];
}
$filtro = "";
if (!empty($_GET["filtro"])) {
    $filtro = $_GET["filtro"];
}
$pagina = 1;
if (!empty($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
$qtdRegistros = 0;
$qtdExibir = 5;
$sqlQtd = "select count(*) from pessoa";
$resultadoQtd = $conexao->query($sqlQtd);
if ($resultadoQtd) {
    $linha = $resultadoQtd->fetch_array();
    $qtdRegistros = $linha[0];
}
$paginas = $qtdRegistros / $qtdExibir;
$paginas = ceil($paginas);
//echo "Registros: $qtdRegistros<br>Paginas: $paginas<br>Qtd registros por pagina: $qtdExibir";

$inicio = (($pagina - 1) * $qtdExibir);
$fim = $inicio + $qtdExibir;

$sql = "SELECT * FROM pessoa where nome like '%$filtro%'
        order by $ordem limit $inicio, $qtdExibir";
//echo $sql;
$resultado = $conexao->query($sql);
if ($resultado) {
    ?>
    <table border="1">
        <tbody>
            <tr>
                <th colspan="4">
                    <form>
                        Nome: <input type="text" name="filtro" />
                        <input type="submit" value="buscar">
                    </form>
                </th>
            </tr>

            <tr>
                <th><a href="?ordem=nome"> Nome</a></th>
                <th>Endereço</th>
                <th><a href="?ordem=cidade"> Cidade</a></th>
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
            $linha["telefone"] . "</td>" .
            "<td><a href='formulario.php?codigo=$codigo'>Alterar</a></td>".
            "<td><a href='excluir.php?codigo=$codigo'>Excluir</a></td>" .       
            "</tr>";
            $i++;
        }
        $inicio++;
        echo "<tfoot>" .
        "<tr><th colspan='6'>Exibindo Registros de $inicio a $fim</th><tr>" .
        "<tr><th colspan='6'>";
        for ($i = 1; $i <= $paginas; $i++) {
            if ($pagina == $i) {
                echo "<a href='?pagina=$i' class='pgAtual'>$i</a> ";
            } else {
                echo "<a href='?pagina=$i'>$i</a> ";
            }
        }
        //$i" .
        echo "</th><tr></tfoot>";
        echo "</table>";
    } else {
        echo "Erro SQL: " . $conexao->error;
    }
    $conexao->close();
    ?>

        <a href="formulario.php">Adicionar</a>