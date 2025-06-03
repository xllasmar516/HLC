<?php
require_once("config.php");

$conexion = obtenerConexion();

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="listado_eventos.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar eventos en una fecha</legend>
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="txtFechaEvento">Fecha</label>
                    <div class="col-md-6 col-lg-4">
                        <input type="date" name="txtFechaEvento" id="txtFechaEvento" value="">
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="btnAceptarBuscarEventosFecha"></label>
                    <div class="col-md-6 col-lg-4">
                        <input type="submit" id="btnAceptarBuscarEventosFecha" name="btnAceptarBuscarEventosFecha" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>