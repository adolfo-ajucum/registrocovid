<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<
<!------ Include the above in your HEAD tag ---------->
<?php
include"registro.php";
include"conexion.php";
?>

<div class="container register">
<form action="" method="POST">

                <div class="row">
                   <!--form  action="buscar_usuario.php" method="get" class="form_search">                                 
                                  <input type="text"  name="busqueda" id="busqueda" pla
                                  ceholder="Buscar">         
                                  <input type="submit" value="Buscar" class="btn_search" >
                            </form-->
              
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reporte.php" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estadistica</a>
                            </li>
                               <li class="nav-item">
                                <a class="nav-link" href="reporteconsultaprueba.php" id="profile-tab" data-toggle="tab" href="reportegrafico.php" role="tab" aria-controls="profile" aria-selected="false">Hacer_Consulta</a>
                            </li>
                        </ul>
                            <h3 class="register-heading" ></h3>
                           
                             
                        <div class="tab-content" id="myTabContent">
                            <!--se agrego la tabla de generos grafico0  -->
                            <?php include"reportegrafico1.php"; ?> 
                            

                            
                            <!--div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <center>
                                    <br>
                                     <br>
                                      <br>
                                  <table class="table table-bordered table-dark">
                                    
                                     <thead >
                                       <tr>
                                       <th scope="col">Pais </th>
                                       <th scope="col">Generos</th>
                                        <th scope="col">Cantidad </th>
                                      
                                       </thead>
                                     
                                         <tbody>

                                       </tr>

                            <?php
                              $query= mysqli_query($conection,"select Pais, Sexo , count(*) as covid19 from covid  group by Pais, Sexo;");

                                    $result=mysqli_num_rows($query);

                                    if($result > 0){
                                        while($data= mysqli_fetch_array($query)){
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $data["Pais"]; ?></td>
                                    <td><?php echo $data["Sexo"]; ?></td>
                                    <td><?php echo $data["covid19"]; ?></td>
                                                               
                                    </tr>
                                       <?php 
                                       }
                                    }
                                    ?>
              
                                    </tbody-->
   
                                    </table>




                               
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
                                       </table>
                                      </center>
                                    </div>
                                 </table>
                                 <br>       
                               </div>
                                    </div>
                                  </form>
                                </div>
            