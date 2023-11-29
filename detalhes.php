<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Titulo da pagina</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
    </head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <div id="corpo">
        <?php
            $c = $_GET['cod'] ?? 0;
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
            if (!$busca){
                echo "Busca falhou! $banco->error";
            } else {
                if ($busca->num_rows == 1){
                    $reg = $busca->fetch_object();
                    echo "<tr><td rowspan='3'>foto</td>";
                    echo "<td><h2>$reg->nome</h2></td></tr>";
                    echo "<tr><td>Descricao</td></tr>";
                    echo "<tr><td>Adm</td></tr>";
                }  else {
                    echo "<tr><td>Nenhum registro encontrado</td></tr>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>