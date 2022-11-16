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

            <div class="tab" data-target="tab1">
                Incidencias reportadas en los últimos días
                <!-- Table Template, subject to change on embed-php query -->
                  <div class="table-box-responsive-lg">
                    <table id="entries_table" class="table m-b-0" style="font-size:14px;">
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
                                    <td data-title="entry_time"> <?= $value['check_date'] ?></td>
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
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>
            </div>

            <!-- Card Body Inner End -->

          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta End -->

  </div>
</main>
