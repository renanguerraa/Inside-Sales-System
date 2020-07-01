<?php
    include_once '../../Funcoes/BancoDeDados/bdConn.php';
    $conexao = conectar(); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar - Produto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container bg-light">
            <a href="../indexAdm.html">Voltar</a>
            <form action="salvarCadastro.php" method="POST" enctype="multipart/form-data">
                <h1>Cadastrar - <span class="badge badge-warning">Produto</span></h1> <br>
            
                <label for="txtCod">Código do produto:</label>
                <input type="text" name="txtCod" id="txtCod" class="form-control" required> <br> 

                <label for="txtNome">Nome do produto:</label>
                <input type="text" name="txtNome" id="txtNome" class="form-control" required> <br>
                
                <label for="txtDesc" style="display: block;">Descrição do produto:</label>
                <textarea name="txtDesc" id="txtDesc" rows="5" cols="40" class="form-control" required></textarea> <br> 

                <label for="selCategoria">Categoria do produto:</label>
                <select id="selCategoria" name="selCategoria" class="form-control" required>
                    <!-- Script para puxar todas as categorias -->
                    <?php
                    $sql = "Select nome, id From Categoria order by nome";
                    $resultado = $conexao->query($sql);

                    foreach($resultado as $categoria){
                        echo "<option value='".$categoria["id"]."'>".$categoria["nome"]."</option>";
                    }
                    ?>
                </select> <br> 

                <label for="txtVal">Valor unitário:</label>
                <input type="text" name="txtVal" id="txtVal" class="form-control" required> <br> 

                <label for="txtQtd">Quantidade em estoque:</label>
                <input type="text" name="txtQtd" id="txtQtd" class="form-control" required> <br> 

                <label for="txtUnVenda">Unidade:</label>
                <input type="text" name="txtUnVenda" id="txtUnVenda" class="form-control" placeholder="Litros (L), peça (P), unidade (U)" required> <br> 

                <label for="txtPeso">Peso:</label>
                <input type="text" name="txtPeso" id="txtPeso" class="form-control" required> <br> 

                <label for="txtDim">Dimensões:</label>
                <input type="text" name="txtDim" id="txtDim" class="form-control" required> <br> <br>
                
                <div class="custom-file">
                    <label class="custom-file-label">Escolha as imagens do produto:</label>
                    <input type="file" name="arquivo[]" class="custom-file-input" accept="image/*" multiple required>
                </div>
                <br> <br>

                <button type="submit" class="btn btn-warning btn-lg btn-block"><b>Cadastrar</b></button>
            </form>
        </div>
    </body>
</html>
