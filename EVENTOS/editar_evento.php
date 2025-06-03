<?php

// Recupero datos de parametro en forma de array asociativo
$evento = json_decode($_POST['evento'],true);


require_once("config.php");
$conexion = obtenerConexion();

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- ALTA PARTICIPANTE -->
        <form
            class="form-horizontal" action="proceso_modificar_evento.php"
            name="frmModEvento"
            id="frmModEvento" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de evento</legend>

                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModIdEvento">ID</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModIdEvento"
                            name="txtModIdEvento"
                            class="form-control input-md"
                            type="text" value="<?php echo $evento['evento_id'];?>" readonly/>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModNombreE">Nombre</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModNombreE"
                            name="txtModNombreE"
                            class="form-control input-md"
                            type="text" value="<?php echo $evento['evento_nombre'];?>"/>
                    </div>
                </div>

            <!-- Text input-->
            <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModDescripcion">Descripción</label>
                    <div class="col-md-6 col-lg-4">
                        <textarea
                            id="txtModDescripcion"
                            name="txtModDescripcion"
                            class="form-control input-md"><?php echo $evento['evento_descripcion'];?></textarea>
                    </div>
                </div>

                <!-- URL input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="urlModImagen">Imagen</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="urlModImagen"
                            name="urlModImagen"
                            class="form-control input-md"
                            type="url" value="<?php echo $evento['evento_imagen'];?>"/>
                    </div>
                </div>

                <!-- Date input-->
                <div class="form-group">
                    <!-- No creo que txtAltaFecha sea el nombre mas 
                    adecuado pero no se como ponerlo sino -->
                    <label class="col-md-6 col-lg-4 control-label" for="txtModFecha">Fecha</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModFecha"
                            name="txtModFecha"
                            class="form-control input-md"
                            type="date" value="<?php 
                            $date = new DateTime($evento['evento_fecha']);
                            $fechaFormateada = $date->format('Y-m-d');
                            echo $fechaFormateada;?>"/>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModLocalizacion">Localización</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModLocalizacion"
                            name="txtModLocalizacion"
                            class="form-control input-md"
                            type="text" value="<?php echo $evento['evento_localizacion'];?>"/>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModOrganizador">Nombre de organizador del evento</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModOrganizador"
                            name="txtModOrganizador"
                            class="form-control input-md"
                            type="text" value="<?php echo $evento['evento_organizador'];?>"/>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="btnAceptarModEvento"></label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            type="submit"
                            id="btnAceptarModEvento"
                            name="btnAceptarModEvento"
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