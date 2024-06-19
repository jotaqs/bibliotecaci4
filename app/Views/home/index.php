<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700; /* Negrito */
        }

        
    </style>
</head>
</html>

<head>
<style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .conteudo-centralizado {
            text-align: center;
        }
    </style>
</head>
<div class="conteudo-centralizado">
<div class="container p-4">
    <center>
    <h1>Bem-vindo, <?php echo esc($nome); ?>!</h1>
    <br>
    <a class="btn btn-dark" href="/index.php/Aluno/index" role="button">Aluno</a>
    <a class="btn btn-dark" href="/index.php/Autor/index" role="button">Autor</a>
    <a class="btn btn-dark" href="/index.php/Editora/index" role="button">Editora</a>
    <a class="btn btn-dark" href="/index.php/Emprestimo/index" role="button">Empréstimo</a>
    <a class="btn btn-dark" href="/index.php/Livro/index" role="button">Livro</a>
    <a class="btn btn-dark" href="/index.php/Obra/index" role="button">Obra</a>
    <a class="btn btn-dark" href="/index.php/Usuario/index" role="button">Usuário</a>
    <a href="<?= base_url('login/logout') ?>" class="btn btn-dark" method="post">Sair</a>

    </div>
</center>
</div>   
    </div>
