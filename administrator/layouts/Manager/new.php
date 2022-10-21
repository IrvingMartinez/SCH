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

      <form name="send_report">

          <!-- Left container Starts -->

                <div class="col-xl-8">

                    <div class="form-group row"> <!-- $FIRST_ROW_DATA -->

                        <div class="col-md-1">
                            <h6 class="p-t-5">Nombre(s)</h6>
                        </div>
                        <div class="col-md-2">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="name" value="<?=$employee_report['name']?>" disabled>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <h6 class="p-t-5">Apellido Paterno</h6>
                        </div>
                        <div class="col-md-2">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="ap_mat" value="<?=$employee_report['ap_pat']?>" disabled>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <h6 class="p-t-5">Apellido Materno</h6>
                        </div>
                        <div class="col-md-2">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="ap_pat" value="<?=$employee_report['ap_mat']?>" disabled>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <h6 class="p-t-5">Razón del Reporte</h6>
                        </div>
                        <div class="col-md-2">
                            <div class="label">
                                <label>
                                    <?php if($employee_report['status_entry']=='2'):?>
                                        <input style="background-color: #EB4B29; color: white" class="form-control" type="text" name="status_entry" value="Falta" disabled>
                                    <?php else:?>
                                        <input style="background-color: #F8D41F; color: black" class="form-control" type="text" name="status_entry" value="Retardo" disabled>
                                    <?php endif;?>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h6 class="p-t-5">Campo de texto</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="desc_incidence" value="<?=$employee_report['desc_incidence']?>" placeholder="Agregue una descripción">
                                </label>
                            </div>
                        </div>

                        <div class="label">
                            <label>
                                <input type="hidden" type="text" name="id" value="<?=$employee_report['id']?>">
                            </label>
                        </div>

                        <div class="col-md-2">
                            <div>
                                <button type="submit" class="btn btn-primary">Completar Reporte</button>
                            </div>
                        </div>

                    </div>
                    <!-- ENDS $FIRST_ROW_DATA //// $SECOND_ROW_DATA -->


                </div>

          <!-- Left container Ends-->

      </form>

      <!-- Page content Ends-->

    </div>

</main>
