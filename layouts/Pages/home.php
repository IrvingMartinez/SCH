<?php defined('_EXEC') or die; ?>

<div id="page">
    %{main-header}%

    <main id="main-content">

        <form method="post" >

            <div>

                <input type="text" name="test" placeholder="Pase la tarjeta..." autofocus="autofocus">
                <input type="submit">

                <p>
                    <?php if(isset($_POST['test']) && !empty($_POST['test'])):?>
                        La tarjeta es <?= $_POST['test'] ?>
                    <?php else:?>
                        Pase la tarjeta
                    <?php endif;?>
                </p>

            </div>

        </form>

    </main>
</div>
