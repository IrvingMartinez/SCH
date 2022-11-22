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

        <div class="row">
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
                <div class="card m-b-30" style="background-color:#081f65cc;">
                    <div class="card-body m-b-30">
                        <!-- <p class="text-muted m-b-20"> </p> -->
                    </div>
                </div>
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

    </div>

</main>
