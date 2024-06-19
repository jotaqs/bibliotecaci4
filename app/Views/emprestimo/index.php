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
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Empréstimos</h2>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novo
        </button>

        <div class="row mt-3">
        <?php foreach ($listaEmprestimo as $em) :?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= anchor("Emprestimo/editar/".$em['id'], "ID:". $em['id'])?></h5>
                <p class="card-text">Data de Início: 
                    <?= isset($em['data_inicio'])? date('d/m/Y', strtotime($em['data_inicio'])) : ''?>
                </p>
                <p class="card-text">Data de Prazo: 
                    <?= isset($em['data_prazo'])? date('d/m/Y', strtotime($em['data_prazo'])) : ''?>
                </p>
                <p class="card-text">Data do Fim: 
                    <?= isset($em['data_fim'])? date('d/m/Y', strtotime($em['data_fim'])) : ''?>
                </p>
                <p class="card-text">Livro: 
                    <?php foreach ($listaLivro as $livro) :
                        if ($livro['id'] == $em['id_livro']) {
                            echo $livro['nome'];
                            break;
                        }
                    endforeach;?>
                </p>
                <p class="card-text">Aluno: 
                    <?php foreach ($listaAluno as $aluno) :
                        if ($aluno['id'] == $em['id_aluno']) {
                            echo $aluno['nome'];
                            break;
                        }
                    endforeach;?>
                </p>
                <p class="card-text">Usuário: 
                    <?php foreach ($listaUsuario as $usuario) :
                        if ($usuario['id'] == $em['id_usuario']) {
                            echo $usuario['nome'];
                            break;
                        }
                    endforeach;?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach;?>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= form_open("Emprestimo/cadastrar") ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Empréstimo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="data_inicio">Data de Início:</label>
                            <input class="form-control" type="date" id="data_inicio" name="data_inicio" required onchange="calculateEndDate()">
                        </div>
                        <div class="form-group">
                            <label for="prazo">Prazo:</label>
                            <select class="form-select" name="prazo" id="prazo" required onchange="calculateEndDate()">
                                <option value="15">15 dias</option>
                                <option value="30">30 dias</option>
                                <option value="60">60 dias</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_livro">Livro:</label>
                            <select class="form-select" name="id_livro" id="id_livro" required>
                                <option disabled selected>Selecione um Livro</option>
                                <?php foreach ($listaLivro as $livro) : ?>
                                    <?php if ($livro['disponivel'] >= 1) : ?>
                                        <option value="<?= $livro['id'] ?>"><?= $livro['nome'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_aluno">Aluno:</label>
                            <select class="form-select" name="id_aluno" id="id_aluno" required>
                                <option disabled selected>Selecione um Aluno</option>
                                <?php foreach ($listaAluno as $aluno) : ?>
                                    <option value="<?= $aluno['id'] ?>"><?= $aluno['nome'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                    <label for="telefone">Usuario:</label>
                    <select class='form-select' name="id_usuario" id="id_usuario" required>
                        <?php foreach($listaUsuario as $usuario) : ?>
                        <option value="<?=$usuario['id']?>"><?=$usuario['nome']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                        <div class="form-group">
                            <label for="data_prazo">Data de Término (Prazo):</label>
                            <input class="form-control" type="date" id="data_prazo" name="data_prazo" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-dark">Cadastrar</button>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

    <script>
        function calculateEndDate() {
            var dataInicio = document.getElementById('data_inicio').value;
            var prazo = document.getElementById('prazo').value;
            
            if (dataInicio && prazo) {
                var dataInicioObj = new Date(dataInicio);
                var dataFimObj = new Date(dataInicioObj.getTime() + prazo * 24 * 60 * 60 * 1000); // Calcula a data de término em milissegundos
                var dataFimFormatted = dataFimObj.toISOString().split('T')[0]; // Formata para o formato yyyy-mm-dd

                document.getElementById('data_prazo').value = dataFimFormatted;
            }
        }
    </script>
</body>
</html>
