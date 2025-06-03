<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verifico si ha llegado el parametro de tipo 
if (isset($_GET['txtFechaEvento'])) {
    // Recuperar parámetro
    $fecha = $_GET['txtFechaEvento'];

    $sql = "SELECT e.* FROM eventos e WHERE e.evento_fecha = '" . $fecha . "' ORDER BY e.evento_id ASC;";

} else { // No recibo idtipo para filtrar
    $sql = "SELECT e.* FROM eventos e ORDER BY e.evento_id ASC;";

}

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de eventos</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>EVENTOID</th><th>NOMBRE</th><th>DESCRIPCIÓN</th><th>IMAGEN</th><th>FECHA</th><th>LOCALIZACIÓN</th><th>ORGANIZADOR</th><th>EDITAR o BORRAR</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['evento_id'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_descripcion'] . "</td>";
    $mensaje .= "<td><img height='75' src='" . $fila['evento_imagen'] . "'/></td>";
    $mensaje .= "<td>" . $fila['evento_fecha'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_localizacion'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_organizador'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_evento.php' method='post'>";
    $mensaje .= "<input type='hidden' name='evento' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_evento.php' method='post'>";
    $mensaje .= "<input type='hidden' name='eventoid' value='" . $fila['evento_id']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;