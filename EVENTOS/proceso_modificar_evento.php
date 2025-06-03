<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$eventoid = $_POST['txtModIdEvento'];
$nombre = $_POST['txtModNombreE'];
$descripcion = $_POST['txtModDescripcion'];
$imagen = $_POST['urlModImagen'];
$fecha = $_POST['txtModFecha'];
$localizacion = $_POST['txtModLocalizacion'];
$organizador = $_POST['txtModOrganizador'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE eventos SET evento_nombre = '" . $nombre . "' , evento_descripcion = '" . $descripcion . "' , evento_imagen = '" . $imagen . "', evento_fecha = '" . $fecha . "' , evento_localizacion = '" . $localizacion . "', evento_organizador = '" . $organizador . "' WHERE evento_id = " . $eventoid . " ;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Evento actualizado</h2>"; 
}

header( "refresh:5;url=index.php" );
// Aquí empieza la página
include_once("cabecera.html");

echo $mensaje;

?>