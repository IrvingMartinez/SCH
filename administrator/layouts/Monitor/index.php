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
            Monitoreo de Empleados
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

            <!-- Card Body Container Starts-->

            <!-- Container Title Starts -->

            <p class="text-muted m-b-30 font-14">Lista de Empleados</p>

            <!-- Container Title Ends -->

            <!-- STARTS Table indexer -->

            <div id="multitabs" class="tabs" data-tab-active="tab1">
                <ul>
                    <li data-tab-target="tab1"><i class="fa fa-group" aria-hidden="true"></i>&nbsp Empleados</li>
                    <li data-tab-target="tab2"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp Tarjetas Asignadas</li>
                    <!--<li data-tab-target="tab3"><i class="fa fa-book" aria-hidden="true"></i>&nbsp Kardex de Incidencias</li>-->
                </ul>

                <!-- Atts for Tab 1 -->
                <div class="tab" data-target="tab1">
                    Lista de Empleados bajo su cargo
                    <!-- Table Template, subject to change on embed-php query -->
                      <div class="table-box-responsive-lg">
                        <table id="blog" class="table m-b-0" style="font size: 14px;">
                          <tr>
                            <!-- Table contents, Header -->
                            <th>ID Empleado</th>
                            <th>Foto</th>
                            <th>Nombre Empleado</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                        </table>
                      </div>
                </div>
                <!-- Atts for Tab 2 -->
                <div class="tab" data-target="tab2">
                    Monitoreo de Tarjetas Asignadas a Empleados
                    <!-- Table Template, subject to change on embed-php query -->
                    <div class="table-box-responsive-lg">
                      <table id="blog" class="table m-b-0" style="font size: 14px;">
                        <tr>
                          <!-- Table contents, Header -->
                          <th>ID Tarjeta</th>
                          <th>Numero de Tarjeta</th>
                          <th>ID Empleado</th>
                          <th>Nombre de Empleado</th>
                          <th>Estado de Tarjeta</th>
                          <th>Acciones</th>
                        </tr>
                      </table>
                    </div>
                </div>

            </div>
            <!-- ENDS Table indexer -->

            <!-- Card Body Container Ends -->

          </div>
        </div>
      </div>
    </div>

    <!-- Page Body Ends -->

  </div>
</main>
