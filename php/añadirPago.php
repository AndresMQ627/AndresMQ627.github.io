<?php
include "./conexion.php";
    $id = $_POST['txtDII'];
    $montoPago = $_POST['txtMontoPago'];
    $fechaReg = $_POST["fechaRegistroPago"];
    $idtanda = $_POST["Idtandaa"];
    //echo $fechaReg; die();

    $montoPago = $_POST['txtMontoPago'];
    $montoPago = $_POST['txtMontoPago'];
    $con = "INSERT INTO Pagos (id_pago, id_tanda, monto, id_participante, fecha_pago) VALUES (0, $idtanda,$montoPago, $id, '$fechaReg');";

    echo $con;
    $conexion -> query($con) or die ($conexion -> error);

    header("Location:../html/participantes.php?id=".$idtanda);

    
    

?>