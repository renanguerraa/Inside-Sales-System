<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtID"]) &&
            isset($_REQUEST["txtNome"])
        )
    )
{   
   $conexao = conectar(); 
   $sql = "update categoria set "
           . "nome = :valNome "
           . "where id = :valID";
   
   $comandoPreparado = $conexao -> prepare($sql);
   $comandoPreparado -> bindParam(":valID", $_REQUEST["txtID"]);
   $comandoPreparado -> bindParam(":valNome", $_REQUEST["txtNome"]);
   
   $conexao -> beginTransaction();
   
   try{
        $comandoPreparado -> execute();
        $conexao -> commit();
        header("Location:listar.php");
   }
    catch (PDOException $e){
     echo $e -> getMessage();
     $conexao -> rollback();
 }
}
