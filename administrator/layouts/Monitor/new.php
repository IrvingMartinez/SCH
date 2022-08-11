<?php
defined('_EXEC') or die;

// Tinymce
$this->dependencies->add(['js', '{$path.plugins}tinymce/tinymce.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/monitor/create.js']);
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

                    <h4 class="page-title">Crear nuevo empleado</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <form name="create_employee" class="row font-14">
            <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Monitor/tpl_form_employee.php'), ['positions' => $positions, 'areas' => $areas, 'cities' => $cities, 'municipalities' => $municipalities] ); ?>
        </form>
    </div>
</main>
