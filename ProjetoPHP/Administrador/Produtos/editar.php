<?php
    if(!isset($_REQUEST["cod"])){
        header("Location:listar.php");
        
    } else {
        include_once '../../Funcoes/BancoDeDados/bdConn.php';
        $conexao = conectar();
        $sql = "select * from produto where codigo_prod = :valID";
        $comandoPreparado = $conexao -> prepare($sql);
        
        $comandoPreparado -> bindParam(":valID", $_REQUEST["cod"]);
        
        $comandoPreparado -> execute();
        
        $resultado = $comandoPreparado -> fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
       <title>Editar - Produto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
        <a href="listar.php">Voltar</a>
        <h1>Editar - <span class="badge badge-warning">Produto</span></h1> <br>

            <form action="salvarEdicao.php" method="POST">
                <div>
                    <label>Código</label> 
                    <input type="text" name="txtID" readonly="readonly" value="<?php echo $resultado["codigo_prod"] ?>" class="form-control"/> <br>

                    <label>Nome: </label> 
                    <input type="text" name="txtNome" value="<?php echo $resultado["nome_pro"] ?>" class="form-control" required/> <br>                

                    <label>Descrição: </label> 
                    <textarea name="txtDesc" id="txtDesc" rows="10" cols="30" class="form-control" required><?php echo $resultado["descricao"] ?></textarea> <br>    

                    <label for="txtVal">Valor unitário:</label>
                    <input type="text" name="txtVal" id="txtVal" value="<?php echo $resultado["valor_unitario"] ?>" class="form-control" required> <br> 

                    <label for="txtQtd">Quantidade em estoque:</label>
                    <input type="text" name="txtQtd" id="txtQtd" value="<?php echo $resultado["quantidade"] ?>" class="form-control" required> <br> 

                    <label for="txtPeso">Peso:</label>
                    <input type="text" name="txtPeso" id="txtPeso" value="<?php echo $resultado["peso"] ?>" class="form-control" required> <br> 

                    <label for="txtDim">Dimensões:</label>
                    <input type="text" name="txtDim" id="txtDim" value="<?php echo $resultado["dimensoes"] ?>" class="form-control" required> <br>
                    
                    <button type="submit" class="btn btn-warning btn-lg btn-block mb-2"><b>Editar</b></button>
                </div>
            </form>            
    </body>
</html>