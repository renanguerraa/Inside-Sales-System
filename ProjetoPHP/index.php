<!DOCTYPE html>

<html>
    <head>
        <title>Produtos</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel="stylesheet" href="Css/style.css">
    </head>
    <body>
        <form action="Carrinho/carrinho.php">
            <button type="submit"class="position-fixed btn btn-warning btn-lg border border-dark w-100" style="z-index:4"><b>Adicionar Itens Selecionados ao Carrinho</b></button> <br> <br>
            <div class="container"> <br>
                <?php
                include_once 'Funcoes/BancoDeDados/bdConn.php';

                $conexao = conectar();

                $sql = "Select * from categoria order by id";

                $resultado1 = $conexao -> query($sql);

                foreach($resultado1 as $cat){?>

                    <div class="card bg-warning">
                        <div class="card-body">
                            <h3 class="card-title"> <?php echo $cat["nome"] ?> </h3>

                            <?php
                                $sql = "Select * from produto order by id";
                                $resultado2 = $conexao -> query($sql);

                                foreach($resultado2 as $prod){
                                    if($prod["id"] == $cat["id"]){ 
                            ?>
                                        <div class="card bg-light">
                                            <div class="row">
                                                <div class="carousel slide w-25 mt-4 ml-5" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php 
                                                            $sql = "select codigo_prod, nome_arquivo from imagem";

                                                            $resultado3 = $conexao -> query($sql);
                                                            $i = 0;
                                                            foreach($resultado3 as $img){
                                                                if($img["codigo_prod"] == $prod["codigo_prod"]){
                                                                    if($i == 0){
                                                                        $i = $i + 1;
                                                                        ?>
                                                                            <div class="carousel-item active">
                                                                                <img class="d-block w-100 h-75" src="Administrador/Produtos/Imagens/<?php echo $img["nome_arquivo"] ?>">
                                                                            </div>
                                                                        <?php
                                                                        }else{
                                                                        ?>
                                                                           <div class="carousel-item">
                                                                                <img class="d-block w-100 h-75" src="Administrador/Produtos/Imagens/<?php echo $img["nome_arquivo"] ?>">
                                                                            </div>
                                                                        <?php
                                                                    }
                                                                } 
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="pr-2 col-11">
                                                            <h4 class="card-title"> <?php echo $prod["nome_pro"] ?> </h4>
                                                            <p class="card-text"><b>Descrição</b> <?php echo $prod["descricao"] ?> </p>
                                                            <p class="card-text"><b>Preço</b> <?php echo $prod["valor_unitario"] ?> </p>
                                                            <p class="card-text"><b>Quantidade</b> <?php echo $prod["quantidade"] . " unidades"; if($prod["quantidade"] < 1){ echo " (Repor Estoque)";} ?></p>
                                                            <p class="card-text"><b>Peso</b> <?php echo $prod["peso"] ?> kg</p>
                                                            <p class="card-text"><b>Dimensão:</b> <?php echo $prod["dimensoes"] ?> m²</p>
                                                            <p class="card-text"><b>Unidade Venda:</b> <?php echo $prod["unidade_Venda"] ?> </p>
                                                        </div>
                                                        <div class="pt-2 col-1">    
                                                            <input style="transform: scale(2);" type="checkbox" name="produtos[]" value="<?php echo $prod["codigo_prod"]?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <br>    
                            <?php 
                                    } 
                                }    
                            ?>
                        </div>
                    </div> <br>
                <?php 
                    } 
                ?>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
