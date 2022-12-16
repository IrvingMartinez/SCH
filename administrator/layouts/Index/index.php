<?php defined('_EXEC') or die; ?>
<main class="wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item hide-phone">
                            <a href="index.php">{$vkye_webpage}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Vista de Entradas
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form class="m-b-20" name="search">
                        <input type="search" name="num_card" placeholder="Pase la tarjeta por el lector..." autofocus="autofocus">
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            setTimeout(function() {
                $('#info').fadeOut('fast');
            }, 2600); // <-- time in milliseconds
        </script>

        <!-- agregar case if(empty)-->

        <?php if(empty($employee)):?>
            <?php if(isset($_GET['num_card']) && !empty($_GET['num_card'])):?>
                <div id="info" class="card m-b-30" style="background-color:#566ff5">
                    <div class="card-body m-b-30">
                        <div class="header-title font-20 m-t-0">
                            <h4 align="center" style="color:#f2f3f7" class="p-t-5">Empleado o tarjeta no Registrado</h4>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="card m-b-30" style="background-color:#566ff5;">
                    <div class="card-body m-b-30">
                        <div class="header-title font-20 m-t-0">
                            <h4 align="center" style="color:#f2f3f7" class="p-t-5">Esperando lectura...</h4>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php else:?>
            <div id="info" class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-1">
                                    <figure class="logo"><img src="{$path.images}logotype-large.png" style="width:100%;max-width:60px;" alt="logo"></figure>
                                </div>
                                <div class="col-md-1">
                                    <figure class="logo"><img src="{$path.images}logotype-sm-white.jpeg" style="width:100%;max-width:60px;" alt="logo"></figure>
                                </div>
                            </div>

                            <h1 class="header-title font-20 m-t-0"></h1>
                            <p class="text-muted m-b-10"> </p>
                            <div class="row">
                                <div class="col-md-1 m-t-50 m-b-50">
                                    <h5>Nombre:</h5>
                                </div>
                                <div class="col-md-5 m-t-50 m-b-50">
                                    <h3>&nbsp<?=$employee['name']?> &nbsp<?=$employee['ap_pat']?> &nbsp<?=$employee['ap_mat']?></h3>
                                </div>
                                <div class="col-md-1 m-t-50 m-b-50">
                                    <h5>Área:</h5>
                                </div>
                                <div class="col-md-5 m-t-50 m-b-50">
                                    <h3><?=$employee['area']?></h3>
                                </div>
                                <div class="col-md-1 m-t-50 m-b-50">
                                    <h5>Puesto:</h5>
                                </div>
                                <div class="col-md-4 m-t-50 m-b-50">
                                    <h3><?=$employee['position']?></h3>
                                </div>
                                <div class="col-md-1 m-t-50 m-b-50">
                                    <h5>CUIP:</h5>
                                </div>
                                <div class="col-md-4 m-t-50 m-b-50">
                                    <h3><?=$employee['cuip']?></h3>
                                </div>
                            </div>
                            <p class="text-muted m-b-40"> </p>
                        </div>
                    </div>
                    <?php if($response == "1"):?>
                        <div class="card m-b-30" style="background-color:#566ff5;">
                            <div class="card-body m-b-30">
                                <div class="header-title font-20 m-t-0">
                                    <h4 align="center" style="color:#f2f3f7" class="p-t-5">Empleado no Registrado</h4>
                                </div>
                            </div>
                        </div>
                    <?php elseif($response == "2"):?>
                        <div class="card m-b-30" style="background-color:#566ff5;">
                            <div class="card-body m-b-30">
                                <div class="header-title font-20 m-t-0">
                                    <h4 align="center" style="color:#f2f3f7" class="p-t-5">Empleado Inactivo</h4>
                                </div>
                            </div>
                        </div>
                    <?php elseif($response == "3"):?>
                        <div class="card m-b-30" style="background-color:#566ff5;">
                            <div class="card-body m-b-30">
                                <div class="header-title font-20 m-t-0">
                                    <h4 align="center" style="color:#f2f3f7" class="p-t-5">Empleado sin Horario Asignado</h4>
                                </div>
                            </div>
                        </div>
                    <?php elseif($response == "4"):?>
                        <div class="card m-b-30" style="background-color:#566ff5;">
                            <div class="card-body m-b-30">
                                <div class="header-title font-20 m-t-0">
                                    <h4 align="center" style="color:#f2f3f7" class="p-t-5">Empleado ya Registrado Hoy</h4>
                                </div>
                            </div>
                        </div>
                    <?php elseif($response == "5"):?>
                        <?php if($res == "1"):?>
                            <div class="card m-b-30" style="background-color:#d4b022;">
                                <div class="card-body m-b-30">
                                    <div class="header-title font-20 m-t-0">
                                        <h4 align="center" style="color:#3b3635" class="p-t-5">Bienvenido. Retardo.</h4>
                                    </div>
                                </div>
                            </div>
                        <?php elseif($res == "0"):?>
                            <div class="card m-b-30" style="background-color:#31910f;">
                                <div class="card-body m-b-30">
                                    <div class="header-title font-20 m-t-0">
                                        <h4 align="center" style="color:black" class="p-t-5">Bienvenido. Regular.</h4>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endif;?>

                </div>
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="upload_image_preview">
                                <figure class="m-0" style="height:500px;"><img class="img-fluid" src="<?= ( isset($employee['avatar']) ) ? '{$path.root_uploads}'. $employee['avatar'] : '{$path.images}empty.png'; ?>"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>


    </div>

</main>
