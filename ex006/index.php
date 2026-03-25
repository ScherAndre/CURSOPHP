<?php
$sorteado = null;
$erro     = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $min = $_POST['min'] ?? '';
    $max = $_POST['max'] ?? '';

    if ($min === '' || $max === '' || !is_numeric($min) || !is_numeric($max)) {
        $erro = 'Por favor, preencha os dois campos com números válidos.';
    } elseif ((int)$min >= (int)$max) {
        $erro = 'O valor mínimo deve ser menor que o máximo.';
    } else {
        $sorteado = rand((int)$min, (int)$max);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Número</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Sorteador de Número</h1>

    <div class="card">
        <form method="POST" action="">

            <label for="min">Número mínimo:</label>
            <input type="number" id="min" name="min"
                   value="<?= htmlspecialchars($_POST['min'] ?? '') ?>"
                   placeholder="Ex: 1" autofocus>

            <label for="max">Número máximo:</label>
            <input type="number" id="max" name="max"
                   value="<?= htmlspecialchars($_POST['max'] ?? '') ?>"
                   placeholder="Ex: 100">

            <?php if ($erro): ?>
                <p class="erro"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <button type="submit">Sortear</button>

        </form>

        <?php if ($sorteado !== null): ?>
        <div class="resultado">
            <p>Número sorteado entre <?= (int)$_POST['min'] ?> e <?= (int)$_POST['max'] ?>:</p>
            <p class="numero-sorteado"><?= $sorteado ?></p>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>