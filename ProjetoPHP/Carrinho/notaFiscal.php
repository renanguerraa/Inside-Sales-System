<?php

    include_once '../Funcoes/BancoDeDados/bdConn.php';
    $conexao = conectar();

    $sql = "select max(numero_compra) max_nc from compra";
    $result = $conexao -> query($sql);

    foreach($result as $res){
        $nc = $res["max_nc"];

    }

    $sql = "select sum(valor) val_total from possui where numero_compra = :nc";
    $comandoPreparado = $conexao -> prepare($sql);

    $comandoPreparado -> bindParam(":nc", $nc);

    $comandoPreparado -> execute();

    $result = $comandoPreparado -> fetchAll();

    foreach($result as $res){
        $vt = $res["val_total"];

    }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Nota Fiscal</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel="stylesheet" href="../Css/style.css">
    </head>
    <body>
    <a href="../index.php" class="ml-3">Voltar</a> <br> <br>
        <div class="container bg-light">
            <?php 
                $sql = "select co.numero_compra, co.data, co.valor_transporte, co.cpf_cnpj_vend, co.cpf_cnpj_transp, co.cpf_cnpj_cli, v.nome_vend, t.nome_tras, c.nome_cli nome_cli, c.endereco_cli, c.estado_cli, c.cep_cli, c.cidade_cli, c.bairro_cli
                            from compra co, vendedor v, transportadora t, cliente c  
                            where numero_compra = :nc  
                                and v.cpf_cnpj_vend = co.cpf_cnpj_vend
                                and t.cpf_cnpj_transp = co.cpf_cnpj_transp
                                and c.cpf_cnpj_cli = co.cpf_cnpj_cli";

                $comandoPreparado = $conexao -> prepare($sql);

                $comandoPreparado -> bindParam(":nc", $nc);

                $comandoPreparado -> execute();
            
                $result = $comandoPreparado -> fetchAll();

                $valTransp = $result["0"]["valor_transporte"];
            ?>

            <h1>Nota Fiscal</h1> <br>

            <hr>

            <p>
                <b>Número da Compra: </b><?php echo $nc ?>
            </p>
            
            <hr>

            <p>
                <b>Data: </b><?php echo $result["0"]["data"] ?>
            </p>

            <hr>

            <p>
                <b>Nome do Cliente: </b><?php echo $result["0"]["nome_cli"] ?> <br>
                <b>CPF/CNPJ do Cliente: </b><?php echo $result["0"]["cpf_cnpj_cli"] ?> <br>
                <b>Endereço de Entrega: </b><?php echo $result["0"]["endereco_cli"] .", ". $result["0"]["bairro_cli"] .", ". $result["0"]["cidade_cli"] ."-". $result["0"]["estado_cli"] .", ". $result["0"]["cep_cli"]?>
            </p>

            <hr>

            <p>
                <b>Nome do Vendedor: </b><?php echo $result["0"]["nome_vend"] ?> <br>
                <b>CPF/CNPJ do Vendedor: </b><?php echo $result["0"]["cpf_cnpj_vend"] ?>
            </p>

            <hr>

            <p>
                <b>Nome da Transportadora: </b><?php echo $result["0"]["nome_tras"] ?> <br>
                <b>CPF/CNPJ da Transportadora: </b><?php echo $result["0"]["cpf_cnpj_transp"] ?> <br>
                <b>Valor do Transporte: </b>R$ <?php echo $result["0"]["valor_transporte"] ?></b>
            </p>

            <hr>

            <p>
                <?php             
                
                    $sql = "select count(codigo_prod) quant_prod from possui where numero_compra = :nc";

                    $comandoPreparado = $conexao -> prepare($sql);

                    $comandoPreparado -> bindParam(":nc", $nc);

                    $comandoPreparado -> execute();
        
                    $result = $comandoPreparado -> fetchAll();
                ?>

                <b>Quantidade de Produtos: </b><?php echo $result[0]["quant_prod"] ?> 

                <ol>
                    <?php
                        $sql = "select po.codigo_prod, po.quantidade, po.valor, pr.nome_pro from possui po, produto pr 
                                    where numero_compra = :nc and
                                        po.codigo_prod = pr.codigo_prod";

                        $comandoPreparado = $conexao -> prepare($sql);

                        $comandoPreparado -> bindParam(":nc", $nc);

                        $comandoPreparado -> execute();
            
                        $result = $comandoPreparado -> fetchAll();
            
                        foreach($result as $prod){ 
                    ?>
                            <li>
                                <b>Código: </b><?php echo $prod["codigo_prod"] ?> <br>
                                <b>Nome: </b><?php echo $prod["nome_pro"] ?> <br>
                                <b>Quantidade: </b><?php echo $prod["quantidade"] ?> <br>
                                <b>Valor Total Individual: </b>R$ <?php echo $prod["valor"] ?> 
                            </li> <br>
                    <?php 
                        } 
                    ?>
                </ol>

                <b>Valor Total dos Produtos: </b>R$ <?php echo $vt ?></b>
            </p>
                
            <hr>

            <p>
                <b>Valor Total dos Produtos + Preço do Transporte: </b>R$ <?php echo ($vt + $valTransp) ?></b>
            </p>

            <hr>
        </div>
    </body>
</html>
