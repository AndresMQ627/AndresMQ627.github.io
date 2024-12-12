<?php
include "../php/conexion.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
}

$sql="select * from Participantes where id_tanda=$id ";

$sql2="select * from Tandas where id_tanda=$id";
$res = $conexion->query($sql) or die ($conexion->error);

$res2 = $conexion->query($sql2) or die ($conexion->error);
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
        <?php
                          $fila=mysqli_fetch_array($res2);
                          ?>
        <h1>Participantes/
          <?php echo $fila['nombre_tanda']?>
        </h1>
        <button style="margin-left: auto; margin-right: 20px; height: 35px; width: 140px; background-color: #6a00e4;"
          class="btn" data-bs-toggle="modal" data-bs-target="#modalAdd"><svg width="24" height="24" fill="#fff"
            clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm0 1.5c-4.69 0-8.497 3.808-8.497 8.498s3.807 8.497 8.497 8.497 8.498-3.807 8.498-8.497-3.808-8.498-8.498-8.498zm-.747 7.75h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z"
              fill-rule="nonzero" />
          </svg></button>

      </div>

      <section style="margin-left: 20px; margin-right: 20px;">
        <div class="table-responsive">
          <table class="custom-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>ID TANDA</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>TELEFONO</th>
                <th>FECHA REGISTRO</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                          $filaT = mysqli_fetch_array($res);
                          while($fila=mysqli_fetch_array($res)){
                          ?>
              <tr>
                <?php
                                if($fila['id_tanda'] == $filaT['id_tanda']){
                                    
                               
                                ?>
                <td>
                  <?php echo $fila['id_participante']?>
                </td>
                <td>
                  <?php echo $fila['id_tanda']?>
                </td>
                <td>
                  <?php echo $fila['nombre']?>
                </td>
                <td>
                  <?php echo $fila['email']?>
                </td>
                <td>
                  <?php echo $fila['telefono']?>
                </td>
                <td>
                  <?php echo $fila['fecha_registro']?>
                </td>
                <td class="text-end">
                  <button class="custom-btn borrarTanda">
                    <a
                      href="../php/eliminarParticipante.php?id_tanda=<?php echo $id ?>&id=<?php echo $fila['id_participante']?>">
                      <svg width="24" height="24" fill="#dc3545" clip-rule="evenodd" fill-rule="evenodd"
                        stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="m20.015 6.506h-16v14.423c0 .591.448 1.071 1 1.071h14c.552 0 1-.48 1-1.071 0-3.905 0-14.423 0-14.423zm-5.75 2.494c.414 0 .75.336.75.75v8.5c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-8.5c0-.414.336-.75.75-.75zm-4.5 0c.414 0 .75.336.75.75v8.5c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-8.5c0-.414.336-.75.75-.75zm-.75-5v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-16.507c-.413 0-.747-.335-.747-.747s.334-.747.747-.747zm4.5 0v-.5h-3v.5z"
                          fill-rule="nonzero" />
                      </svg></a>

                  </button>
                  <button type="button" class="custom-btn editarParticipante"
                  data-id="<?php echo $fila['id_participante']; ?>"
                  data-nombre="<?php echo $fila['nombre'];?>"
                  data-email="<?php echo $fila['email']; ?>"
                  data-tel="<?php echo $fila['telefono']; ?>"
                   data-bs-toggle="modal"
                    data-bs-target="#editParticipantModal" >

                    <svg width="24" height="24" fill="#ffc107" clip-rule="evenodd" fill-rule="evenodd"
                      stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="m4.481 15.659c-1.334 3.916-1.48 4.232-1.48 4.587 0 .528.46.749.749.749.352 0 .668-.137 4.574-1.492zm1.06-1.061 3.846 3.846 11.321-11.311c.195-.195.293-.45.293-.707 0-.255-.098-.51-.293-.706-.692-.691-1.742-1.74-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z"
                        fill-rule="nonzero" />
                    </svg>
                  </button>
                  <button class="custom-btn addContribucion" data-bs-toggle="modal" data-bs-target="#addContribucion" data-id="<?php echo $fila['id_participante']; ?>">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 12c-3.313 0-6 2.687-6 6s2.687 6 6 6 6-2.687 6-6-2.687-6-6-6zm.5 8.474v.526h-.5v-.499c-.518-.009-1.053-.132-1.5-.363l.228-.822c.478.186 1.114.383 1.612.27.574-.13.692-.721.057-1.005-.465-.217-1.889-.402-1.889-1.622 0-.681.52-1.292 1.492-1.425v-.534h.5v.509c.362.01.768.073 1.221.21l-.181.824c-.384-.135-.808-.257-1.222-.232-.744.043-.81.688-.29.958.856.402 1.972.7 1.972 1.773.001.858-.672 1.315-1.5 1.432zm1.624-10.179c1.132-.223 2.162-.626 2.876-1.197v.652c0 .499-.386.955-1.007 1.328-.581-.337-1.208-.6-1.869-.783zm-2.124-5.795c2.673 0 5-1.007 5-2.25s-2.327-2.25-5-2.25c-2.672 0-5 1.007-5 2.25s2.328 2.25 5 2.25zm.093-2.009c-.299-.09-1.214-.166-1.214-.675 0-.284.334-.537.958-.593v-.223h.321v.211c.234.005.494.03.784.09l-.116.342c-.221-.051-.467-.099-.708-.099l-.072.001c-.482.02-.521.287-.188.399.547.169 1.267.292 1.267.74 0 .357-.434.548-.967.596v.22h-.321v-.208c-.328-.003-.676-.056-.962-.152l.147-.343c.244.063.552.126.828.126l.208-.014c.369-.053.443-.3.035-.418zm-11.093 13.009c1.445 0 2.775-.301 3.705-.768.311-.69.714-1.329 1.198-1.899-.451-1.043-2.539-1.833-4.903-1.833-2.672 0-5 1.007-5 2.25s2.328 2.25 5 2.25zm.093-2.009c-.299-.09-1.214-.166-1.214-.675 0-.284.335-.537.958-.593v-.223h.321v.211c.234.005.494.03.784.09l-.117.342c-.22-.051-.466-.099-.707-.099l-.072.001c-.482.02-.52.287-.188.399.547.169 1.267.292 1.267.74 0 .357-.434.548-.967.596v.22h-.321v-.208c-.329-.003-.676-.056-.962-.152l.147-.343c.244.063.552.126.828.126l.208-.014c.368-.053.443-.3.035-.418zm4.003 8.531c-.919.59-2.44.978-4.096.978-2.672 0-5-1.007-5-2.25v-.652c1.146.918 3.109 1.402 5 1.402 1.236 0 2.499-.211 3.549-.611.153.394.336.773.547 1.133zm-9.096-3.772v-.651c1.146.917 3.109 1.401 5 1.401 1.039 0 2.094-.151 3.028-.435.033.469.107.926.218 1.37-.888.347-2.024.565-3.246.565-2.672 0-5-1.007-5-2.25zm0-2.5v-.652c1.146.918 3.109 1.402 5 1.402 1.127 0 2.275-.176 3.266-.509-.128.493-.21 1.002-.241 1.526-.854.298-1.903.483-3.025.483-2.672 0-5-1.007-5-2.25zm11-11v-.652c1.146.918 3.109 1.402 5 1.402 1.892 0 3.854-.484 5-1.402v.652c0 1.243-2.327 2.25-5 2.25-2.672 0-5-1.007-5-2.25zm0 5v-.652c.713.571 1.744.974 2.876 1.197-.661.183-1.287.446-1.868.783-.622-.373-1.008-.829-1.008-1.328zm0-2.5v-.651c1.146.917 3.109 1.401 5 1.401 1.892 0 3.854-.484 5-1.401v.651c0 1.243-2.327 2.25-5 2.25-2.672 0-5-1.007-5-2.25z"/></svg></a>
                  </button>

                  <button class="custom-btn addPago" data-bs-toggle="modal" data-bs-target="#PagoTanda" data-id="<?php echo $fila['id_participante']; ?>">
                        <a href="#"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 22h-20c-1.104 0-2-.896-2-2v-12c0-1.104.896-2 2-2h1.626l.078.283c.194.631.518 1.221.95 1.717h-2.154c-.276 0-.5.224-.5.5v5.5h20v-5.5c0-.276-.224-.5-.5-.5h-2.154c.497-.569.853-1.264 1.029-2h1.625c1.104 0 2 .896 2 2v12c0 1.104-.896 2-2 2zm-20-5v2.5c0 .276.224.5.5.5h19c.276 0 .5-.224.5-.5v-2.5h-20zm8.911-5h-2.911c.584-1.357 1.295-2.832 2-4-.647-.001-1.572.007-2 0-2.101-.035-2.987-1.806-3-3-.016-1.534 1.205-3.007 3-3 1.499.006 2.814.872 4 2.313 1.186-1.441 2.501-2.307 4-2.313 1.796-.007 3.016 1.466 3 3-.013 1.194-.899 2.965-3 3-.428.007-1.353-.001-2 0 .739 1.198 1.491 2.772 2 4h-2.911c-.241-1.238-.7-2.652-1.089-3.384-.388.732-.902 2.393-1.089 3.384zm-2.553-7.998c-1.131 0-1.507 1.918.12 1.998.237.012 2.235 0 2.235 0-1.037-1.44-1.52-1.998-2.355-1.998zm7.271 0c1.131 0 1.507 1.918-.12 1.998-.237.012-2.222 0-2.222 0 1.037-1.44 1.507-1.998 2.342-1.998z"/></svg></a>
                  </button>


                </td>
              </tr>
              <?php } }?>
            </tbody>
          </table>
        </div>
      </section>
    </div>


  </div>    
  <div class="modal fade modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir participante</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../php/añadirParticipante.php" method="post" class="needs-validation" novalidate id="form">
            <div class="modal-body">
              <input type="hidden" name="txtID" value="<?php echo $id ?>">
              <div class="row">
                <div class="col-6 mb-2">
                  <label for="">Nombre:</label>
                  <input name="txtName" required type="text" class="form-control" placeholder="Inserta el nombre">
                  <div class="valid-feedback">Correcto</div>
                  <div class="invalid-feedback">Datos no validos</div>
                </div>
                <div class="col-6 mb-2">
                  <label for="">Email:</label>
                  <input name="txtEmail" required type="email" class="form-control" placeholder="Inserta el email">
                  <div class="valid-feedback">Correcto</div>
                  <div class="invalid-feedback">Datos no validos</div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 mb-2">
                  <label for="">Telefono:</label>
                  <input name="txtTel" class="form-control" maxlength="12" required type="varchar" id="monto"
                    name="monto" min="0" step="" placeholder="636-111-1111">
                  <div class="valid-feedback">Correcto</div>
                  <div class="invalid-feedback">Datos no validos</div>
                </div>
                <div class="row">
                  <div class="col-12 mb-2">
                    <label for="">Fecha de registro:</label>
                    <input name="fechaReg" required type="date" class="form-control" placeholder="">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Datos no validos</div>
                  </div>
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
  <!-- Modal -->
  <div class="modal fade" id="editParticipantModal" tabindex="-1" aria-labelledby="editParticipantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../php/editarParticipante.php" method="post" action="editarParticipante.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editParticipantLabel">Editar Participante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
               
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="txtid" id="participantId">
                    <input type="hidden" name="txtIdTanda" value="<?php echo $id ?>">
                    <!-- Campos de edición -->
                    <div class="mb-3">
                        <label for="participantName" class="form-label">Nombre</label>
                        <input required type="text" class="form-control" id="participantName" name="txtNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="participantEmail" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="participantEmail" name="txtEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="participantPhone" class="form-label">Teléfono</label>
                        <input required type="tel" class="form-control" id="participantPhone" name="txtTel" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addContribucion" tabindex="-1" aria-labelledby="editParticipantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../php/añadirContribucion.php" method="post" action="editarParticipante.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editParticipantLabel">Añadir Contribucion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
               
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="txtDI" id="participantID">
                    <input type="hidden" name="idtandaa" value="<?php echo $id ?>">
                    <!-- Campos de edición -->
                    <div class="mb-3">
                        <label for="participantName" class="form-label">Monto</label>
                        <input min="0" step="0.01"  type="number" class="form-control" name="txtMontoContribucion" required placeholder="$0.00">
                    </div>
                    <div class="mb-3">
                        <label for="">Inicio de la tanda:</label>
                        <input name="fechaRegistro"  required type="date" class="form-control" placeholder="">
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="PagoTanda" tabindex="-1" aria-labelledby="editParticipantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../php/añadirpago.php" method="post" action="editarParticipante.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editParticipantLabel">Pago Tanda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
               
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="txtDII" id="participantIDD">
                    <input type="hidden" name="Idtandaa" value="<?php echo $id ?>">
                    <!-- Campos de edición -->
                    <div class="mb-3">
                        <label for="participantName" class="form-label">Monto a pagar</label>
                        <input min="0" step="0.01"  type="number" class="form-control" name="txtMontoPago" required placeholder="$0.00">
                    </div>
                    <div class="mb-3">
                        <label for="">Inicio de la tanda:</label>
                        <input name="fechaRegistroPago"  required type="date" class="form-control" placeholder="">
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var botones3 = document.getElementsByClassName("addPago");

