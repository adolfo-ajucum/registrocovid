<?php 

include"conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['PrimerNombre']) || empty($_POST['SegundoNombre']) || empty($_POST['PrimerApellido']) || empty($_POST['SegundoApellido']) || empty($_POST['Sexo']) || empty($_POST['Edad']) || empty($_POST['Municipio']) || empty($_POST['Departamento']) || empty($_POST['Pais']) ||empty($_POST['Fecha']))
{
    $alert='<p class="msg_error"> todos los campos son obligatorios</p>';
} else{
    
    $PrimerNombre =$_POST['PrimerNombre'];
    $SegundoNombre =$_POST['SegundoNombre'];
    $PrimerApellido =$_POST['PrimerApellido'];
    $SegundoApellido =$_POST['SegundoApellido'];
    $Sexo =$_POST['Sexo'];
    $Edad =$_POST['Edad'];
    $Municipio =$_POST['Municipio'];
    $Departamento =$_POST['Departamento'];
    $Pais =$_POST['Pais'];
    $Fecha=$_POST['Fecha'];
    
    $sql = "INSERT INTO covid(PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Sexo,Edad,Municipio,Departamento,Pais,Fecha)
        VALUES('$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$Sexo','$Edad','$Municipio','$Departamento','$Pais','$Fecha')";
    $query_insert = mysqli_query($conection, $sql);
    if($query_insert){
        $alert='<p class="msg_save">Registro creado correctamente. </p>';
    }else{
        $alert='<p class="msg_error">Error al crear registro</p>' . mysqli_error($conection);
    }

}


}
?>