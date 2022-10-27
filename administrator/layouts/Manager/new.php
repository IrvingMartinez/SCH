<?php defined('_EXEC') or die; ?>

<main class="wrapper">
    <div class="container-fluid">


        <!-- Page Header Starts -->

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Generar reporte inicial</h4>
                </div>
            </div>
        </div>

      <!-- Page Header Ends //// Page content Starts -->

      <form name="send_report" method="post">
          <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS.'Manager/tpl_form_report.php'), ['employee_report' => $employee_report] );?>
      </form>

      <!-- Page content Ends-->

    </div>

</main>