for (var i = 0; i < botones3.length; i++) {
  botones3[i].onclick = (evt) => {
    var btn = evt.target.closest('button');
    
    // Obtener los valores de los atributos data- del botón
    var id = btn.getAttribute("data-id");
    


    // Asignar estos valores a los campos del formulario en el modal
    document.getElementById("participantIDD").value = id;
    

  }
}
</script>
<script>
    var botones2 = document.getElementsByClassName("addContribucion");

for (var i = 0; i < botones2.length; i++) {
  botones2[i].onclick = (evt) => {
    var btn = evt.target.closest('button');
    
    // Obtener los valores de los atributos data- del botón
    var id = btn.getAttribute("data-id");
    


    // Asignar estos valores a los campos del formulario en el modal
    document.getElementById("participantID").value = id;
    

  }
}



  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script>
    var botones = document.getElementsByClassName("editarParticipante");

for (var i = 0; i < botones.length; i++) {
  botones[i].onclick = (evt) => {
    var btn = evt.target.closest('button');
    
    // Obtener los valores de los atributos data- del botón
    var id = btn.getAttribute("data-id");
    var nombre = btn.getAttribute("data-nombre");
    var email = btn.getAttribute("data-email");
    var tel = btn.getAttribute("data-tel");


    // Asignar estos valores a los campos del formulario en el modal
    document.getElementById("participantId").value = id;
    document.getElementById("participantName").value = nombre;
    document.getElementById("participantEmail").value = email;
    document.getElementById("participantPhone").value = tel;

  }
}



  </script>
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