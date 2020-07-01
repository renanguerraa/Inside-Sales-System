<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Vendas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Vendas</span></h1> <br>
            
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>Código</th>                    
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Transportadora</th>
                    <th>Comissão</th>
                    <th>Transporte</th>
                    <th>Data</th>
                    <th>Gerenciar</th>
                </tr>
                <?php
                    include_once '../../Funcoes/BancoDeDados/bdConn.php';
                    $conexao = conectar();
                    $sql = "Select * from compra order by numero_compra";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $venda){
                        echo "<tr>";
                            echo "<td>" . $venda["numero_compra"] . "</td>";
                            echo "<td>" . $venda["cpf_cnpj_cli"] . "</td>";
                            echo "<td>" . $venda["cpf_cnpj_vend"] . "</td>";
                            echo "<td>" . $venda["cpf_cnpj_transp"] . "</td>";
                            echo "<td> R$ " . $venda["valor_comissao"] . "</td>";
                            echo "<td> R$ " . $venda["valor_transporte"] . "</td>";
                            echo "<td>" . $venda["data"] . "</td>";
                            echo "<td>" . "<a href='detalheCompra.php?numero_compra=" . $venda["numero_compra"] . "'>Detalhes</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
        </div>
    </body>
</html>
