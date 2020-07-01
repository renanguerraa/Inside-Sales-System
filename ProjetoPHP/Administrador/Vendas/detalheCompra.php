<?php
    if(!isset($_REQUEST["numero_compra"])){
        header("Location:listar.php");
        
    } else {
        include_once '../../Funcoes/BancoDeDados/bdConn.php';
        $conexao = conectar();
        $sql = "select * from possui where numero_compra = :nc";

        $comandoPreparado = $conexao -> prepare($sql);
        
        $comandoPreparado -> bindParam(":nc", $_REQUEST["numero_compra"]);
        
        $comandoPreparado -> execute();
        
        $resultado = $comandoPreparado -> fetchAll();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalhes - Venda</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body class="container">
        <a href="listar.php">Voltar</a>
        <h1>Detalhes sobre a Venda - <span class="badge badge-warning"><?php echo $_REQUEST["numero_compra"] ?></span></h1> <br>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>Código do Produto</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </tr>
                
            <?php
                foreach($resultado as $prod){
                    echo "<tr>";
                        echo "<td>";
                            echo $prod["codigo_prod"];
                        echo "</td>";
                        
                        echo "<td>";
                            echo $prod["quantidade"];
                        echo "</td>";
                        
                        echo "<td>";
                            echo $prod["valor"];
                        echo "</td>";
                    echo "</tr>";    
                }
            ?>
            </table>   
        </div>
    </body>
</html>
