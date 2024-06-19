<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700; /* Negrito */
        }

        .container {
  background: white;
  width: 300px;
  height: 300px;
  border-radius: 15px;
  margin: 100px auto;
  padding: 20px;
  text-align: center;
  box-shadow: 5px 5px 10px rgba(0.5, 0.5, 0.5, 0.5);
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
<div class="container">
    <div class="row">
        <center>
        <div></div>
            <h2>Entrar</h2>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->get('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('login/authenticate'); ?>" method="post">
                <div class="form-group">
                    <label for="nome">Usuário</label>
                    <input type="nome" class="form-control" id="nome" name="nome" value="<?php echo old('nome'); ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div><br>
                <button type="submit" class="btn btn-dark">Entrar</button>
            </form>
        </div>
    </div>
    </center>
</div>
</body>