<?php
    if(!isset($_REQUEST["id"])){
        header("Location:listar.php");
        
    } else {
        include_once '../../Funcoes/BancoDeDados/bdConn.php';
        $conexao = conectar();
        $sql = "select * from categoria where id = :valID";
        $comandoPreparado = $conexao -> prepare($sql);
        
        $comandoPreparado -> bindParam(":valID", $_REQUEST["id"]);
        
        $comandoPreparado -> execute();
        
        $resultado = $comandoPreparado -> fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
       <title>Excluir - Categoria</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
        <a href="listar.php">Voltar</a>
        <h1>Excluir - <span class="badge badge-warning">Categoria</span></h1> <br>

            <form action="salvarExclusao.php" method="POST">
                <div>
                    <label>Código: </label> 
                    <input type="text" name="txtID" readonly="readonly" value="<?php echo $resultado["id"] ?>" class="form-control"/> <br> 

                    <label>Nome: </label> 
                    <input type="text" name="txtNome" readonly="readonly" value="<?php echo $resultado["nome"] ?>" class="form-control"/> <br>                         
                    
                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Confirmar Exclusão</b></button>
                </div>
            </form>            
    </body>
</html>
