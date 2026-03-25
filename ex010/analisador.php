<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Análise</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado da Análise</h1>
    </header>
    <main>
<?php
            $input = $_GET['numero'] ?? '0';
            
            $limpo = str_replace('.', '', $input);
            $pos_comma = strrpos($limpo, ',');
            if ($pos_comma === false) {
                $parte_inteira_raw = $limpo;
                $parte_frac_raw = '0';
            } else {
                $parte_inteira_raw = substr($limpo, 0, $pos_comma);
                $parte_frac_raw = substr($limpo, $pos_comma + 1);
            }
            
            $len_int = strlen($parte_inteira_raw);
            if ($len_int > 3) {
                $parte_inteira = substr($parte_inteira_raw, 0, $len_int - 3) . '.' . substr($parte_inteira_raw, $len_int - 3);
            } else {
                $parte_inteira = $parte_inteira_raw;
            }
            
            $parte_fracionaria = $parte_frac_raw;
            
            echo "<p>O número analisado foi <strong>$input</strong></p>";
            
            echo "<ul>";
            echo "<li>Parte inteira: <strong>$parte_inteira</strong></li>";
            echo "<li>Parte fracionária: <strong>0,$parte_fracionaria</strong></li>";
            echo "</ul>";

        ?>
        <p><a href="javascript:history.go(-1)" class="btn">Analisar outro número</a></p>
    </main>   
</body>
</html>
