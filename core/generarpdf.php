<?php 
ob_start();
require_once('includes/conexionbd.php');  // Llama al archivo que contiene la conección a la BD.

// Abre la Conexión con la BD.
$conexion = AbreConn('dbe');

// Creo la consulta de selección SQL a la BD.
$sql = "SELECT Clientes.IdCliente, Clientes.NomRazSoc, Clientes.RFC, Clientes_Domicilios.Calle, 
Clientes_Domicilios.NumExterior, Clientes_Domicilios.NumInterior, Clientes_Domicilios.Colonia, Municipios.Municipio,
Estados.Estado, Paises.Pais, Clientes_Domicilios.CP, Clientes.Estatus 
FROM Clientes, Clientes_Domicilios, Municipios, Estados, Paises     
WHERE Clientes.IdCliente = Clientes_Domicilios.IdCliente AND Clientes_Domicilios.IdMunicipio = Municipios.IdMunicipio
AND Clientes_Domicilios.IdEstado = Estados.IdEstado AND Clientes_Domicilios.IdPais = Paises.IdPais 
AND Clientes.IdEmpresa = 1 AND Clientes_Domicilios.IdTipoDom = 1 AND RFC = 'XEXX010101000' ORDER BY Clientes.NomRazSoc ASC";
// Ejecuto la consulta de selección.
mysqli_set_charset($conexion,"utf8"); // Función que Codifica a UTF8 para evitar errores de JSON.
$result = mysqli_query($conexion, $sql);    
?>  

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<title>Ejemplo de Exportación de HTML a PDF</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOSNIPPET">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link href="assests/bootstrap/css/bootstrap-3.3.7.min.css" type="text/css" rel="stylesheet">      
<script src="assests/jquery/jquery.min.js" type="text/javascript"></script> 
<script src="assests/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<table border="0" width="100%" height="60" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td></tr></table>
<div class="container">
    <div class="btn btn-primary"><a href="generarpdf.php" style="color:#FFF; text-decoration:none; " target="_blank">Visualizar en PDF</a></div>  
<div class="row">
    <div class="col-md-14">             
        <div class="panel panel-default">
            <br><p>
            <p><font face="arial" size="5" color="#000000">Ejemplo de exportación de Tabla HTML a PDF usando la librería "dompdf"</font></p> 
            <br><p>  
            <p><font face="verdana" size="3" color="#000000"><b>Clientes</b></font></p>  
            <div class="panel-body"> 
<?php               
            echo '<table class="table table-striped table-hover table-responsive cell-border" id="TabLisClientes">';
                echo '<thead>';
                    echo '<tr style="background-color:#e6e6e6;">';
                        echo '<th>Nombre o Razón Social</th>';
                        echo '<th>R.F.C.</th>';
                        echo '<th>Calle</th>';
                        echo '<th>No.Ext.</th>';
                        echo '<th>No.Int.</th>';
                        echo '<th>Colonia</th>';
                        echo '<th>Municipio</th>';
                        echo '<th>Estado</th>';
           