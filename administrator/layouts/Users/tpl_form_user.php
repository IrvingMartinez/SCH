<?php defined('_EXEC') or die; ?>
<div class="row">
    <div class="col-12 m-b-10">
        <div class="label">
            <label>
                <input name="username" type="text"/>
                <p class="description">Usuario</p>
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
    <div class="col-12 m-b-20">
        <div class="label">
            <label>
                <select name="level">
                    <?php foreach ( $levels as $value ): ?>
                        <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description">Nivel de usuario</p>
            </label>
        </div>
    </div>
    <div class="col-12">
        <p>Seleccione los permisos del usuario.</p>
    </div>
    <div class="col-12">
        <?php foreach ( $permissions as $value ): ?>
            <div class="label">
                <label class="checkbox">
                    <p class="font-16"><?= $value['title'] ?></p>
                    <input type="checkbox" class="input-primary" name="permissions[]" value="<?= $value['code'] ?>"/>
                    <div class="checkbox_indicator"></div>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
</div>
