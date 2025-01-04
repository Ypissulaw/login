<?php
$db_host = "localhost";
$db_name="loja_virtual";
$db_user="root";
$db_pass="";
$pdo=new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

$array=[
    'error'=>'', 
    'result'=>[] //preenchido com dados de sucesso
];