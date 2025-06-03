<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idparticipante = $_POST['idparticipante'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir delete
$sql = "DELETE FROM participantes WHERE participante_id = $idparticipante;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Participante con id $idparticipante borrado</h2>"; 
}

header( "refresh:5;url=index.php" );

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>