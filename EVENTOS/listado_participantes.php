<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verifico si ha llegado el parametro de evento
if (isset($_GET['lstEventoP'])) {
    // Recuperar parámetro
    $eventoid = $_GET['lstEventoP'];

    $sql = "SELECT p.*, e.evento_nombre AS evento FROM participantes p, eventos e 
    WHERE p.evento_id = e.evento_id AND p.evento_id = $eventoid ORDER BY p.participante_id ASC;";

} else { // No recibo idtipo para filtrar
    $sql = "SELECT p.*, e.evento_nombre AS evento FROM participantes p, eventos e 
    WHERE p.evento_id = e.evento_id ORDER BY p.participante_id ASC;";

}

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de participantes</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>PARTICIPANTEID</th><th>NOMBRE</th><th>EMAIL</th><th>EVENTO</th><th>ESTADO DE INSCRIPCIÓN</th><th>Nº ACOMPAÑANTES</th><th>FECHA DE INSCRIPCIÓN</th><th>EDITAR o BORRAR</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['participante_id'] . "</td>";
    $mensaje .= "<td>" . $fila['participante_nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['participante_email'] . "</td>";
    $mensaje .= "<td>" . $fila['evento'] . "</td>";
    $mensaje .= "<td>" . $fila['inscripcion_estado'] . "</td>";
    $mensaje .= "<td>" . $fila['numero_acompanantes'] . "</td>";
    $mensaje .= "<td>" . $fila['inscripcion_fecha'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_participante.php' method='post'>";
    $mensaje .= "<input type='hidden' name='participante' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_participante.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idparticipante' value='" . $fila['participante_id']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>