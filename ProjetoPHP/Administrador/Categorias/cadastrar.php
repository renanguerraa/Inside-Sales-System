<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar - Categoria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <a href="../indexAdm.html">Voltar</a>
        
            <h1>Cadastrar - <span class="badge badge-warning">Categoria</span></h1> <br>
            
            <form action="salvarCadastro.php" method="post">
                <div>
                    <label for="txtNome">Nome da categoria:</label>
                    <input type="text" name="txtNome" id="txtNome" class="form-control" required> <br> 

                    <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Cadastrar</b></button>
                </div>
            </form>
        </div>
    </body>
</html>