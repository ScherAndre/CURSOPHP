<?php
$numero     = null;
$antecessor = null;
$sucessor   = null;
$erro       = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['numero'] ?? '';

    if ($input === '' || !is_numeric($input)) {
        $erro = 'Por favor, insira um número válido.';
    } else {
        $numero     = (float) $input;
        $antecessor = $numero - 1;
        $sucessor   = $numero + 1;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antecessor e Sucessor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Antecessor e Sucessor</h1>

    <div class="card">
        <form method="POST" action="">

            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero"
                   value="<?= htmlspecialchars($_POST['numero'] ?? '') ?>"
                   placeholder="Digite um número" step="any" autofocus>

            <?php if ($erro): ?>
                <p class="erro"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <button type="submit">Calcular</button>

        </form>

        <?php if ($numero !== null): ?>
        <div class="resultado">
            <p>Número informado: <span><?= $numero ?></span></p>
            <p>Antecessor: <span><?= $antecessor ?></span></p>
            <p>Sucessor: <span><?= $sucessor ?></span></p>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>