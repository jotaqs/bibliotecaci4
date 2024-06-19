<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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


<div class="container">
    <h2>Usuários</h2>
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo
    </button>

    <div class="row mt-3">
        <?php foreach ($listaUsuarios as $u) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= anchor("Usuario/editar/".$u['id'], $u['nome']) ?></h5>
                        <p class="card-text">ID: <?= $u['id'] ?></p>
                        <p class="card-text">Email: <?= $u['email'] ?></p>
                        <p class="card-text">Telefone: <?= $u['telefone'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?=form_open("Usuario/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class='form-control' type="text" id='nome' name='nome'>
                </div>
                <div class="form-group">
                    <label for="e-mail">Email:</label>
                    <input class='form-control' type="text" id='email' name='email'>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input class='form-control' type="text" id='telefone' name='telefone'>
                </div>
                <div class="form-group">
                    <label for="senha">Senha Mestre:</label>
                    <input class="form-control" type="password" id="senha" name="senha">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-dark" onclick="validarSenha()">Cadastrar</button>
            </div>
        </div>
    </div>
        <?=form_close()?>
    </div>
</div>


<script>
    function validarSenha() {
        var senhaDigitada = document.getElementById('senha').value;
        var senhaMestre = 'jotasenha'; // Defina sua senha mestre aqui

        if (senhaDigitada === senhaMestre) {
            document.getElementById('telefoneInput').classList.remove('hidden');
        } else {
            alert('Senha incorreta. Tente novamente.');
            document.getElementById('senha').value = '';
        }
    }
</script>