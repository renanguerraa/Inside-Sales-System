<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar - Vendedor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css"> 
    </head>
    <body>
        <div class="container bg-light">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Cadastrar - <span class="badge badge-warning">Vendedor</span></h1> <br>
            <form action="salvarCadastro.php" method="post">
                <label for="txtCPF">CPF/CNPJ: </label>
                <input type="text" name="txtCPF" id="txtCPF" class="form-control" required/> <br> 

                <label for="txtNome">Nome do Vendedor:</label>
                <input type="text" name="txtNome" id="txtNome" class="form-control" required/> <br> 

                <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Cadastrar</b></button>
            </form>
        </div>
    </body>
</html>
