<?php 
// MySQL database connection code
$connection = mysqli_connect("localhost","root","zTfKnJNaG8CN","covid19") or die("Error " . mysqli_error($connection));
//Fetch productos data C  / count(*)
$sql = "SELECT * FROM covid "; 
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
	//$sql="SELECT * FROM covid where Sexo=='masculino'";
	$sqlr= "SELECT COUNT(id) FROM COVID where Sexo='masculino' ";
    $cantidad = $row['Sexo'];
    $unidades_vendidas = $row['id'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $cantidad), array('v'=>(int)$unidades_vendidas)) );


}
$data = json_encode($array);
echo $data;
?>
