<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtCPF"]) &&
            isset($_REQUEST["txtNome"]) &&
            isset($_REQUEST["txtNum"]) &&
            isset($_REQUEST["txtEnd"]) &&
            isset($_REQUEST["txtBairro"]) &&
            isset($_REQUEST["txtCidade"]) &&
            isset($_REQUEST["txtEstado"]) &&
            isset($_REQUEST["txtCEP"]) 
        )
    )
{   
   $conexao = conectar(); 
   $sql = "update transportadora set "
           . "nome_tras = :valNome, "
           . "numero_trans = :valNum, "
           . "endereco_trans = :valEnd, "
           . "bairro_trans = :valBairro, "
           . "cidade_trans = :valCidade, "
           . "estado_trans = :valEstado, "
           . "cep_trans = :valCEP "
           . "where cpf_cnpj_transp = :valCPF";
   
   $comandoPreparado = $conexao -> prepare($sql);
   $comandoPreparado -> bindParam(":valCPF", $_REQUEST["txtCPF"]);
   $comandoPreparado -> bindParam(":valNome", $_REQUEST["txtNome"]);
   $comandoPreparado -> bindParam(":valNum", $_REQUEST["txtNum"]);
   $comandoPreparado -> bindParam(":valEnd", $_REQUEST["txtEnd"]);
   $comandoPreparado -> bindParam(":valBairro", $_REQUEST["txtBairro"]);
   $comandoPreparado -> bindParam(":valCidade", $_REQUEST["txtCidade"]);
   $comandoPreparado -> bindParam(":valEstado", $_REQUEST["txtEstado"]);
   $comandoPreparado -> bindParam(":valCEP", $_REQUEST["txtCEP"]);
   
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
