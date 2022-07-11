<?php
defined('_EXEC') or die;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}bootstrap-inputmask/jquery.inputmask.min.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Alertify
$this->dependencies->add(['css', '{$path.plugins}alertify/css/alertify.css']);
$this->dependencies->add(['js', '{$path.plugins}alertify/js/alertify.js']);

// Page
$this->dependencies->add(['js', '{$path.js}pages/register.js']);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="p-t-10 p-b-50 gradient-primary-gray">
            <div class="container">
                <?php echo $this->format->get_file( Security::DS(PATH_LAYOUTS . 'Templates/register_form.php'), ['ladas' => $ladas] ); ?>
            </div>
        </section>
    </main>
</div>
