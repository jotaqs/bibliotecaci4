<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor - Editar</title>
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
    <?=form_open('Autor/salvar')?>
    <input value='<?=$autor['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="row p-2">
        <div class="col-2">
            <label for="nome">Nome:</label>
        </div>
        <div class="col-10">
            <input value='<?=$autor['nome']?>'class='form-control' type="text" id='nome' name='nome'>
        </div>
    </div>
    <div class="row p-4">
        <div class="col form-group">
            <div class="btn-group w-100" role="group">
                <a href='http://localhost:8080/index.php/Aluno/index'class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Salvar</button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>
            </div>
        </div>
    </div>
    <?=form_close()?>
</div>

    <!-- Modal -->
    <?=form_open('Autor/excluir')?>
    <input value='<?=$autor['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Você tem certeza que deseja excluir: <br>ID: <?=$autor['id']?><br>Nome: <?=$autor['nome']?>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
        </div>
    </div>
    </div>