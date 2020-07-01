<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtID"]) &&
            isset($_REQUEST["txtNome"]) &&
            isset($_REQUEST["txtDesc"]) &&
            isset($_REQUEST["txtVal"]) &&
            isset($_REQUEST["txtQtd"]) &&
            isset($_REQUEST["txtPeso"]) &&
            isset($_REQUEST["txtDim"]) 
        )
    )
        {  $conexao = conectar(); 
            $sql = "update produto "
                    . "set nome_pro   = :nomeProduto, "
                    . "descricao      = :descProduto, "
                    . "valor_unitario = :valProduto, "
                    . "quantidade     = :qtdProduto, "
                    . "peso           = :pesoProduto, "
                    . "dimensoes      = :dimProduto "
                    . "where codigo_prod  = :idProduto";
                    
            $comandoPreparado = $conexao->prepare($sql);
            $comandoPreparado->bindParam(":idProduto", $_REQUEST["txtID"]);
            $comandoPreparado->bindParam(":nomeProduto", $_REQUEST["txtNome"]);
            $comandoPreparado->bindParam(":descProduto", $_REQUEST["txtDesc"]);
            $comandoPreparado->bindParam(":valProduto", $_REQUEST["txtVal"]);
            $comandoPreparado->bindParam(":qtdProduto", $_REQUEST["txtQtd"]);
            $comandoPreparado->bindParam(":pesoProduto", $_REQUEST["txtPeso"]);
            $comandoPreparado->bindParam(":dimProduto", $_REQUEST["txtPeso"]);
   
   $conexao->beginTransaction();
   try{
        $comandoPreparado->execute();
        $conexao->commit();
        header("Location:listar.php");
   }
    catch (PDOException $e){
     echo $e->getMessage();
     $conexao->rollback();
   }
}