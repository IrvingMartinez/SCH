<div class="col-xl-8">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="header-title m-t-0"> DATOS GENERALES </h4>
            <p class="text-muted m-b-20"> </p>

            <div class="form-group row">
                <div class="col-md-1">
                    <h6 class="p-t-5">Nombre</h6>
                </div>
                <div class="col-md-3">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="name" value="<?= ( isset($employee) ) ? $employee['name'] : '' ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Apellido Paterno</h6>
                </div>
                <div class="col-md-2">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="ap_pat" value="<?= ( isset($employee) ) ? $employee['ap_pat'] : '' ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Apellido Materno</h6>
                </div>
                <div class="col-md-2">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="ap_mat" value="<?= ( isset($employee) ) ? $employee['ap_mat'] : '' ?>">
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
                            <input class="form-control" type="text" maxlength="18" name="curp" value="<?= ( isset($employee) ) ? $employee['curp'] : '' ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">RFC</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" maxlength="13" name="rfc" value="<?= ( isset($employee) ) ? $employee['rfc'] : '' ?>">
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
                            <input class="form-control" type="text" name="num_employee" value="<?= ( isset($employee) ) ? $employee['num_employee'] : '' ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">CUIP</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="cuip" value="<?= ( isset($employee) ) ? $employee['cuip'] : '' ?>">
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
                            <select name="position">
                                <option value="">Sin puesto</option>
                                <?php foreach ( $positions as $value ): ?>
                                    <option value="<?= $value['id'] ?>" <?= ( isset($employee) && $value['id'] === $employee['id_position'] ) ? 'selected' : '' ?>><?= $value['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="description text-muted">Elige un puesto</p>
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <h6 class="p-t-5">Área / Departamento</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <select name="area">
                                <option value="">Sin área</option>
                                <?php foreach ( $areas as $value ): ?>
                                    <option value="<?= $value['id'] ?>" <?= ( isset($employee) && $value['id'] === $employee['id_area'] ) ? 'selected' : '' ?>><?= $value['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="description text-muted">Elige un área</p>
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
                            <select name="municipality">
                                <option value="">Sin municipio</option>
                                <?php foreach ( $municipalities as $value ): ?>
                                    <option value="<?= $value['id'] ?>" <?= ( isset($employee) && $value['id'] === $employee['id_municipality'] ) ? 'selected' : '' ?>><?= $value['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="description text-muted">Elige un municipio</p>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="p-t-5">Estatus empleado</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <select name="status">
                                <option value="1">Activado</option>
                                <option value="0">Desactivado</option>
                            </select>
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
                            <input class="form-control" type="text" name="num_family" value="<?= ( isset($employee) ) ? $employee['num_family'] : '' ?>">
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <h6 class="p-t-5">Número de tarjeta</h6>
                </div>
                <div class="col-md-4">
                    <div class="label">
                        <label>
                            <input class="form-control" type="text" name="num_card" value="<?= ( isset($employee) ) ? $employee['num_card'] : '' ?>">
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
                        <?php if ( isset($employee) && !empty($employee['avatar']) ): ?>
                            <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $employee['avatar'] ?>"></figure>
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
            <button type="submit" class="btn btn-block"><?= ( isset($employee) ) ? 'Actualizar' : 'Guardar' ?> empleado</button>
            <a href="index.php?c=monitor" class="btn btn-block btn-link p-b-0"><small>Cancelar</small></a>
        </div>
    </div>
</div>
