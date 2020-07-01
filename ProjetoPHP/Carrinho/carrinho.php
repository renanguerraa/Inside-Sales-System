<?php

    if (isset($_REQUEST["produtos"])){

        $produtos = $_REQUEST["produtos"];

        include_once '../Funcoes/BancoDeDados/bdConn.php';

        $conexao = conectar();
    } else {

        header("Location:../index.php");
    }
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Carrinho</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel="stylesheet" href="../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <h1>Carrinho</h1> <br>

            <form action="inserir.php" method="POST">

                <label>CPF/CNPJ do Cliente: </label>
                <select name="txtcpfCli" class="form-control" required>
                    <?php
                    $sql = "Select cpf_cnpj_cli From cliente order by cpf_cnpj_cli";
                    $resultado = $conexao -> query($sql);

                    foreach($resultado as $cli){
                        echo "<option value='".$cli["cpf_cnpj_cli"]."'>".$cli["cpf_cnpj_cli"]."</option>";
                    }
                    ?>
                </select> <br>

                <label>CPF/CNPJ da Transportadora: </label>
                <select name="txtcpfTransp" class="form-control" required>
                    <?php
                    $sql = "Select cpf_cnpj_transp From transportadora order by cpf_cnpj_transp";
                    $resultado = $conexao -> query($sql);

                    foreach($resultado as $transp){
                        echo "<option value='".$transp["cpf_cnpj_transp"]."'>".$transp["cpf_cnpj_transp"]."</option>";
                    }
                    ?>
                </select> <br>

                <label>CPF/CNPJ do Vendedor: </label>
                <select name="txtcpfVend" class="form-control" required>
                    <?php
                    $sql = "Select cpf_cnpj_vend From vendedor order by cpf_cnpj_vend";
                    $resultado = $conexao -> query($sql);

                    foreach($resultado as $vend){
                        echo "<option value='".$vend["cpf_cnpj_vend"]."'>".$vend["cpf_cnpj_vend"]."</option>";
                    }
                    ?>
                </select> <br>
                
                <label>Valor da Comissão: </label>
                <input type="text" name="txtvalCom" class="form-control" required> <br>

                <label>Valor do Transporte: </label>
                <input type="text" name="txtvalTransp" class="form-control" required> <br> <br> <br>
                
                <?php

                    $sql = "select codigo_prod, nome_pro from produto order by id";
                    $resultado = $conexao -> query($sql);

                    foreach($produtos as $prod){

                        $resultado = $conexao -> query($sql);

                        foreach($resultado as $result){
                            if($result["codigo_prod"] == $prod){
                ?>              
                                <label>Quantidade do Produto: <?php echo $result["nome_pro"] ?> </label>
                                <input type="text" name="quantidade[]" class="form-control" required> <br>
                                <input type="hidden" name="produtos[]" value="<?php echo $result["codigo_prod"] ?>">
                <?php
                            }
                        }
                    }
                ?>

                <input type="submit" value="Gerar Nota Fiscal" class="btn btn-warning btn-lg btn-block"/> 
            </form>

        </div>
    </body>
</html>
