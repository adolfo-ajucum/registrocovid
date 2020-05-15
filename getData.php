<?php // MySQL database connection code
$connection = mysqli_connect("localhost", "root", "", "covid19") or die("Error " . mysqli_error($connection));
//Fetch productos data C  / count(*)
$sql = "SELECT * FROM covid ";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$m = 0;
$f = 0;
$o = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $row = mysqli_fetch_assoc($result);
    //$sql="SELECT * FROM covid where Sexo=='masculino'";
    $sqlr = "SELECT COUNT(id) FROM COVID where Sexo='masculino' ";
    $sexo = $row['Sexo'];
    $pacientes = $row['id'];
    $array['cols'][] = array('type' => 'string');
    if ($sexo == "masculino") {
        $m++;
    }
    if ($sexo == "femenino") {
        $f++;
    }
    if ($sexo == "otro") {
        $o++;
    }
    //    $array['rows'][] = array('c' => array( array('v'=> $sexo), array('v'=>(int)$m)) );
}
$array['rows'][] = array('c' => array(array('v' => "masculino"), array('v' => (int) $m)));
$array['rows'][] = array('c' => array(array('v' => "femenino"), array('v' => (int) $f)));
$array['rows'][] = array('c' => array(array('v' => "otro"), array('v' => (int) $o)));
$data = json_encode($array);
echo $data; ?>