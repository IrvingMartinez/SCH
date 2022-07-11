<?php
defined('_EXEC') or die;

// Alertify
$this->dependencies->add(['css', '{$path.plugins}alertify/css/alertify.css']);
$this->dependencies->add(['js', '{$path.plugins}alertify/js/alertify.js']);

// Page
$this->dependencies->add(['js', '{$path.js}pages/login.js']);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="p-t-10 p-b-50 gradient-primary-gray">
            <div class="container">
                <?php $this->format->import_file( Security::DS(PATH_LAYOUTS . 'Templates'), 'login_form', 'php' ); ?>
            </div>
        </section>
    </main>
</div>
