<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT evento_id, evento_nombre FROM eventos ORDER BY evento_id ASC;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["evento_id"] . "'>" . $fila["evento_nombre"] . "</option>";
}

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="listado_participantes.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar participantes de un evento</legend>
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="lstEventoP">Evento</label>
                    <div class="col-md-6 col-lg-4">
                        <select name="lstEventoP" id="lstEventoP" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="btnAceptarBuscarParticipantesEvento"></label>
                    <div class="col-md-6 col-lg-4">
                        <input type="submit" id="btnAceptarBuscarParticipantesEvento" name="btnAceptarBuscarParticipantesEvento" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>