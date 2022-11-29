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
                            Entradas
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <p class="text-muted m-b-30 font-14">Lista de Empleados para Horarios</p>

                        <?php if(empty($areas)):?>
                            <div align="center">
                                Areas vacias
                            </div>
                        <?php else:?>
                            <div class="table-box-responsive-lg">
                                <table id="entries-table" class="table m-b-0" style="font-size:14px">
                                    <thead>
                                        <tr>
                                            <th>ID Area</th>
                                            <th>Código de Área</th>
                                            <th>Titulo de Área</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($areas as $value):?>
                                            <tr>
                                                <td>
                                                    <?=$value['id']?>
                                                </td>
                                                <td>
                                                    <?=$value['code']?>
                                                </td>
                                                <td>
                                                    <?=$value['title']?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="index.php?c=monitor&area_id=<?=$value['id']?>">Empleados</a>
                                                    <a class="btn btn-success" href="index.php?c=schedule&area_id=<?=$value['id']?>">Horarios</a>
                                                    <a class="btn btn-secondary" href="index.php?c=manager&area_id=<?=$value['id']?>">Incidencias</a>
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
