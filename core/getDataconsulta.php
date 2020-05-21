<?php 
// MySQL database connection code
$connection = mysqli_connect("localhost","root","","covid19") or die("Error " . mysqli_error($connection));
//Fetch productos data C  / count(*)
$sql = "SELECT * FROM covid "; 
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
	//$sql="SELECT * FROM covid where Sexo=='masculino'";
	$sqlr= "SELECT Pais,Departamento,Municipio,Edad,Sexo, count(*) as covid19 FROM covid WHERE Edad like '%$buscar%' 
                                                or Sexo like '%$buscar%'
                                                or Pais like '%$buscar%'
                                                or Departamento like '%$buscar%'
                                                or Municipio like '%$buscar%'
                                                group by Pais, Sexo;";
    $cantidad = $row['Sexo'];
    $unidades_vendidas = $row['id'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $cantidad), array('v'=>(int)$unidades_vendidas)) );
}
$data = json_encode($array);
echo $data;
?>

