<?php defined('_EXEC') or die;?>

<main class="wrapper">
  <div class="container-fluid">

    <!-- Page Title Starts -->

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <ol class="breadcrumb hide-phone">
            <li class="breadcrumb-item">
              <a href="index.php">{$vkye_webpage}</a>
            </li>
            <li class="breadcrumb-item active">
              Encargado de Área
            </li>
          </ol>

          <h4 class="page-title">
            Monitoreo de Incidencias
          </h4>
      </div>
    </div>
  </div>

    <!-- Page Title Ends -->

    <!-- Tarjeta de Menú de interacciones -->

    <div class="row">
      <div class="col-sm-12">
        <div class="card m-b-30">
          <div class="card-body">

            <!-- Card Body Inner -->

            <p class="text-muted m-b-30 font-14">Incidencias recibidas</p>

            <!-- STARTS Table indexer -->

            <div id="multitabs" class="tabs" data-tab-active="tab1">
                <ul>
                    <li data-tab-target="tab1"><i class="fa fa-calendar-times-o" aria-hidden="true"></i>&nbsp Incidencias Reportadas</li>
                    <li data-tab-target="tab2"><i class="fa fa-hourglass-end" aria-hidden="true"></i>&nbsp Incidencias Pendientes</li>
                    <li data-tab-target="tab3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp Incidencias Contestadas</li>
                    <li data-tab-target="tab4"><i class="fa fa-book" aria-hidden="true"></i>&nbsp Kardex de Incidencias</li>
                </ul>

                <!-- Atts for Tab 1 -->
                <div class="tab" data-target="tab1">
                    Incidencias reportadas en los últimos días
                    <!-- Table Template, subject to change on embed-php query -->
                      <div class="table-box-responsive-lg">
                        <table id="blog" class="table m-b-0" style="font size: 14px;">
                          <tr>
                            <!-- Table contents, Header -->
                            <th>ID Incidencia</th>
                            <th>Empleado</th>
                            <th>Tipo de Incidencia</th>
                            <th>Fecha de Incidencia</th>
                            <th>Status<th>
                            <th>Reportar Incidencias</th>
                          </tr>
                        </table>
                      </div>
                </div>
                <!-- Atts for Tab 2 -->
                <div class="tab" data-target="tab2">
                    Incidencias esperando respuesta de Recursos Humanos
                    <!-- Table Template, subject to change on embed-php query -->
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                        <tr>
                          <!-- Table contents, Header -->
                          <th>ID Incidencia</th>
                          <th>Empleado</th>
                          <th>Fecha de Reporte</th>
                          <th>Revisar Reporte</th>
                          <th>Status</th>
                          <th>Acciones</th>
                        </tr>
                      </table>
                    </div>
                </div>
                <!-- Atts for Tab 3 -->
                <div class="tab" data-target="tab3">
                    Incidencias revisadas y contestadas por Recursos Humanos
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                        <tr>
                          <!-- Table contents, Header -->
                          <th>ID Incidencia</th>
                          <th>Empleado</th>
                          <th>Fecha de Reporte</th>
                          <th>Fecha de Respuesta</th>
                          <th>Status</th>
                          <th>Revisar Reporte</th>
                          <th>Enviar al Kardex</th>
                        </tr>
                      </table>
                    </div>
                </div>
                <!-- Atts for Tab 4 -->
                <div class="tab" data-target="tab4">
                    Incidencias revisadas y contestadas por Recursos Humanos
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                        <tr>
                          <!-- Table contents, Header -->
                          <th>ID Kardex</th>
                          <th>ID Empleado</th>
                          <th>Empleado</th>
                          <th>Revisar Historial</th>
                        </tr>
                      </table>
                    </div>
                </div>
            </div>
            <!-- ENDS Table indexer -->

            <!-- Card Body Inner End -->

          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta End -->

  </div>
</main>
