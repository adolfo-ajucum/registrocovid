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
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reporte.php" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estadistica</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="reporteconsultaprueba.php" id="profile-tab" data-toggle="tab" href="reportegrafico.php" role="tab" aria-controls="profile" aria-selected="false">Consulta</a>
                            </li>
                        </ul>
                            <h3 class="register-heading" ></h3>  
                        <div class="tab-content" id="myTabContent">
                                  <?php include"reportegrafico.php"; ?> 
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <center>
                                   
                                      </tbody>
                                       </table>
                                      </center>
                                           <H2>Consulta por: Pais, Departamento, Municipio, Sexo, Edad agrupados por Genero </H2>
                                      </div>
                                      <form method="POST" action="" onSubmit="return validarForm()">
                                          <input type="text" placeholder="buscar" name="palabra">
                                          <input type="submit" value="buscar" name="buscar">
                                      </form>
                                  <script type="text/javascript">
                                            function validarForm(formulario) 
                                            {
                                                if(formulario.palabra.value.length==0) 
                                                { //¿Tiene 0 caracteres?
                                                    formulario.palabra.focus();  // Damos el foco al control
                                                    alert('Debes rellenar este campo'); //Mostramos el mensaje
                                                    return false; 
                                                 } //devolvemos el foco  
                                                 return true; //Si ha llegado hasta aquí, es que todo es correcto 
                                             }   
                                        </script>
                                <?php  
                                      if($_POST['buscar']) 
                                      {   
                                         ?>
                                         <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
                                         <table class="table table-bordered table-dark">
                                             <tr>
                                                  <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
                                                    <th scope="col">Pais </th>
                                                    <th scope="col">Departamento </th>
                                                    <th scope="col">Municipio </th>
                                                    <th scope="col">Edad </th>
                                                    <th scope="col">Sexo </th>
                                                    <th scope="col">Cantidad </th>
                                                  
                                             </tr> 
                                             <?php
                                             //obtenemos la información introducida anteriormente desde nuestro buscador PHP
                                             $buscar = $_POST["palabra"];                                      
                                              $query= mysqli_query($conection,"SELECT Pais,Departamento,Municipio,Edad,Sexo, count(*) as covid19 FROM covid WHERE Edad like '%$buscar%' 
                                                or Sexo like '%$buscar%'
                                                or Pais like '%$buscar%'
                                                or Departamento like '%$buscar%'
                                                or Municipio like '%$buscar%'
                                                group by Pais, Sexo;");
                                              /*"select Pais, Sexo , count(*) as covid19 from covid  group by Pais, Sexo;");*/
                                                $result=mysqli_num_rows($query); 
                                                while($data= mysqli_fetch_array($query))
                                             {
                                                 ?> 
                                                 <tr>
                                                     <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
                                                     cadena insertada en nuestro formulario-->
                                                      <td><?php echo $data["Pais"]; ?></td>
                                                       <td><?php echo $data["Departamento"]; ?></td>
                                                        <td><?php echo $data["Municipio"]; ?></td>
                                                         <td><?php echo $data["Edad"]; ?></td>
                                                          <td><?php echo $data["Sexo"]; ?></td>
                                                          <td><?php echo $data["covid19"]; ?></td>
                                                   </tr> 
                                                 <?php 
                                             } //fin blucle
                                          ?>







                                          </table>
                                          <?php
                                      } // fin if 
                                      ?>
                                    <br>
                                </div>
                </div>
              </form>
            </div>