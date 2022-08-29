<?php
defined('_EXEC') or die;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}bootstrap-inputmask/jquery.inputmask.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/monitor/view.js']);
$this->dependencies->add(['js', '{$path.js}pages/monitor/create.js']);
// $this->dependencies->add(['js', '{$path.js}pages/monitor/delete.js']);

//table
$this->dependencies->add(['css','{$path.plugins}datatables/css/jquery.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/dataTables.material.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/responsive.dataTables.min.css']);
$this->dependencies->add(['css','{$path.plugins}datatables/css/buttons.dataTables.min.css']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/jquery.dataTables.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.material.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.responsive.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/dataTables.buttons.min.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/vfs_fonts.js']);
$this->dependencies->add(['js','{$path.plugins}datatables/js/buttons.html5.min.js']);

?>

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
                        <li class="breadcrumb-item active">Monitoreo</li>
                    </ol>

                    <h4 class="page-title">Monitoreo de Empleados</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 m-b-20 d-print-none">
                <div class="button-items text-lg-right">
                    <a href="index.php?c=monitor&m=create_employee" class="btn btn-success waves-effect waves-light">Nuevo empleado</a>

                    <button class="btn waves-effect waves-light" type="button" data-button-modal="positions"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Puestos</button>
                    <!-- <button class="btn waves-effect waves-light" type="button" data-button-modal="areas"><i class="fa fa-building-o" aria-hidden="true"></i> Áreas</button>
                    <button class="btn waves-effect waves-light" type="button" data-button-modal="municipalities"><i class="fa fa-map-marker" aria-hidden="true"></i> Municipios</button> -->
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form name="search" class="m-b-20" data-table-target="employees">
                            <input type="search" name="search" value="" placeholder="Busca por nombre">
                        </form>

                        <div class="table-box-responsive-lg">
                            <table id="employees" class="table m-b-0" style="font-size: 14px;border:none;">
                                <thead>
                                    <tr>
                                        <th width="40px"></th>
                                        <th width="150px"># Empleado</th>
                                        <th>Nombre Completo</th>
                                        <th>Puesto</th>
                                        <th>Área</th>
                                        <th width="100px">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( empty($employees) ) : ?>
                                        <tr>
                                            <td class="table-empty" colspan="5">
                                                No hay ningún empleado registrado.
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php foreach ( $employees as $value ): ?>
                                    <tr>
                                        <td>
                                            <figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure>
                                        </td>
                                        <td data-title="Num. Empleado">#<?= $value['num_employee'] ?></td>
                                        <td data-title="Nombre"><?= $value['name'] ?> &nbsp <?= $value['ap_pat'] ?> &nbsp <?= $value['ap_mat'] ?></td>
                                        <td data-title="Puesto"><?= $value['position'] ?></td>
                                        <td data-title="Área"><?= $value['area'] ?></td>
                                        <td><?= ( ( $value['status'] == true ) ? '<span class="success">Activado</span>' : '<span class="alert">Desactivado</span>' ) ?></td>

                                        <td data-title="Acciones">
                                            <div class="content-cell">
                                                <div class="button-items text-right">
                                                    <a href="index.php?c=monitor&m=update_employee&id=<?= $value['id'] ?>" class="btn waves-effect waves-light">Ver</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Puestos -->
<section id="positions" class="modal" data-modal="positions">
    <div class="content">
        <header>Puestos de trabajo.</header>
        <main>
            <form name="create_position" class="m-b-20">
                <div class="row">
                    <div class="col-12 m-b-5">
                        <h6>Agregar puesto.</h6>
                    </div>
                    <div class="col-12 col-md-3 m-b-10">
                        <div class="label">
                            <label>
                                <input name="code" type="text"/>
                                <p class="description">Código</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 m-b-10">
                        <div class="label">
                            <label>
                                <input name="title" type="text"/>
                                <p class="description">Descripción</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 m-b-10">
                        <button type="submit" class="btn btn-block m-t-10">Agregar</button>
                    </div>
                </div>
            </form>

            <table class="table m-b-0" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( empty($positions) ) : ?>
                        <tr>
                            <td class="table-empty" colspan="5">
                                No hay ningún puesto registrado.
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ( $positions as $value ): ?>
                        <tr>
                            <td data-title="Código"><code><?= $value['code'] ?></code></td>
                            <td data-title="Descripción"><?= $value['title'] ?></td>
                            <td data-title="Acciones">
                                <div class="content-cell">
                                    <div class="button-items text-right">
                                        <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete-position="<?= $value['id'] ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
        <footer>
            <div class="action-buttons text-right">
                <button class="btn btn-link" button-close><small>Cerrar</small></button>
            </div>
        </footer>
    </div>
</section>
