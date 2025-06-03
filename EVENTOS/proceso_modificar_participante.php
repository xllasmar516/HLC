<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$participanteid = $_POST['txtModIdParticipante'];
$nombre = $_POST['txtModNombreP'];
$email = $_POST['txtModEmail'];
$evento = $_POST['lstModEvento'];
$inscripcionEstado = $_POST['lstModInscripcionEstado'];
$acompanantes = $_POST['txtModAcompanantes'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE participantes SET participante_nombre = '" . $nombre . "' , participante_email = '" . $email . "' , evento_id = " . $evento . ", inscripcion_estado = '" . $inscripcionEstado . "' , numero_acompanantes = " . $acompanantes . " WHERE participante_id = " . $participanteid . " ;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Participante actualizado</h2>"; 
}

header( "refresh:5;url=index.php" );
// Aquí empieza la página
include_once("cabecera.html");

echo $mensaje;

?>