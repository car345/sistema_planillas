<?php
try {
    $host = "10.19.0.112";
    $dbname = "planillas2023_v3";
    $username = "planillas2024";
    $password = "Password123#@!";

    $mbd = new PDO("mysql:host=$host;port=3306;dbname=$dbname",$username,$password );
    foreach($mbd->query('SELECT * from areas') as $fila) {
         
    }
    
} catch (PDOException $e) {
    print "¡Error!:No conecta " . $e->getMessage() . "<br/>";

    die();
}

 ?>
