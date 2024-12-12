<?php
include "./conexion.php";
    $id = $_POST['txtDI'];
    $monto = $_POST['txtMontoContribucion'];
    $fechaReg = $_POST["fechaRegistro"];
    $idtanda = $_POST["idtandaa"];
    //echo $fechaReg; die();

    $con = "INSERT INTO Contribuciones (id_participante, monto, fecha_contribucion) VALUES ($id, $monto, '$fechaReg');";

    echo $con;
    $conexion -> query($con) or die ($conexion -> error);

    header("Location:../html/participantes.php?id=".$idtanda);
    
    

?>