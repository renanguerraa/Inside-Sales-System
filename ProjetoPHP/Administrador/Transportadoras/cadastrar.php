<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar - Transportadora</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Cadastrar - <span class="badge badge-warning">Transportadora</span></h1> <br>

            <form action="salvarCadastro.php" method="POST">
                <div>
                    <label>CPF/CNPJ: </label> 
                    <input type="text" name="txtCPF" class="form-control" required/> <br>

                    <label>Nome: </label> 
                    <input type="text" name="txtNome" class="form-control" required/> <br>               

                    <label>Telefone: </label> 
                    <input type="tel" name="txtNum" class="form-control" required/> <br>                 

                    <label>Rua: </label> 
                    <input type="text" name="txtEnd" class="form-control" required/> <br>                 

                    <label>Bairro: </label> 
                    <input type="text" name="txtBairro" class="form-control" required/> <br>   
                    
                    <label>Cidade: </label> 
                    <input type="text" name="txtCidade" class="form-control" required/> <br>  
                    
                    <label>Estado: </label> 
                    <input type="text" name="txtEstado" class="form-control" required/> <br>  
                    
                    <label>CEP: </label> 
                    <input type="text" name="txtCEP" class="form-control" required/> <br> <br>  
                    
                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Cadastrar</b></button>
                </div>
            </form>            
        </div>
    </body>
</html>
