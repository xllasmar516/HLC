<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$eventoid = $_GET['txtIdEvento'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT e.* FROM eventos e WHERE e.evento_id = $eventoid;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if ($fila) { // Mostrar tabla de datos ($fila != null)
    $mensaje = "<h2 class='text-center'>Evento localizado</h2>";
    $mensaje .= "<table class='table table-striped'>";
    $mensaje .= "<thead><tr><th>EVENTOID</th><th>NOMBRE</th><th>DESCRIPCIÓN</th><th>IMAGEN</th><th>FECHA</th><th>LOCALIZACIÓN</th><th>ORGANIZADOR</th><th>EDITAR o BORRAR</th></tr></thead>";
    $mensaje .= "<tbody>";
    $mensaje .= "<tr><td>" . $fila['evento_id'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_descripcion'] . "</td>";
    $mensaje .= "<td><img height='75' src='" . $fila['evento_imagen'] . "'/></td>";
    $mensaje .= "<td>" . $fila['evento_fecha'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_localizacion'] . "</td>";
    $mensaje .= "<td>" . $fila['evento_organizador'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_evento.php' method='post'>";
    $mensaje .= "<input type='hidden' name='evento' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<form class='d-inline me-1' action='proceso_borrar_evento.php' method='post'>";
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='eventoid' value='$eventoid'/>";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td>";

    $mensaje .= "</tr></tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>El evento con id $eventoid no está registrado</h2>";
}


// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>