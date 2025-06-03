<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_evento.php" name="frmBuscarEvento" id="frmBuscarEvento" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un evento</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="txtIdEvento">ID</label>
                    <div class="col-md-6 col-lg-4">
                        <input id="txtIdEvento" name="txtIdEvento" placeholder="ID del evento" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-6 col-lg-4 control-label" for="btnAceptarBuscarEvento"></label>
                    <div class="col-md-6 col-lg-4">
                        <input type="submit" id="btnAceptarBuscarEvento" name="btnAceptarBuscarEvento" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>