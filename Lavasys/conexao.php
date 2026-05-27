<?php

    $dominio = "mysql:host=localhost;dbname=lavanderia";
    $usuario = "root";
    $senha = "root";

    try {
        $pdo = new PDO($dominio, $usuario, $senha);
    } catch (Exception $e){
        die("Erro ao conectar ao banco: ". $e->getMessage());
    }


