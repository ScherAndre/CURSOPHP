<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Conversão</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado da Conversão</h1>
    </header>
    <main>
        <?php
            $real = $_GET['valor'] ?? 0;
            $taxa = 0.18;
            $dolar = $real * $taxa;

            echo "<p>Obrigado por usar o conversor! " . number_format($real, 2, ',', '.') . " BRL em USD.</p>";
            echo "<p><strong>Valor em Real:</strong> R$ " . number_format($real, 2, ',', '.') . "</p>";
            
            echo "<table class='divisao'>";
            echo "<tr><td>" . number_format($real, 2, ',', '.') . "</td><td>→</td><td>$</td></tr>";
            echo "<tr><td>BRL</td><td>" . number_format($taxa, 2) . "</td><td>" . number_format($dolar, 2, '.', ',') . "</td></tr>";
            echo "</table>";
            
            echo "<p><strong>Taxa usada:</strong> 1 BRL = $taxa USD (cotação fixa para demonstração)</p>";
                       
        ?>

<p><a href="javascript:history.go(-1)" class="btn">Voltar para o conversor</a></p>
    </main>   
</body>
</html>
