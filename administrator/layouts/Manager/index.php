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
                        <table id="entries_table" class="table m-b-0" style="font size: 14px;">
                            <thead>
                                <tr>
                                    <!-- Table contents, Header -->
                                    <th>Foto ID</th>
                                    <th>Empleado</th>                                   <!-- Nombre / Apellidos-->
                                    <th>Código de Incidencia</th>                       <!-- Retardo / Falta -->
                                    <th>Fecha de Incidencia</th>                        <!-- Fecha del Reporte -->
                                    <th>Status</th>                                     <!-- Pendiente de Respuesta -->
                                    <th>Acciones</th>                                   <!-- Bootstrap Redirect Buttons -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if( empty($entries_report) ):?>
                                    <!-- Validar que exista al menos una (1) Incidencia pendiente -->
                                    <tr>
                                        <td class="table-empty" colspan="20">
                                            No hay incidencias por el momento.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ( $entries_report as $value): ?>
                                    <tr>
                                    <!-- Ficha general de información de la incidencia por empleado -->
                                    <td><figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure></td>
                                    <td data-title="emp_detail"> <?= $value['name']?>&nbsp<?= $value['ap_pat']?>&nbsp<?= $value['ap_mat']?></td>
                                    <!-- Revisar estado de botones en php, switch case para detalles -->
                                    <?php if($value['status_entry']=='1'):?>
                                        <td>Retardo</td>
                                    <?php endif; ?>
                                    <?php if($value['status_entry']=='2'):?>
                                        <td>Falta</td>
                                    <?php endif; ?>
                                        <td data-title="entry_time"> <?= $value['entry_time'] ?></td>
                                    <?php if($value['status_response']=='1'):?>
                                        <td data-title="status_response"> Pendiente de Reporte</td>
                                    <?php endif; ?>
                                    <?php if($value['status_response']!='1'):?>
                                            <td>Esto es un error</td>
                                    <?php endif; ?>
                                    <!-- Botones para reporte de Incidencias -->
                                    <td data-title="id">
                                        <a href="index.php?c=manager&m=incidence_report&id=<?=$value['id']?>" class="btn btn-primary">Reportar Incidencia</a>
                                    </td>
                                    <td data-title="id_test"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                      </div>
                </div>
                <!-- Atts for Tab 2 -->
                <div class="tab" data-target="tab2">
                    Incidencias esperando respuesta de Recursos Humanos
                    <!-- Table Template, subject to change on embed-php query -->
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                          <thead>
                              <tr>
                                  <!-- Table contents, Header -->
                                  <th>Foto ID</th>
                                  <th>Empleado</th>
                                  <th>Código de Incidencia</th>
                                  <th>Fecha de Incidencia</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if( empty($entries_pending)):?>
                                  <!-- Validar que exista al menos una (1) Incidencia pendiente -->
                                  <tr>
                                      <td class="table-empty" colspan="20">
                                          No hay Incidencias pendientes, revise las contestaciones o incidencias de hoy.
                                      </td>
                                  </tr>
                              <?php endif; ?>
                              <?php foreach($entries_pending as $value): ?>
                              <tr>
                                  <!-- Fichas generales de información -->
                                  <td><figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure></td>
                                  <td data-title="emp_detail"><?= $value['name']?>&nbsp<?= $value['ap_pat']?>&nbsp<?= $value['ap_mat']?></td>
                                  <?php if($value['status_entry']=='1'):?>
                                      <td data-title="status_entry">Retardo</td>
                                  <?php endif;?>
                                  <?php if($value['status_entry']=='2'):?>
                                      <td data-title="status_entry">Falta</td>
                                  <?php endif;?>
                                  <td data-title="check_time"><?= $value['check_time']?></td>
                                  <?php if($value['status_response']=='2'):?>
                                      <td data-title="status_response">Pendiente RH</td>
                                  <?php endif;?>
                                  <?php if($value['status_response']!='2'):?>
                                      <td data-title="status_response">Esto es un error</td>
                                  <?php endif; ?>
                                  <!-- Botones de Acción para estado del reporte  -->
                                  <td>
                                      <a href="index.php?c=manager&m=incidence_report&id=<?=$value['id']?>" class="btn btn-primary">Reportar Incidencia</a>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <!-- Atts for Tab 3 -->
                <div class="tab" data-target="tab3">
                    Incidencias revisadas y contestadas por Recursos Humanos
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                          <thead>
                              <tr>
                                  <!-- Table contents, Header -->
                                  <th>ID Foto</th>
                                  <th>Empleado</th>
                                  <th>Código de Incidencia</th>
                                  <th>Fecha de Incidencia</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if(empty($entries_answered)):?>
                                  <tr>
                                      <td class="table-empty" colspan="20">
                                          No hay incidencias contestadas en este momento, revise las pendientes o directamente consulte el Kardex.
                                      </td>
                                  </tr>
                              <?php endif; ?>
                              <?php foreach($entries_answered as $value): ?>
                                  <tr>
                                          <td><figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure></td>
                                          <td data-title="emp_detail"><?= $value['name'] ?>&nbsp<?= $value['ap_pat'] ?>&nbsp<?= $value['ap_mat'] ?></td>
                                          <?php if($value['status_entry']=='1'):?>
                                              <td data-title="status_entry">Retardo No Justificado</td>
                                          <?php endif;?>
                                          <?php if($value['status_entry']=='2'):?>
                                              <td data-title="status_entry">Falta No Justificada</td>
                                          <?php endif;?>
                                          <?php if($value['status_entry']=='3'):?>
                                              <td data-title="status_entry">Retardo Justificado</td>
                                          <?php endif;?>
                                          <?php if($value['status_entry']=='4'):?>
                                              <td data-title="status_entry">Falta Justificada</td>
                                          <?php endif;?>
                                              <td data-title="entry_time"><?= $value['entry_time'] ?></td>
                                          <?php if($value['status_response']=='3'):?>
                                              <td data-title="status_response">Pendiente de Archivar</td>
                                          <?php endif;?>
                                          <?php if($value['status_response']!='3'):?>
                                              <td data-title="status_response">Esto es un error</td>
                                          <?php endif;?>
                                          <td data-title="view_button">
                                              <a href="index.php?c=manager&m=incidence_report&id=<?=$value['id']?>" class="btn btn-primary">Reportar Incidencia</a>
                                          </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <!-- Atts for Tab 4 -->
                <div class="tab" data-target="tab4">
                    Incidencias revisadas y contestadas por Recursos Humanos
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                          <thead>
                              <tr>
                                  <!-- Table contents, Header -->
                                  <th>Foto ID</th>
                                  <th>Empleado</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          </tbody>
                                <?php if(empty($employees)): ?>
                                    <tr>
                                        <td class="table-empty" colspan="20">
                                            No se encontraron empleados bajo el cargo en este momento.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                  <!-- Detalles generales del Kardex de Incidencias -->
                                  <?php foreach($employees as $value): ?>
                                      <tr>
                                          <td>
                                          <figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure>
                                          <td data-class="emp_detail"><?= $value['name'] ?>&nbsp<?= $value['ap_pat'] ?>&nbsp<?= $value['ap_mat'] ?></td>
                                          <td>
                                              <!-- Cambiar texto en botones por íconos -->
                                              <button class="btn btn-primary">Ver Historial</button>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                          </body>
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
