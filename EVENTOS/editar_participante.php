<?php

// Recupero datos de parametro en forma de array asociativo
$participante = json_decode($_POST['participante'],true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT evento_id, evento_nombre FROM eventos;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el tipo con el del participante es el que debe aparecer seleccionado (selected)
    if ($fila['evento_id'] == $participante['evento_id']){
        $options .= " <option selected value='" . $fila["evento_id"] . "'>" . $fila["evento_nombre"] . "</option>";
    } else{
        $options .= " <option value='" . $fila["evento_id"] . "'>" . $fila["evento_nombre"] . "</option>";
    }
}

$options2 = "";
if ($participante['inscripcion_estado'] == "Pendiente"){
    $options2 .= "<option selected value='pendiente'>Pendiente</option>
                            <option value='confirmado'>Confirmado</option>
                            <option value='cancelado'>Cancelado</option>";
} else if ($participante['inscripcion_estado'] == "Confirmado"){
    $options2 .= "<option value='pendiente'>Pendiente</option>
                            <option selected value='confirmado'>Confirmado</option>
                            <option value='cancelado'>Cancelado</option>";
}else{
    $options2 .= "<option value='pendiente'>Pendiente</option>
                            <option value='confirmado'>Confirmado</option>
                            <option selected value='cancelado'>Cancelado</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>


<div class="container" id="formularios">
    <div class="row">
        <!-- ALTA PARTICIPANTE -->
        <form
            class="form-horizontal" action="proceso_modificar_participante.php"
            name="frmModParticipante"
            id="frmModParticipante" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de participante</legend>

                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModIdParticipante">ID</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModIdParticipante"
                            name="txtModIdParticipante"
                            class="form-control input-md"
                            type="text" value="<?php echo $participante['participante_id'];?>" readonly/>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModNombreP">Nombre</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModNombreP"
                            name="txtModNombreP"
                            class="form-control input-md"
                            type="text" value="<?php echo $participante['participante_nombre'];?>"/>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="txtModEmail">Email</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModEmail"
                            name="txtModEmail"
                            class="form-control input-md"
                            type="email" value="<?php echo $participante['participante_email'];?>"/>
                    </div>
                </div>

                <!-- Desplegable eventos-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="lstModEvento">Evento</label>
                    <div class="col-md-6 col-lg-4">
                        <select
                            class="form-select"
                            name="lstModEvento"
                            id="lstModEvento">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>

                <!-- Desplegable estado inscripcion-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="lstModInscripcionEstado">Estado de la inscripción</label>
                    <div class="col-md-6 col-lg-4">
                        <select
                            class="form-select"
                            name="lstModInscripcionEstado"
                            id="lstModInscripcionEstado">
                            <?php echo $options2; ?>
                        </select>
                    </div>
                </div>

                <!-- Number input-->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="txtModAcompanantes">Nº de acompañantes</label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            id="txtModAcompanantes"
                            name="txtModAcompanantes"
                            class="form-control input-md"
                            type="number" max="10" value="<?php echo $participante['numero_acompanantes'];?>"/>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label
                        class="col-md-6 col-lg-4 control-label"
                        for="btnAceptarModParticipante"></label>
                    <div class="col-md-6 col-lg-4">
                        <input
                            type="submit"
                            id="btnAceptarModParticipante"
                            name="btnAceptarModParticipante"
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