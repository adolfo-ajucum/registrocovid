<?php

$host='localhost';
$user='root';
$password='zTfKnJNaG8CN';
$db ='covid19';

$conection= @mysqli_connect($host,$user,$password,$db);

if(!$conection){
    echo "Error en a conexion";   
} 
?>