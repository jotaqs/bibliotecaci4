<!DOCTYPE html>
<html lang="en">
<head>
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
<body>
<div class="container">
    <h2>Livros</h2>
    <!-- Button do Modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novo
    </button>

    <!-- Blocos de Livros -->
    <div class="row mt-3">
        <?php foreach ($listaLivro as $li) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <?php 
                            $obra = array_filter($listaObra, function($o) use ($li) {
                                return $o['id'] == $li['id_obra'];
                            });
                            if(count($obra) > 0){
                                $obra = array_values($obra)[0];
                                // Adicionando o atributo data-nome-obra para armazenar o nome da obra
                                echo '<h5 class="card-title" data-nome-obra="' . htmlspecialchars($obra['titulo']) . '">';
                                echo anchor("Livro/editar/".$li['id'], $obra['titulo'] .' #'.$li['id']);
                                echo '</h5>';
                            }
                        ?>
                        <p class="card-text">Disponível: <?= $li['disponivel'] ?></p>
                        <p class="card-text">Status: <?= $li['status'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?=form_open("Livro/cadastrar")?> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Livro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="disponivel">Disponivel:</label>
                    <input class='form-control' type="text" id='disponivel' name='disponivel'>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input class='form-control' type="text" id='status' name='status'>
                </div>
                <div class="form-group">
                    <label for="telefone">Obra:</label>
                    <select class='form-select' name="id_obra" id="id_obra" required>
                        <option>Selecione uma obra</option>
                        <?php foreach($listaObra as $obra) : ?>
                            <option value="<?=$obra['id']?>"><?=$obra['titulo']?></option>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>

</body>
</html>