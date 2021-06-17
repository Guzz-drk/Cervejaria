<?php

session_start();
$id_leva = $_GET['id_leva']
?>
<form action="../../Controller/levaController.php?operation=maltes" method="POST">
    <input hidden name="id_leva" type="int" value="<?= $id_leva ?>">
    <select name="id_malte" id="malte">
        <?php
        $maltes = array();
        $maltes = unserialize($_SESSION['maltes']);
        var_dump($maltes);
        foreach ($maltes as $malte) : ?>
            <option value="<?= $malte['id'] ?>"> <?= $malte['nome'] ?></option>
        <?php endforeach; ?>
    </select>
<input type="number" step="0.1" name="quant">
<button type="submit">enviar</button>
</form>