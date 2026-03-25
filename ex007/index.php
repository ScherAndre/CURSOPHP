<?php
$senha     = null;
$erro      = null;
$opcoes    = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tamanho = $_POST['tamanho'] ?? '';
    $numeros = isset($_POST['numeros']);
    $simbolos = isset($_POST['simbolos']);
    $maiusculas = isset($_POST['maiusculas']);

    if ($tamanho === '' || !is_numeric($tamanho) || (int)$tamanho < 4 || (int)$tamanho > 50) {
        $erro = 'Por favor, informe um tamanho entre 4 e 50 caracteres.';
    } elseif (!$numeros && !$simbolos && !$maiusculas) {
        $erro = 'Selecione pelo menos uma opção de caracteres.';
    } else {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
        if ($maiusculas) $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($numeros) $chars .= '0123456789';
        if ($simbolos) $chars .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        
        $senha = '';
        for ($i = 0; $i < (int)$tamanho; $i++) {
            $senha .= $chars[rand(0, strlen($chars) - 1)];
        }
        $opcoes = [
            'tamanho' => $tamanho,
            'numeros' => $numeros,
            'simbolos' => $simbolos,
            'maiusculas' => $maiusculas
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Gerador de Senha</h1>

    <div class="card">
        <form method="POST" action="">

            <label for="tamanho">Tamanho da senha:</label>
            <input type="number" id="tamanho" name="tamanho"
                   value="<?= htmlspecialchars($_POST['tamanho'] ?? '12') ?>"
                   min="4" max="50" placeholder="Ex: 12" autofocus>

            <div class="opcoes">
                <label>
                    <input type="checkbox" name="maiusculas" <?= ($_POST['maiusculas'] ?? '') ? 'checked' : '' ?>>
                    Incluir maiúsculas (A-Z)
                </label>
                <label>
                    <input type="checkbox" name="numeros" <?= ($_POST['numeros'] ?? '') ? 'checked' : '' ?>>
                    Incluir números (0-9)
                </label>
                <label>
                    <input type="checkbox" name="simbolos" <?= ($_POST['simbolos'] ?? '') ? 'checked' : '' ?>>
                    Incluir símbolos (!@#)
                </label>
            </div>

            <?php if ($erro): ?>
                <p class="erro"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <button type="submit">Gerar Senha</button>

        </form>

        <?php if ($senha !== null): ?>
        <div class="resultado">
            <p>Senha gerada (<?= $opcoes['tamanho'] ?> chars):</p>
            <p class="senha-gerada"><?= htmlspecialchars($senha) ?></p>
            <button type="button" onclick="copiarSenha()" class="btn-copiar">Copiar</button>
        </div>
        <?php endif; ?>
    </div>

    <script>
        function copiarSenha() {
            const senha = '<?= addslashes($senha) ?>';
            navigator.clipboard.writeText(senha).then(() => {
                alert('Senha copiada!');
            });
        }
    </script>

</body>
</html>
