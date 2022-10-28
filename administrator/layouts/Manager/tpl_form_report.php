<div class="col-xl-8">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="header-title m-t-0"> DATOS GENERALES </h4>
            <p class="text-muted m-b-20"> </p>

            <div class="form-group row">
                <div class="col-md-1">
                    <h6 class="p-t-5">Nombre</h6>
                </div>
                <div class="col-md-5">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="name"
                            value="
                            <?=$employee_report['name']?> <?=$employee_report['ap_pat']?> <?=$employee_report['ap_mat']?>
                            "
                            disabled>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">CURP</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" maxlength="18" name="curp" value="<?= ( isset($employee_report) ) ? $employee_report['curp'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">RFC</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" maxlength="13" name="rfc" value="<?= ( isset($employee_report) ) ? $employee_report['rfc'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">N. Empleado</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="num_employee" value="<?= ( isset($employee_report) ) ? $employee_report['num_employee'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">CUIP</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="cuip" value="<?= ( isset($employee_report) ) ? $employee_report['cuip'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">Puesto</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="pos" value="<?= ( isset($employee_report) ) ? $employee_report['pos_area'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <h6 class="p-t-5">Área / Departamento</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="area" value="<?= ( isset($employee_report) ) ? $employee_report['title'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">Municipio</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="Municipalities" value="<?= ( isset($employee_report) ) ? $employee_report['pos_title'] : '' ?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Estatus Incidencia</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <?php if($employee_report['status_entry']=='1'):?>
                                <input class="form-control" type="text" name="status_entry" value="Retardo" disabled>
                            <?php else:?>
                                <input class="form-control" type="text" name="status_entry" value="Falta" disabled>
                            <?php endif;?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">DATOS TARJETA</h4>
            <p class="text-muted m-b-20"> </p>
            <!-- End title container -->

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">Número de familia</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="num_family" value="<?= ( isset($employee_report) ) ? $employee_report['num_family'] : '' ?>">
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <h6 class="p-t-5">Número de tarjeta</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="num_card" value="<?= ( isset($employee_report) ) ? $employee_report['num_card'] : '' ?>">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4">
    <div class="card m-b-30">
        <div class="card-body">
            <!-- Title container -->
            <h4 class="header-title m-t-0">Fotografía del empleado</h4>
            <!-- End title container -->

            <div class="label">
                <label>
                    <div class="upload_image_preview">
                        <?php if ( isset($employee_report) && !empty($employee_report['avatar']) ): ?>
                            <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $employee_report['avatar'] ?>"></figure>
                        <?php else: ?>
                            <figure class="m-0"><img class="img-fluid" src="{$path.images}empty.png"></figure>
                        <?php endif; ?>
                        <span class="d-block">Elegir Fotografía</span>
                        <input type="file" name="image_cover" accept="image/*" />
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <button type="submit" class="btn btn-block"><?= ( isset($employee_report) ) ? 'Actualizar' : 'Guardar' ?> empleado</button>
            <a href="index.php?c=manager" class="btn btn-block btn-link p-b-0"><small>Cancelar</small></a>
        </div>
    </div>
</div>
