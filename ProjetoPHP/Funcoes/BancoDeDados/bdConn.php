<?php
function conectar(){
    $dsn = 'mysql:dbname=projetophp;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $retorno = "";

    try {
        $retorno = new PDO($dsn, $user, $password);
        // código adicionado para permitir a captura de erro do servidor de banco de dados.
        $retorno->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $retorno = 'Connection failed: ' . $e->getMessage();
    }
    return $retorno;
}