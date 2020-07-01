<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtNome"]) 
        )
    )
{   
   $conexao = conectar(); 
   $sql = "insert into categoria(nome) "
           . "values (:valNome)";
   
   $comandoPreparado = $conexao -> prepare($sql);
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
