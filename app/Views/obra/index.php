<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obra</title>
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
    <h2>Obras</h2>
    <!-- Button do Modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo
    </button>

    <!-- Blocos de Obras -->
    <div class="row mt-3">
        <?php foreach ($listaObra as $ob) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= anchor("Obra/editar/".$ob['id'], $ob['titulo']) ?></h5>
                        <p class="card-text">ID: <?= $ob['id'] ?></p>
                        <p class="card-text">Categoria: <?= $ob['categoria'] ?></p>
                        <p class="card-text">Ano de Publicação: <?= $ob['ano_publicacao'] ?></p>
                        <p class="card-text">ISBN: <?= $ob['isbn'] ?></p>
                        <p class="card-text">Editora: <?php
                            foreach($listaEditora as $editora){
                                $editoras[$editora['id']] = $editora['nome'];
                            }
                        ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open("Obra/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Obra</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input class='form-control' type="text" id='titulo' name='titulo'>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input class='form-control' type="text" id='categoria' name='categoria'>
                </div>
                <div class="form-group">
                    <label for="ano">Ano:</label>
                    <input class='form-control' type="text" id='ano_publicacao' name='ano_publicacao'>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input class='form-control' type="text" id='isbn' name='isbn'>
                </div>
                <div class="form-group">
                    <label for="telefone">EDITORA:</label>
                    <select class='form-select' name="id_editora" id="id_editora" required>
                        <option value="" disabled selected>Selecione uma editora</option>
                        <?php foreach($listaEditora as $editora) : ?>
                            <option value="<?=$editora['id']?>"><?=$editora['nome']?></option>
                        <?php endforeach ?>
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