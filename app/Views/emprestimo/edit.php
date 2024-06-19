<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo - Editar</title>
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


<div class="container p-5">
    <?=form_open('Emprestimo/salvar')?>
    <input value='<?=$emprestimo['id']?>'class='form-control' type="hidden" id='id' name='id'>

    <div class="row p-2">
        <div class="col-2">
            <label for="data_inicio">Data de Inicio:</label>
        </div>
        <div class="col-10">
        <input class="form-control" type="date" id="data_inicio" name="data_inicio">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_fim">Data do Fim:</label>
        </div>
        <div class="col-10">
        <input class="form-control" type="date" id="data_fim" name="data_fim">
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_prazo">Data do Prazo:</label>
        </div>
        <div class="col-10">
            <input value='<?=$emprestimo['data_prazo']?>'class='form-control' type="text" id='data_prazo' name='data_prazo'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="telefone">Livro:</label>
        </div>
        <div class="col-10">
            <select class='form-select' name="id_livro" id="id_livro" required>
                <?php foreach($listaLivro as $livro) : ?>
                    <option value="<?=$livro['id']?>"><?=$livro['status']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="telefone">Aluno:</label>
        </div>
        <div class="col-10">
            <select class='form-select' name="id_aluno" id="id_aluno" required>
                <?php foreach($listaAluno as $aluno) : ?>
                    <option value="<?=$aluno['id']?>"><?=$aluno['nome']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="telefone">Usuario:</label>
        </div>
        <div class="col-10">
            <select class='form-select' name="id_usuario" id="id_usuario" required>
                <?php foreach($listaUsuario as $usuario) : ?>
                    <option value="<?=$usuario['id']?>"><?=$usuario['nome']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row p-4">
        <div class="col">
            <div class="btn-group w-100" role="group">
                <a href='http://localhost:8080/index.php/Emprestimo/index'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>

    <!-- Modal De Excluir-->
    <?=form_open('Emprestimo/excluir')?>
    <input value='<?=$emprestimo['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja excluir: <br>Data de Inicio: <?=$emprestimo['data_inicio']?><br>Data do Fim:: <?=$emprestimo['data_fim']?><br>Data do Prazo:: <?=$emprestimo['data_prazo']?><br>Livro: <?=$emprestimo['id_livro']?><br> Aluno: <?=$emprestimo['id_aluno']?><br> Usuario: <?=$emprestimo['id_usuario']?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
        </div>
        <?=form_close()?>
    </div>
    </div>

