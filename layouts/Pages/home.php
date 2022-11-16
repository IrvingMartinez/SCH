<?php defined('_EXEC') or die; ?>

<div id="page">
    %{main-header}%

    <main id="main-content">
        <?php foreach ($data as $key => $value): ?>
        <h1><?= $data['name'] ?></h1>
        <?php endforeach; ?>
    </main>
</div>
