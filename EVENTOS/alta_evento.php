<?php
require_once("config.php");

$conexion = obtenerConexion();

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- ALTA EVENTO -->
        <form
            class="form-horizontal" action="proceso_alta_evento.php"
            name="frmAltaEvento"
            id="frmAltaEvento" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de evento</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaNombreE">Nombre del evento</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaNombreE"
                            name="txtAltaNombreE"
                            class="form-control input-md"
                            type="text" />
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaDescripcion">Descripción</label>
                    <div class="col-md-6 col-lg-4">
                        <textarea
                            id="txtAltaDescripcion"
                            name="txtAltaDescripcion"
                            class="form-control input-md"></textarea>
                    </div>
                </div>

                <!-- URL input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="urlAltaImagen">Imagen</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="urlAltaImagen"
                            name="urlAltaImagen"
                            class="form-control input-md"
                            type="url" />
                    </div>
                </div>

                <!-- Date input-->
                <div class="form-group">
                    <!-- No creo que txtAltaFecha sea el nombre mas 
                    adecuado pero no se como ponerlo sino -->
                    <label class="col-md-6 col-lg-4 control-label" for="txtAltaFecha">Fecha</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaFecha"
                            name="txtAltaFecha"
                            class="form-control input-md"
                            type="date" />
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaLocalizacion">Localización</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaLocalizacion"
                            name="txtAltaLocalizacion"
                            class="form-control input-md"
                            type="text" />
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtAltaOrganizador">Nombre de organizador del evento</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtAltaOrganizador"
                            name="txtAltaOrganizador"
                            class="form-control input-md"
                            type="text" />
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="btnAceptarAltaEvento"></label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            type="submit"
                            id="btnAceptarAltaEvento"
                            name="btnAceptarAltaEvento"
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