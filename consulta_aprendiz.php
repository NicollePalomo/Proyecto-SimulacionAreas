<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link href="estilos.css" rel="stylesheet" />
  </head>
  <body>
    <div id="div1" class="container">
      <div class="menu">
        <div class="menu-2">
          <img src="procesos.png" class="img-fluid" />
          <form name="formulario" role="form" method="post" class="container">
            <div class="col-md-12 mt-3">
              <strong class="lgris">Ingrese criterio de busqueda</strong>

              <div class="form-row">
                <div class="form-group col-md-12 mt-3">
                  <input
                    class="form-control"
                    type="number"
                    name="numid"
                    min="9999"
                    max="9999999999999"
                    value=""
                    placeholder="IDENTIFICACIÓN"
                  />
                </div>
                <div class="form-group col-md-12 mt-3">
                  <input
                    class="form-control"
                    style="text-transform: uppercase"
                    type="text"
                    name="nombres"
                    value=""
                    placeholder="Nombres"
                  />
                </div>
                <div class="form-group col-md-12 mt-3">
                  <input
                    class="form-control"
                    style="text-transform: uppercase"
                    type="text"
                    name="apellidos"
                    value=""
                    placeholder="Apellidos"
                  />
                </div>
                <div class="form-group col-md-12 mt-3">
                  <input class="btn btn-primary mb-3" type="submit" value="Consultar" />
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="divconsulta2">
          <?php
            if ($_SERVER['REQUEST_METHOD']==='POST')
            {
                include('funciones.php');
                $vnumid=$_POST['numid'];
                $vnombres=$_POST['nombres'];
                $vapellidos=$_POST['apellidos'];
                $miconexion=conectar_bd('1234', 'sena_bd');
                $resultado=consulta($miconexion,"select * from aprendices where trim(Apre_id) like '%{$vnumid}%' and (trim(Apre_Nombres) like '%{$vnombres}%'
                and trim(Apre_Apellidos) like '%{$vapellidos}%')");

                if($resultado->num_rows>0) { while ($fila = $resultado->fetch_object()) { echo
                    $fila->apre_id." ".$fila->apre_tipoid." ".$fila->apre_id." ".$fila->apre_nombres."
                    ".$fila->apre_apellidos." ".$fila->apre_direccion." ".$fila->apre_telefono."
                    ".$fila->apre_ficha."<br />"; } } else{ echo "No existen registros"; }
                    $miconexion->close(); }
            ?>
        </div>
      </div>
    </div>
  </body>
</html>
