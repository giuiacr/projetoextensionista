<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "blog_da_giuia";

//criar conexão

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (mysqli_connect_error()){
    echo "Falhou a conexão!";
    exit();
}

// echo "Sucesso na conexão!";
?>