<?php defined('_EXEC') or die; ?>

<main class="wrapper">
    <div class="container-fluid">


        <!-- Page Header Starts -->

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

              <?php if($employee_report['status_response']=='1'):?>
                  <h4 class="page-title">
                    Formulario de Incidencias - Reporte Inicial
                  </h4>
              <?php endif;?>
              <?php if($employee_report['status_response']=='2'):?>
                  <h4 class="page-title">
                      Formulario de Incidencias - Esperando Respuesta
                  </h4>
              <?php endif;?>
              <?php if($employee_report['status_response']=='3'):?>
                  <h4 class="page-title">
                      Formulario de Incidenicas - Pendiente de Revisión
                  </h4>
              <?php endif;?>

              <br>

              <form name="create_report" class="row font-14">

                  <!-- TODO DATA FORM -->

                  <div class="col-xl-8">
                      <div class="card m-b-30">
                          <div class="card-body">

                              <!-- Comienza el primer row de datos -->

                                  <table id="entries_table" class="table m-b-0" style="font size: 14px;">
                                      <thead>
                                          <tr>
                                              <th>Nombre de Empleado</th>
                                              <th>Número de Empleado</th>
                                              <th>Área</th>
                                              <th>Municipio</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td colspan="1"><?= $employee_report['name']?>&nbsp<?= $employee_report['ap_pat']?>&nbsp<?= $employee_report['ap_mat']?></td>
                                              <td colspan="1"><?= $employee_report['num_employee']?></td>
                                              <td colspan="1"><?= $employee_report['title']?></td>
                                              <td colspan="1"><?= $employee_report['code']?></td>
                                          </tr>
                                          <tr>
                                              <thead>
                                                  <th>CURP</th>
                                                  <th>Número de Familia</th>
                                                  <th>Número de Tarjeta</th>
                                                  <th>CUIP</th>
                                              </thead>
                                          </tr>
                                          <tr>
                                              <td colspan="1"><?= $employee_report['curp']?></td>
                                              <td colspan="1"><?= $employee_report['num_family']?></td>
                                              <td colspan="1"><?= $employee_report['num_card']?></td>
                                              <td colspan="1"><?= $employee_report['cuip']?></td>
                                          </tr>
                                      </tbody>
                                  </table>

                                  <br>

                                  <table id="entries_table" class="table m-b-0" style="font size: 14px;">
                                      <thead>
                                          <tr>
                                              <th>Status de la Entrada</th>
                                              <th>Hora de Entrada Programada</th>
                                              <th>Hora de Chequeo</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <?php if( $employee_report['status_entry'] == '1'):?>
                                                  <td class="bg-warning text-black">Retardo</td>
                                              <?php endif; ?>
                                              <?php if( $employee_report['status_entry'] == '2'):?>
                                                  <td class="bg-danger text-white">Falta</td>
                                              <?php endif; ?>
                                              <td><?= $employee_report['entry_time']?></td>
                                              <td><?= $employee_report['check_time']?></td>
                                          </tr>
                                      </tbody>
                                  </table>


                              </div>
                          </div>

                      </div>

                      <div class="col-xl-4">
                          <div class="card m-b-30">

                              <div class="card-body">

                                  <h4 class="header-title m-t-0">Foto del empleado</h4>

                                  <div class="label">
                                          <div class="upload_image_preview">
                                              <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $employee_report['avatar'] ?>"></figure>
                                              <span class="d-block"></span>
                                          </div>
                                  </div>

                                  <h4 class="header-title m-t-0">Evidencias de Incidente - Subir Imagen</h4>

                                  <div class="label">

                                      <div class="upload_image_preview">
                                      </div>

                                  </div>

                                  <a href="index.php?c=manager&m=send_report&id=<?=$_GET['id']?>"  class="btn btn-block">Completar Reporte</a>
                                  <a href="index.php?c=manager" class="btn btn-secondary btn-block">Cancelar</a>

                              </div>

                          </div>
                      </div>

              </form>

          </div>
        </div>
      </div>

      <!-- Page Header Ends -->



</main>
