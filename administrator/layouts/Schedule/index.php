<?php defined('_EXEC') or die;?>

<main class="wrapper">
  <div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <ol class="breadcrumb hide-phone">
                    <li class="breadcrumb-item">
                        <a href="index.php">{$vkye_webpage}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Asignación de Horarios
                    </li>
                </ol>

                <h4 class="page-title">
                    Selección por Empleado
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card m-b-30">
                 <div class="card-body">

                     <?php if(empty($employees)):?>
                         No hay empleados registrados
                     <?php else:?>
                         <div class="table-box-responsive-lg">
                             <table id="entries-table" class="table m-b-0" style="font-size:14px">
                                 <thead>
                                     <tr>
                                        <th>Foto ID</th>
                                        <th>Empleado</th>
                                        <th>Horario Entrada Actual</th>
                                        <th>Departamento</th>
                                        <th>Acciones</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                         <?php foreach($employees as $value):?>
                                             <tr>
                                                 <td>
                                                     <figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure>
                                                 </td>
                                                 <td>
                                                     <?=$value['name']?> <?=$value['ap_pat']?> <?=$value['ap_mat']?>
                                                 </td>
                                                 <td>
                                                     <?=$value['sched_time']?>
                                                 </td>
                                                 <td>
                                                     <?=$value['title']?>
                                                 </td>
                                                 <td>
                                                     <a class="btn btn-primary" href="index.php?c=schedule&m=change_schedule&id=<?=$value['emp_id']?>">Asignar Horario</a>
                                                 </td>
                                             </tr>
                                         <?php endforeach;?>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     <?php endif;?>

                 </div>
            </div>
        </div>
    </div>

  </div>
</main>
