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

        <div class="col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form class="row">

                        &nbsp&nbsp<?=$employee['name']?>

                    </form>
                </div>
            </div>
        </div>



    </div>

</main>
