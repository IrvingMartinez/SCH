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
                        <li class="breadcrumb-item">
                            <a href="index.php?c=manager">Incidencias</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Generar Reporte
                        </li>
                    </ol>

                </div>
            </div>
        </div>

      <!-- Page Header Ends //// Page content Starts -->

      <form name="send_report" method="post" class="row">
          <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS.'Manager/tpl_form_report.php'), ['employee_report' => $employee_report] );?>
      </form>

      <!-- Page content Ends-->

    </div>

</main>
