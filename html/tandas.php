<?php
include "../php/conexion.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
}
$sql="select * from Tandas order by id_tanda ASC";
$res = $conexion->query($sql) or die ($conexion->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/styleTanda.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cabin:ital,wght@0,400..700;1,400..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="contenedor">
    <?php
        include "./aside2.php";
        ?>
        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="togleMenu()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" />
                    </svg></div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Buscar">
                        <svg class="fa" xmlns="http://www.w3.org/2000/svg" width="10" height="10" style="margin-top: 8px;">
                            <path
                                d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z" />
                        </svg>
                    </label>
                </div>
                <div class="user">
                    <img src="../img/userr.jfif" width="70" height="70">
                </div>
            </div>
            <div style="margin-left: 20px; display: flex; margin-top: 10px;">
                <h1 >Tandas</h1>
                <button style="margin-left: auto; margin-right: 20px; height: 35px; width: 140px; background-color: #6a00e4;" class="btn"
                    data-bs-toggle="modal" data-bs-target="#modalAdd"><svg width="24" height="24" fill="#fff" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm0 1.5c-4.69 0-8.497 3.808-8.497 8.498s3.807 8.497 8.497 8.497 8.498-3.807 8.498-8.497-3.808-8.498-8.498-8.498zm-.747 7.75h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/></svg></button>
            </div>

            <section  style="margin-left: 20px; margin-right: 20px;">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>PARTICIPANTES</th>
                                <th>ESTADO</th>
                                <th>MONTO</th>
                                <th>CREACION</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          while($fila=mysqli_fetch_array($res)){
                          ?>
                            <tr>
                                <td><?php echo $fila['id_tanda']?></td>
                                <td><?php echo $fila['nombre_tanda']?></td>
                                <td><?php echo $fila['num_participantes']?></td>
                                <td><?php 
                                        if($fila['estado'] == 'Activa'){
                                            echo '<span class="Activa status">Activa</span>';
                                        }else if($fila['estado'] == 'Pendiente'){
                                            echo '<span class="progreso status">Pendiente</span>';

                                        }else if($fila['estado'] == 'Finalizada'){
                                            echo '<span class="Finalizada status">Finalizada</span>';
                                        }
                                    
                                    ?> </td>
                                <td><?php echo $fila['cantidad']?></td>
                                <td><?php echo $fila['fecha_creacion']?></td>
                                <td class="text-end">
                                      <button class="custom-btn borrarTanda">
                                         <a href="../php/eliminarTanda.php?id=<?php echo $fila['id_tanda']?>"><svg width="24" height="24" fill="#dc3545" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m20.015 6.506h-16v14.423c0 .591.448 1.071 1 1.071h14c.552 0 1-.48 1-1.071 0-3.905 0-14.423 0-14.423zm-5.75 2.494c.414 0 .75.336.75.75v8.5c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-8.5c0-.414.336-.75.75-.75zm-4.5 0c.414 0 .75.336.75.75v8.5c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-8.5c0-.414.336-.75.75-.75zm-.75-5v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-16.507c-.413 0-.747-.335-.747-.747s.334-.747.747-.747zm4.5 0v-.5h-3v.5z" fill-rule="nonzero"/></svg>
                                          </a>
                                      </button>
                                      <button class="custom-btn editarTanda" data-bs-toggle="modal" data-bs-target="#modalAdd2"
                                              data-id="<?php echo $fila['id_tanda']; ?>"
                                              data-nombre="<?php echo $fila['nombre_tanda']; ?>"
                                              data-participantes="<?php echo $fila['num_participantes']; ?>"
                                              data-duracion="<?php echo $fila['duracion']; ?>"
                                              data-monto="<?php echo $fila['cantidad']; ?>"
                                              data-frecuencia="<?php echo $fila['periodoDePago']; ?>"
                                              data-aportacionesInd="<?php echo $fila['MontoDePago']; ?>"
                                              >
                                          
                                              <svg width="24" height="24" fill="#ffc107" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="m4.481 15.659c-1.334 3.916-1.48 4.232-1.48 4.587 0 .528.46.749.749.749.352 0 .668-.137 4.574-1.492zm1.06-1.061 3.846 3.846 11.321-11.311c.195-.195.293-.45.293-.707 0-.255-.098-.51-.293-.706-.692-.691-1.742-1.74-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z" fill-rule="nonzero"/>
                                              </svg>
                                          
                                      </button>
                                     
                                      <button class="custom-btn">
                                        <a href="participantes.php?id=<?php echo $fila['id_tanda']?>"> <svg width="24" height="24" fill="#343a40" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10.644 17.08c2.866-.662 4.539-1.241 3.246-3.682-3.932-7.427-1.042-11.398 3.111-11.398 4.235 0 7.054 4.124 3.11 11.398-1.332 2.455.437 3.034 3.242 3.682 2.483.574 2.647 1.787 2.647 3.889v1.031h-18c0-2.745-.22-4.258 2.644-4.92zm-12.644 4.92h7.809c-.035-8.177 3.436-5.313 3.436-11.127 0-2.511-1.639-3.873-3.748-3.873-3.115 0-5.282 2.979-2.333 8.549.969 1.83-1.031 2.265-3.181 2.761-1.862.43-1.983 1.34-1.983 2.917v.773z"/></svg></a>
                                      </button>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="modal fade modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Crear tanda</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../php/añadirTanda.php" enctype="multipart/form-data" method="post" class="needs-validation" novalidate id="form">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-6 mb-2">
                        <label for="">Nombre de la tanda:</label>
                        <input name="txtName" required type="text" class="form-control" placeholder="Inserta el nombre">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-6 mb-2">
                        <label for="">Numero de participantes:</label>
                        <input name="txtParticipantes"  required min="1" type="number" class="form-control" placeholder="Inserta el numero de participantes">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 mb-2">
                        <label for="">Inicio de la tanda:</label>
                        <input name="fechainicio"  required type="date" class="form-control" placeholder="">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-6 mb-2">
                        <label for="">Duracion (meses):</label>
                        <input name="txtDuracion" class="form-control" required type="number" id="monto" name="monto" min="0"  placeholder="0">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4 mb-2">
                        <label for="">Monto total:</label>
                        <input name="txtMonto" class="form-control" required type="number" id="monto" name="monto" min="0" step="0.01" placeholder="0.00">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-4 mb-2">
                        <label for="">Frecuencia de aportaciones:</label>
                        <select name="txtFrecuancia" class="form-control" required type="text">
                          <option value="semanal">Semanal</option>
                          <option value="quincenal">Quincenal</option>
                          <option value="mensual">Mensual</option>
                          
                    </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-4 mb-2">
                        <label for="">Aportaciones individuales:</label>
                        <input name="txtAportaciones" class="form-control" required type="number" id="monto" name="monto" min="0" step="0.01" placeholder="0.00">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 mb-2">
                        <label for="">Nota</label>
                        <input required type="text" class="form-control" placeholder="Ingrese alguna nota:">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-dark" id="btnSave" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </form>
                
                </div>
              </div>
            </div>
    </div>
    <div class="modal fade modal-lg" id="modalAdd2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar tanda</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../php/editarTanda.php" enctype="multipart/form-data" method="post" class="needs-validation" novalidate id="form">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-6 mb-2">
                      <input type="hidden" name="txtId" id="tandaId">
                        <label for="">Nombre de la tanda:</label>
                        <input id="name" name="txtName" required type="text" class="form-control" placeholder="Inserta el nombre">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-6 mb-2">
                        <label for="">Numero de participantes:</label>
                        <input id="part" name="txtParticipantes"  required min="1" type="number" class="form-control" placeholder="Inserta el numero de participantes">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 mb-2">
                        <label for="">Duracion (meses):</label>
                        <input id="duracion" name="txtDuracion" class="form-control" required type="text" id="monto" name="monto" min="0"  placeholder="0">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4 mb-2">
                        <label for="">Monto total:</label>
                        <input id="montoEdit" name="txtMonto" class="form-control" required type="text" id="monto" name="monto" min="0" step="0.01" placeholder="0.00">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-4 mb-2">
                        <label for="">Frecuencia de aportaciones:</label>
                        <select id="frec" name="txtFrecuancia" class="form-control" required type="text">
                          <option value="semanal">Semanal</option>
                          <option value="quincenal">Quincenal</option>
                          <option value="mensual">Mensual</option>
                          
                    </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                      <div class="col-4 mb-2">
                        <label for="">Aportaciones individuales:</label>
                        <input id="aportaciones" name="txtAportaciones" class="form-control" required type="number" id="monto" name="monto" min="0" step="0.01" placeholder="0.00">
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Datos no validos</div>
                      </div>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-dark" id="btnSave" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </form>
                
                </div>
              </div>
            </div>
    </div>
    <script>
    var botones = document.getElementsByClassName("editarTanda");

for (var i = 0; i < botones.length; i++) {
  botones[i].onclick = (evt) => {
    var btn = evt.target.closest('button');
    console.log("asdasds",btn);
    // Obtener los valores de los atributos data- del botón
    var id = btn.getAttribute("data-id");
    var nombre = btn.getAttribute("data-nombre");
    var participantes = btn.getAttribute("data-participantes");
    var duracion = btn.getAttribute("data-duracion");
    var monto = btn.getAttribute("data-monto");
    var aportacionesInd = btn.getAttribute("data-aportacionesInd");
    var frecuencia = btn.getAttribute("data-frecuencia");

   


    // Asignar estos valores a los campos del formulario en el modal
    console.log(monto,document.getElementById("monto"));
    document.getElementById("tandaId").value = id;
    document.getElementById("name").value = nombre;
    document.getElementById("part").value = participantes;
    document.getElementById("duracion").value = duracion;
    document.getElementById("montoEdit").value = monto;
    document.getElementById("frec").value = frecuencia;
    document.getElementById("aportaciones").value = aportacionesInd;

  }
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        function togleMenu() {
            let toggle = document.querySelector('.toggle')
            let nav = document.querySelector('.nav')
            let main = document.querySelector('.main')
            toggle.classList.toggle('active')
            nav.classList.toggle('active')
            main.classList.toggle('active')
        }
    </script>
  
   
</body>

</html>