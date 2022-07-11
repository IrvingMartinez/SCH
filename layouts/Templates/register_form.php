<?php defined('_EXEC') or die; ?>

<form id="user-register" name="user-register" class="form-access bx-shadow m-t-20 m-b-20">
    <header>
        <div class="icon-user">
            <i class="ti-user"></i>
        </div>

        <h3 class="title-page">Registrarme</h3>
    </header>
    <main>
        <div class="row">
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="name" type="text" required/>
                        <p class="description">Nombre</p>
                    </label>
                </div>
            </div>
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="email" type="email" required/>
                        <p class="description">Correo electrónico</p>
                    </label>
                </div>
            </div>
            <div class="col-4 col-sm-5 p-r-10 m-b-10">
                <div class="label">
                    <label>
                        <select name="prefix">
                            <?php foreach ( $ladas as $value ): ?>
                                <option value="<?= $value['lada'] ?>" <?= ( $value['lada'] === '52' ) ? 'selected' : '' ?> ><?= $value['name']['es'] ?> ( +<?= $value['lada'] ?> )</option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description">Prefijo</p>
                    </label>
                </div>
            </div>
            <div class="col-8 col-sm-7 p-l-10 m-b-10">
                <div class="label">
                    <label>
                        <input name="phone" type="tel" data-inputmask="'mask': '(999) 999-9999'" required/>
                        <p class="description">Teléfono <small>(10 Dígitos)</small></p>
                    </label>
                </div>
            </div>
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="password" type="password" required/>
                        <p class="description">Contraseña</p>
                    </label>
                </div>
            </div>
            <div class="col-12 m-b-10">
                <div class="label">
                    <label>
                        <input name="r-password" type="password" required/>
                        <p class="description">Repetir contraseña</p>
                    </label>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <button type="submit" class="btn btn-block">Registrarme</button>
        <a href="/iniciar-sesion" class="btn btn-link btn-block">Ya tengo cuenta, iniciar sesión.</a>
    </footer>
</form>
