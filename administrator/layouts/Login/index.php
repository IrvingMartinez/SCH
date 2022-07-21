<?php defined('_EXEC') or die; ?>

<div class="page login">
    <form name="login">
        <a href="index.php" class="logo"><img src="{$path.images}logotype-large.png" style="width:100%;max-width:200px;" alt="logo"></a>

        <h2>Iniciar sesión</h2>

        <div class="label">
            <label>
                <input name="username" type="text" placeholder="Nombre de usuario"/>
                <p class="description"></p>
            </label>
        </div>
        <div class="label">
            <label>
                <input name="password" type="password" placeholder="Contraseña"/>
                <p class="description"></p>
            </label>
        </div>

        <div class="button-items">
            <button class="btn btn-block btn-primary" type="submit">Iniciar sesión</button>
        </div>
    </form>
</div>
