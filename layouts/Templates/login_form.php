<?php defined('_EXEC') or die; ?>

<form id="user-login" name="user-login" class="form-access bx-shadow m-t-20 m-b-20">
    <header>
        <div class="icon-user">
            <i class="ti-user"></i>
        </div>

        <h3 class="title-page">Inicio de sesión</h3>
    </header>
    <main>
        <div class="row">
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="email" type="text"/>
                        <p class="description">Correo electrónico</p>
                    </label>
                </div>
            </div>
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="password" type="password"/>
                        <p class="description">Contraseña</p>
                    </label>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <button type="submit" class="btn btn-block">Iniciar sesión</button>
        <a href="/registrarme" class="btn btn-link btn-block">No tengo cuenta, registrarme.</a>
    </footer>
</form>
