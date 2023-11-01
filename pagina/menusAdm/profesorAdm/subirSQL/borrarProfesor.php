<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../../inicio.html");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../../conectarSQL/conectar_SQL.php";

    if (!empty($_GET['buscarId'])) {
        $buscarId = $_GET['buscarId'];
        $sqlBorrarCuentaPro = "DELETE FROM profesor WHERE id='" . $buscarId. "'";
        
    }

    if(!empty($_GET['buscarRut'])){
        $buscarRut = $_GET['buscarRut']."Bank";
        $sqlBorrarBank = "DELETE FROM bancoprofesor WHERE idRut='" . $buscarRut."'";
    }

    if (($conexion->query($sqlBorrarCuentaPro) === TRUE)) {
        if (($conexion->query($sqlBorrarBank) === TRUE)) {
            header("Location: ../profesor.php");
        } else {
            echo "Error: " . $sql . $conexion->error;
        }
    } else {
        echo "Error: " . $sql . $conexion->error;
    }

    $conexion->close();
}
