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
            Monitoreo de Horarios y Asignaciones
          </h4>
        </div>
      </div>
    </div>

    <!-- Page Title Ends -->

    <!-- Page Body Starts -->

    <div class="row">
      <div class="col-sm-12">
        <div class="card m-b-30">
          <div class="card-body">

            <!-- Container Title Starts -->

            <p class="text-muted m-b-30 font-14">Tabla de Horarios</p>

            <!-- Container Title Ends -->

            <!-- STARTS Table Indexer -->

            <div id="multitabs" class="tabs" data-tab-active="tab1">
              <ul>
                <li data-tab-target="tab1"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp Horarios para Hoy</li>
                <li data-tab-target="tab2"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp Horarios para esta Semana</li>
                <li data-tab-target="tab3"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp Asignar Horarios para siguiente Semana</li>
              </ul>

              <!-- Atts for Tab 1 -->
              <div class="tab" data-target="tab1">
                  Horarios para _FECHA_DE_HOY
                  <!-- Table Template, subject to change on embed-php query -->
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                        <tr>
                          <!-- Table contents, Header -->
                          <th>ID Empleado</th>
                          <th>Nombre</th>
                          <th>Status</th>
                          <th>Mensaje del Sistema</th>
                        </tr>
                      </table>
                    </div>
              </div>
              <!-- Atts for Tab 2 -->
              <div class="tab" data-target="tab2">
                  Horarios de _FECHA_SEMANA_INICIO a _FECHA_SEMANA_FIN
                  <!-- Table Template, subject to change on embed-php query -->
                  <div class="table-box-responsive-lg">
                    <table id="blog" class="table m-b-0" style="font size: 14px;">
                      <tr>
                        <!-- Table contents, Header -->
                        <th>ID Tarjeta</th>
                      </tr>
                    </table>
                  </div>
              </div>
              <!-- Atts for Tab 3 -->
              <div class="tab" data-target="tab3">
              Tabla de Asignación de Horarios
              <!-- Table Template, subject to change on embed-php query -->
                <div class="table-box-responsive-lg">
                    <table id="blog" class="table m-b-0" style="font size: 14px;">
                      <tr>
                        <!-- Table contents, Header -->
                        <th colspan="8">Preparar Horarios para semana del dd:mm:yy a dd:mm:yy</th>
                      </tr>
                      <tr>
                          <td colspan="2">Seleccionar o Buscar Empleado por ID, CUIP o Número de Tarjeta</td>
                          <td><i class="fa fa-user-plus" aria-hidden="true"></i></td>
                          <td>Empleado seleccionado:</td>
                          <td>Nombre Empleado</td>
                          <td>_AUTOCOMPLETAR</td>
                          <td>Número Tarjeta</td>
                          <td>_AUTOCOMPLETAR</td>
                      </tr>
                      <tr>
                          <td>Día</td>
                          <td>Lunes</td>
                          <td>Martes</td>
                          <td>Miércoles</td>
                          <td>Jueves</td>
                          <td>Viernes</td>
                          <td>Sábado</td>
                          <td>Domingo</td>
                      </tr>
                      <tr>
                          <td>Tipo de Turno</td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2">Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                          <td>
                              <select name="select">
                                <option value="value1">Matutino (08:00 - 16:00)</option>
                                <option value="value2" selected>Vespertino (08:00 - 19:00)</option>
                                <option value="value3">Nocturno (16:00 - 08:00)</option>
                                <option value="value4">Guardia (08:00 - 08:00)</option>
                                <option value="value5">Descanso (OFF)</option>
                              </select>
                          </td>
                      </tr>
                      <tr>
                          <td>Hora de Entrada</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                      </tr>
                      <tr>
                          <td>Hora de Salida</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                          <td>hh:mm/dd:mm:yy</td>
                      </tr>
                    </table>
                </div>
              </div>

            </div>

            <!-- ENDS Table Indexer -->

          </div>
        </div>
      </div>
    </div>

    <!-- Page Body Ends -->

  </div>
</main>
