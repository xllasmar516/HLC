<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT evento_id, evento_nombre FROM eventos;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["evento_id"] . "'>" . $fila["evento_nombre"] . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>
<div class="container" id="formularios">
    <div class="row">
        <!-- ALTA PARTICIPANTE -->
        <form
            class="form-horizontal" action="proceso_alta_participante.php"
            name="frmAltaParticipante"
            id="frmAltaParticipante" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de participante</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaNombreP">Nombre</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaNombreP"
                            name="txtAltaNombreP"
                            class="form-control input-md"
                            type="text" />
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="txtAltaEmail">Email</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaEmail"
                            name="txtAltaEmail"
                            class="form-control input-md"
                            type="email" />
                    </div>
                </div>

                <!-- Desplegable eventos-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="lstAltaEvento">Evento</label>
                    <div class="col-md-6 col-lg-4">
                        <select
                            class="form-select"
                            name="lstAltaEvento"
                            id="lstAltaEvento">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>

                <!-- Desplegable estado inscripcion-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="lstAltaInscripcionEstado">Estado de la inscripción</label>
                    <div class="col-md-6 col-lg-4">
                        <select
                            class="form-select"
                            name="lstAltaInscripcionEstado"
                            id="lstAltaInscripcionEstado">
                            <option selected value="pendiente">Pendiente</option>
                            <option value="confirmado">Confirmado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>

                <!-- Number input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaAcompanantes">Nº de acompañantes</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaAcompanantes"
                            name="txtAltaAcompanantes"
                            class="form-control input-md"
                            type="number" max="10" />
                    </div>
                </div>

                <!-- Fecha inscripcion-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaInscripcionFecha">Fecha de la inscripción</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaInscripcionFecha"
                            name="txtAltaInscripcionFecha"
                            class="form-control input-md"
                            type="date"
                            readonly />
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="btnAceptarAltaParticipante"></label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            type="submit"
                            id="btnAceptarAltaParticipante"
                            name="btnAceptarAltaParticipante"
                            class="btn btn-primary"
                            value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>