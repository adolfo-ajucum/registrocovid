<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<!------ Include the above in your HEAD tag ---------->
<?php
include"registro.php";
include"conexion.php";
?>



<div class="container register">
<form action="" method="POST">

                <div class="row">
                    
                    <!DOCTYPE html>
<html>
    <head>
    <title>Crear un gráfico circular con Google Chart usando PHP y MySQL </title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            function drawChart() {
                // call ajax function to get sports data
                var jsonData = $.ajax({
                    url: "getData.php",
                    dataType: "json",
                    async: false
                }).responseText;
                //The DataTable object is used to hold the data passed into a visualization.
                var data = new google.visualization.DataTable(jsonData);

                // To render the pie chart.
                var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
                chart.draw(data, {width: 800, height: 500});
            }
            // load the visualization api
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);
        </script>
    
    </head>
    <body>
           <div id="chart_container"></div>
    </body>
</html>
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reporte.php" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estadistica</a>
                            </li>
                             <!--li class="nav-item">
                                <a class="nav-link" href="reporte.php" id="profile-tab" data-toggle="tab" href="reportegrafico.php" role="tab" aria-controls="profile" aria-selected="false">Grafico</a>
                            </li-->
                        </ul>
                            <h3 class="register-heading">Listado de Personas detectadas con covid_19</h3>
                        <div class="tab-content" id="myTabContent">
                      
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <center>
                                    <br>
                                     <br>
                                      <br>
                                     <table class="table table-bordered table-dark">
                                    
                                     <thead >
                                       <tr>
                                       <th scope="col">1er Nombre  </th>
                                       <th scope="col">2do Nombre </th>
                                       <th scope="col">1er Apellido </th>
                                       <th scope="col">2do Apellido </th>
                                       <th scope="col">Sexo</th>
                                       <th scope="col">Edad</th>
                                       <th scope="col">Municipio</th>
                                       <th scope="col">Departamento</th>
                                       <th scope="col">Pais</th>
                                       <th scope="col">Fecha</th>
                                       <th scope="col">No</th>
                                       </thead>
                                     
                                         <tbody>
                                       </tr>
                                    <?php
                                    $query= mysqli_query($conection,"SELECT *FROM covid");
                                    
                                    $result=mysqli_num_rows($query);
                                    if($result > 0){
                                        while($data= mysqli_fetch_array($query)){
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $data["PrimerNombre"]; ?></td>
                                    <td><?php echo $data["SegundoNombre"]; ?></td>
                                    <td><?php echo $data["PrimerApellido"]; ?></td>
                                    <td><?php echo $data["SegundoApellido"]; ?></td>
                                    <td><?php echo $data["Sexo"]; ?></td>
                                    <td><?php echo $data["Edad"]; ?></td>
                                    <td><?php echo $data["Municipio"]; ?></td>
                                    <td><?php echo $data["Departamento"]; ?></td>
                                    <td><?php echo $data["Pais"]; ?></td>
                                    <td><?php echo $data["Fecha"]; ?></td>
                                    <td><?php echo $data["id"]; ?></td>
                                    </tr>
                                       <?php 
                                       }
                                    }
                                    ?>
							
                                    </tbody>
   <!--?php include"reportegrafico.html"; ?-->
                                    </table>
								                      </center>
                                    </div>
                                     
                                    <br>
                                
                                </div>

                        
                       
                  
                </div>
              </form>
            </div>