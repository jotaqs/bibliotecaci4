<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
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
    <h2>Alunos</h2>
    <!-- Button do Modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo
    </button>

    <!-- Blocos de Alunos -->
    <div class="row mt-3">
        <?php foreach ($listaAlunos as $au) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= anchor("Aluno/editar/".$au['id'], $au['nome']) ?></h5>
                        <p class="card-text">ID: <?= $au['id'] ?></p>
                        <p class="card-text">CPF: <?= $au['cpf'] ?></p>
                        <p class="card-text">Email: <?= $au['email'] ?></p>
                        <p class="card-text">Telefone: <?= $au['telefone'] ?></p>
                        <p class="card-text">Turma: <?= $au['turma'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
            
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1D" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?=form_open("Aluno/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Aluno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input class='form-control' type="text" id='cpf' name='cpf'>
                </div>
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
                    <label for="turma">Turma:</label>
                    <select class='form-control' name="turma" id="turma">
                        <option hidden>Selecione Uma Turma...</option>
                        <option value="1A">1A</option>
                        <option value="1B">1B</option>
                        <option value="1C">1C</option>
                        <option value="1D">1D</option>
                        <option value="2A">2A</option>
                        <option value="2B">2B</option>
                        <option value="2C">2C</option>
                        <option value="2D">2D</option>
                        <option value="3A">3A</option>
                        <option value="3B">3B</option>
                        <option value="3C">3C</option>
                        <option value="3D">3D</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </div>
        </div>
    </div>
        <?=form_close()?>
    </div>
</div>