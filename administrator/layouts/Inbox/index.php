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
                            Inbox de RH
                        </li>
                    </ol>

                    <h4 class="page-title">
                        Respuesta de Incidencias
                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <p class="text-muted m-b-30 font-14">Incidencias Reportadas</p>

                        Pendientes de revisión

                        <?php if(empty($reports)):?>

                            <br><br>
                            <p align="center" class="text-muted m-b-30 font-14">Sin Incidencias al momento</p>

                        <?php else:?>

                            <div class="table-box-responsive-lg">
                                <table id="entries-table" class="table m-b-0" style="font-size:14px">
                                    <thead>
                                        <tr>
                                            <th>Foto ID</th>
                                            <th>Empleado</th>
                                            <th>Código de Incidencia</th>
                                            <th>Fecha de Incidencia</th>
                                            <th>Status de Reporte</th>
                                            <th>Departamento</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($reports as $value):?>
                                            <tr>
                                                <td><figure><img src="<?= ( isset($value['avatar']) ) ? '{$path.root_uploads}'. $value['avatar'] : '{$path.images}empty.png'; ?>"></figure></td>
                                                <td data-title="emp_detail"><?=$value['name']?>&nbsp<?=$value['ap_pat']?>&nbsp<?=$value['ap_mat']?></td>
                                                <td>
                                                    <?php if($value['status_entry'] == "1"):?>
                                                        Retardo
                                                    <?php else:?>
                                                        Falta
                                                    <?php endif;?>
                                                </td>
                                                <td><?=$value['check_date']?></td>
                                                <td>Pendiente de Reporte</td>
                                                <td><?=$value['title']?></td>
                                                <td data-title="id">
                                                    <a href="index.php?c=inbox&m=incidence_report&id=<?=$value['id']?>" class="btn btn-primary">Reportar Incidencia</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
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
