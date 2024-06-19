<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
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
    <h2>Autores</h2>
    <!-- Button do Modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo
    </button>

    <!-- Blocos de Autores -->
    <div class="row mt-3">
        <?php foreach ($listaAutor as $a) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= anchor("Autor/editar/".$a['id'], $a['nome']) ?></h5>
                        <p class="card-text">ID: <?= $a['id'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?=form_open("Autor/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Autor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class='form-control' type="text" id='nome' name='nome'>
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