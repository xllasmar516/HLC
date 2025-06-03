<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_participante.php" name="frmBuscarParticipante" id="frmBuscarParticipante" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un participante</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="txtIdParticipante">ID</label>
                    <div class="col-md-6 col-lg-4">
                        <input id="txtIdParticipante" name="txtIdParticipante" placeholder="ID del participante" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="btnAceptarBuscarParticipante"></label>
                    <div class="col-md-6 col-lg-4">
                        <input type="submit" id="btnAceptarBuscarParticipante" name="btnAceptarBuscarParticipante" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>