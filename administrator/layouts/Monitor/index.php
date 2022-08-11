<?php
defined('_EXEC') or die;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}bootstrap-inputmask/jquery.inputmask.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/monitor/view.js']);

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
                                        <th>Nombre</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
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
                                        <td data-title="Nombre"><?= $value['name'] ?></td>
                                        <td data-title="Ap. Paterno"><?= $value['ap_pat'] ?></td>
                                        <td data-title="Ap. Materno"><?= $value['ap_mat'] ?></td>
                                        <td><?= ( ( $value['status'] == true ) ? '<span class="success">Activado</span>' : '<span class="alert">Desactivado</span>' ) ?></td>

                                        <td data-title="Acciones">
                                            <div class="content-cell">
                                                <div class="button-items text-right">
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light" data-ajax-user="<?= $value['id'] ?>">Asignar tarjeta</a>
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

<!-- Crear nuevo empleado -->
<section id="employee_create" class="modal size-big" data-modal="employee_create">
    <div class="content">
        <header>Agregar nuevo empleado</header>
        <main>
            <form name="employee_create">
                <?php //echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Monitor/tpl_form_employee.php')); ?>
            </form>
        </main>
        <footer>
            <div class="action-buttons text-right">
                <button class="btn btn-link" button-close><small>Cerrar sin crear</small></button>
                <?php if ( in_array('{employee_create}', Session::get_value('session_permissions')) ): ?>
                    <button class="btn btn-primary waves-effect waves-light" button-submit>Crear empleado</button>
                <?php else: ?>
                    <button class="btn btn-primary waves-effect waves-light" disabled>No tienes permisos para crear un empleado.</button>
                <?php endif; ?>
            </div>
        </footer>
    </div>
</section>
