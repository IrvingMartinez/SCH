<div class="col-xl-8">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="header-title m-t-0">RH - Formato de Reporte</h4>
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
                            <input type="text" class="form-control" name="curp" value="<?=$employee_report['curp']?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">RFC</h6>
                </div>
                <div class="col-md-2">
                    <div class="label">
                        <label>
                            <input type="text" class="form-control" name="curp" value="<?=$employee_report['rfc']?>" disabled>
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
                            <input type="text" class="form-control" name="num_employee" value="<?=$employee_report['num_employee']?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">CUIP</h6>
                </div>
                <div class="col-md-2">
                    <div class="label">
                        <label>
                            <input type="text" class="form-control" name="cuip" value="<?=$employee_report['cuip']?>" disabled>
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
                            <input type="text" class="form-control" name="pos_area" value="<?=$employee_report['pos_area']?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Área / Departamento</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input type="text" class="form-control" name="area_title" value="<?=$employee_report['title']?>" disabled>
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
                            <input type="text" class="form-control" name="mun_title" value="<?=$employee_report['pos_title']?>" disabled>
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="header-title m-t-0">Detalles de Horario</h4>
            <p class="text-muted m-b-20"></p>

            <div class="form-group row">
                <div class="col-md-2">
                    <h6 class="p-t-5">Horario Actual</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input type="time" class="form-control" name="sched_placeholder" value="<?=$employee_report['sched_time']?>" disabled>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Nuevo Horario</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <input type="time" class="form-control" name="sched_time" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4">
    <div class="card m-b-30">
        <div class="card-body">

            <h4 class="header-title m-t-0">Fotografía del Empleado</h4>
            <div class="card m-b-30">
                    <!-- End title container -->

                    <div class="label">
                        <label>
                            <div class="upload_image_preview">
                                <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $employee_report['avatar'] ?>"></figure>
                                <input type="file" name="avatar_placeholder" accept="image/*" / disabled>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-12 center">
                        <button type="submit" class="btn btn-block">Completar Reporte</button>
                        <a href="index.php?c=schedule" class="btn btn-block btn-link p-b-0"><small>Cancelar</small></a>
                    </div>

                    <!-- COMMENT -->

        </div>
    </div>
</div>
