<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do Cadastro</h1>
    </header>
    <main>
        <?php
            $nome = $_GET['nome'] ?? 'Não informado';
            $email = $_GET['email'] ?? 'Não informado';
            $sobrenome = $_GET['sobrenome'] ?? 'Não informado';

            echo "<p> Obrigado por se cadastrar! $nome $sobrenome 👍</p>";
            echo "<p><strong>Nome:</strong> $nome</p>";
            echo "<p><strong>Sobrenome:</strong> $sobrenome</p>";
            echo "<p><strong>Email:</strong> $email</p>";
                       
        ?>

    <p><a href="javascript:history.go(-1)" class="btn">Voltar para o cadastro</a></p>
    </main>   
</body>
</html>
