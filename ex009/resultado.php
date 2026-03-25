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
        <h1>Resultado da Conversão (API BC)</h1>
    </header>
    <main>
        <?php
            $real = $_GET['valor'] ?? 0;

            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarAjusteDia(dataCotacao=@dataCotacao)?@dataCotacao=\'09-12-2024\'&$top=1&$format=json';
            $json = file_get_contents($url);
            $data = json_decode($json, true);

            if ($data && isset($data['value'][0]['cotacaoVenda'])) {
                $taxa = $data['value'][0]['cotacaoVenda'];
                $dolar = $real * $taxa;

                echo "<p>Obrigado por usar o conversor com API Banco Central! " . number_format($real, 2, ',', '.') . " BRL em USD.</p>";
                echo "<p><strong>Valor em Real:</strong> R$ " . number_format($real, 2, ',', '.') . "</p>";
                
                echo "<table class='divisao'>";
                echo "<tr><td>" . number_format($real, 2, ',', '.') . "</td><td>→</td><td>$</td></tr>";
                echo "<tr><td>BRL</td><td>" . number_format($taxa, 2, ',', '.') . "</td><td>" . number_format($dolar, 2, ',', '.') . "</td></tr>";
                echo "</table>";
                
                echo "<p><strong>Taxa oficial BC (venda):</strong> R$ " . number_format($taxa, 2, ',', '.') . " por 1 USD (data: 09-12-2024)</p>";
            } else {
                echo "<p>Erro ao obter cotação do Banco Central. Usando taxa fixa 5.6.</p>";
                $taxa = 5.6;
                $dolar = $real * $taxa;
                
                echo "<p><strong>Valor em Real:</strong> R$ " . number_format($real, 2, ',', '.') . "</p>";
                
                echo "<table class='divisao'>";
                echo "<tr><td>" . number_format($real, 2, ',', '.') . "</td><td>→</td><td>$</td></tr>";
                echo "<tr><td>BRL</td><td>" . number_format($taxa, 2, ',', '.') . "</td><td>" . number_format($dolar, 2, ',', '.') . "</td></tr>";
                echo "</table>";
            }
        ?>

<p><a href="javascript:history.go(-1)" class="btn">Voltar para o conversor</a></p>
    </main>   
</body>
</html>
