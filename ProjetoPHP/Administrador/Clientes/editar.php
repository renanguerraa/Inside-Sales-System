<?php
    if(!isset($_REQUEST["cpf_cnpj_cli"])){
        header("Location:listar.php");
        
    } else {
        include_once '../../Funcoes/BancoDeDados/bdConn.php';
        $conexao = conectar();
        $sql = "select * from cliente where cpf_cnpj_cli = :valCPF";
        $comandoPreparado = $conexao -> prepare($sql);
        
        $comandoPreparado -> bindParam(":valCPF", $_REQUEST["cpf_cnpj_cli"]);
        
        $comandoPreparado -> execute();
        
        $resultado = $comandoPreparado -> fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
       <title>Editar - Cliente</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <a href="listar.php">Voltar</a>
            <h1>Editar - <span class="badge badge-warning">Cliente</span></h1><br>

            <form action="salvarEdicao.php" method="POST">
                <div>
                    <label>CPF/CNPJ: </label> 
                    <input type="text" name="txtCPF" readonly="readonly" value="<?php echo $resultado["cpf_cnpj_cli"] ?>" class="form-control"/> <br>

                    <label>Nome: </label> 
                    <input type="text" name="txtNome" value="<?php echo $resultado["nome_cli"] ?>" class="form-control" required/> <br>                

                    <label>Telefone: </label> 
                    <input type="tel" name="txtNum" value="<?php echo $resultado["numero_cli"] ?>" class="form-control" required/> <br>              

                    <label>Rua: </label> 
                    <input type="text" name="txtEnd" value="<?php echo $resultado["endereco_cli"] ?>" class="form-control" required/> <br>                

                    <label>Bairro: </label> 
                    <input type="text" name="txtBairro" value="<?php echo $resultado["bairro_cli"] ?>" class="form-control" required/> <br>   
                    
                    <label>Cidade: </label> 
                    <input type="text" name="txtCidade" value="<?php echo $resultado["cidade_cli"] ?>" class="form-control" required/> <br>   
                    
                    <label>Estado: </label> 
                    <input type="text" name="txtEstado" value="<?php echo $resultado["estado_cli"] ?>" class="form-control" required/> <br>  
                    
                    <label>CEP: </label> 
                    <input type="text" name="txtCEP" value="<?php echo $resultado["cep_cli"] ?>" class="form-control" required/> <br>  
                    
                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Editar</b></button>
                </div>
            </form>            
    </body>
</html>
