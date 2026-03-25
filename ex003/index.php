<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos primitivos em PHP</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php
        // $num = 300;
        // echo "O valor da variável é $num"; 
       
        // $v = 300;
        // var_dump($v);

        //$num = 3e2; // 3 x 10^2
        //echo "O valor da variável é $num";

        //$num = 0x1A; // 26 em hexadecimal
        //echo "O valor da variável é $num";

        //$num = 0b11111111; // 255 em binário
        //echo "O valor da variável é $num";

        //$num = 0123; // 83 em octal
        //echo "O valor da variável é $num";

        //$num = 1_000_000; // 1 milhão
        //echo "O valor da variável é $num";

        //$num = 1.5e3; // 1500
        //echo "O valor da variável é $num"; 

        // $casado = false;
        // echo "O valor da variável é $casado";

        // $vetor = [1, 2, 3, 4, 5];
        // var_dump($vetor);

        // class Pessoa {
        //     private string $nome;
        //     private string $idade;
        // }

        // $p = new Pessoa();
        // var_dump($p);

        // $nome = "João";
        // $sobrenome = 'Silva';
        // echo "O nome completo é $nome $sobrenome \u{1F44B}";

        // const ESTADO = "São Paulo";
        // echo "O estado é " . ESTADO;

        // echo "estamos no ano de " . date('Y');

        // $nom = "Rodrigo";
        // $snom = "Nogueira";
        // echo "O nome do lutador é $nom \"Minoutauro\" $snom \u{1F44B}";

        $ra = 5 + 2; 

        $rb = 5 - 2;

        $rc = 5 * 2;

        $rd = 5 / 2;

        $re = 5 % 2;

        $rf = 5 ** 2;

        $rg = 5 + 2 * 3 - 4 / 2; // 5 + 6 - 2 = 9
        
        $rh = base_convert(254, 10, 8);
        
        echo "O resultado da operação é $ra <br>";
        echo "O resultado da operação é $rb <br>";
        echo "O resultado da operação é $rc <br>";
        echo "O resultado da operação é $rd <br>";
        echo "O resultado da operação é $re <br>";
        echo "O resultado da operação é $rf <br>";
        echo "O resultado da operação é $rg <br>";
        echo("A resposta é $rh");

    ?>    
</body>
</html>