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
                        <li class="breadcrumb-item">
                            <a href="index.php?c=inbox">Inbox de RH</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Formato de Horarios
                        </li>
                    </ol>

                </div>
            </div>
        </div>

        <!-- COMMENT -->

        <form name="send_report" method="post" class="row">
            <?php echo $this->format->get_file(Security::DS(PATH_ADMINISTRATOR_LAYOUTS.'Schedule/tpl_form_sched.php'), ['employee_report' => $employee_report]);?>
        </form>

    </div>
</main>
