<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtCPF"]) &&
            isset($_REQUEST["txtNome"]) 
        )
    )
{   
   $conexao = conectar(); 
   $sql = "update vendedor set "
           . "nome_vend = :valNome "
           . "where cpf_cnpj_vend = :valCPF";
   
   $comandoPreparado = $conexao -> prepare($sql);
   $comandoPreparado -> bindParam(":valCPF", $_REQUEST["txtCPF"]);
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
