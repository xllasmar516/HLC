<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$idparticipante = $_GET['txtIdParticipante'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT p.*, e.evento_nombre AS evento FROM participantes p, eventos e 
WHERE e.evento_id = p.evento_id 
AND participante_id = $idparticipante;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if ($fila) { // Mostrar tabla de datos ($fila != null)
    $mensaje = "<h2 class='text-center'>Participante localizado</h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr><th>PARTICIPANTEID</th><th>NOMBRE</th><th>EMAIL</th><th>EVENTO</th><th>ESTADO DE INSCRIPCIÓN</th><th>Nº ACOMPAÑANTES</th><th>FECHA DE INSCRIPCIÓN</th><th>EDITAR o BORRAR</th></tr></thead>";
    $mensaje .= "<tbody>";
    $mensaje .= "<tr><td>" . $fila['participante_id'] . "</td>";
    $mensaje .= "<td>" . $fila['participante_nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['participante_email'] . "</td>";
    $mensaje .= "<td>" . $fila['evento'] . "</td>";
    $mensaje .= "<td>" . $fila['inscripcion_estado'] . "</td>";
    $mensaje .= "<td>" . $fila['numero_acompanantes'] . "</td>";
    $mensaje .= "<td>" . $fila['inscripcion_fecha'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_participante.php' method='post'>";
    $mensaje .= "<input type='hidden' name='participante' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<form class='d-inline' action='proceso_borrar_participante.php' method='post'>";
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='idparticipante' value='$idparticipante'/>";
    $mensaje .= "<button class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td>";

    $mensaje .= "</tr></tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>El participante con id $idparticipante no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>