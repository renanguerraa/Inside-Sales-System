<?php
    if(!isset($_REQUEST["cpf_cnpj_transp"])){
        header("Location:listar.php");
        
    } else {
        include_once '../../Funcoes/BancoDeDados/bdConn.php';
        $conexao = conectar();
        $sql = "select * from transportadora where cpf_cnpj_transp = :valCPF";
        $comandoPreparado = $conexao -> prepare($sql);
        
        $comandoPreparado -> bindParam(":valCPF", $_REQUEST["cpf_cnpj_transp"]);
        
        $comandoPreparado -> execute();
        
        $resultado = $comandoPreparado -> fetch();
    }
?>

<!DOCTYPE html>
<html>
    <head>
       <title>Excluir - Transportadora</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <a href="listar.php">Voltar</a>
            <h1>Excluir - <span class="badge badge-warning">Transportadora</span></h1> <br>

            <form action="salvarExclusao.php" method="POST">
                <div>
                    <label>CPF/CNPJ: </label> 
                    <input type="text" name="txtCPF" readonly="readonly" value="<?php echo $resultado["cpf_cnpj_transp"] ?>" class="form-control"/> <br>

                    <label>Nome: </label> 
                    <input type="text" name="txtNome" readonly="readonly" value="<?php echo $resultado["nome_tras"] ?>" class="form-control"/> <br>                

                    <label>Telefone: </label> 
                    <input type="tel" name="txtNum" readonly="readonly" value="<?php echo $resultado["numero_trans"] ?>" class="form-control"/> <br>                 

                    <label>Rua: </label> 
                    <input type="text" name="txtEnd" readonly="readonly" value="<?php echo $resultado["endereco_trans"] ?>" class="form-control"/> <br>                 

                    <label>Bairro: </label> 
                    <input type="text" name="txtBairro" readonly="readonly" value="<?php echo $resultado["bairro_trans"] ?>" class="form-control"/> <br>  
                    
                    <label>Cidade: </label> 
                    <input type="text" name="txtCidade" readonly="readonly" value="<?php echo $resultado["cidade_trans"] ?>" class="form-control"/> <br>  
                    
                    <label>Estado: </label> 
                    <input type="text" name="txtEstado" readonly="readonly" value="<?php echo $resultado["estado_trans"] ?>" class="form-control"/> <br>  
                    
                    <label>CEP: </label> 
                    <input type="text" name="txtCEP" readonly="readonly" value="<?php echo $resultado["cep_trans"] ?>" class="form-control"/> <br> <br>  
                    
                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Confirmar Exclusão</b></button>
                </div>
            </form>            
    </body>
</html>
