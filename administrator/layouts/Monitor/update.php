<?php
defined('_EXEC') or die;

// Pages
$this->dependencies->add(['js', '{$path.js}pages/monitor/update.js']);
?>
<main class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item">
                            <a href="index.php">{$vkye_webpage}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="index.php?c=monitor">Empleados</a>
                        </li>
                        <li class="breadcrumb-item active">Nuevo empleado</li>
                    </ol>


                    <h4 class="page-title">Editar: <?= $employee['name'] ?> &nbsp <?= $employee['ap_pat'] ?>&nbsp <?= $employee['ap_mat']?></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <form name="update_employee" class="row font-14">
            <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Monitor/tpl_form_employee.php'), ['positions' => $positions, 'areas' => $areas, 'municipalities' => $municipalities, 'employee' => $employee] ); ?>
        </form>
    </div>
</main>
