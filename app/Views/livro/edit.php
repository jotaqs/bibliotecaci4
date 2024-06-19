<div class="container p-5">
    <?=form_open('Emprestimo/salvar')?>
    <input value='<?=$emprestimo['id']?>'class='form-control' type="hidden" id='id' name='id'>
    <?php
        $data_inicio = $emprestimo['data_inicio'];
        $data_inicio = explode('-',$data_inicio);
        $data_inicio = mktime(0,0,0,$data_inicio[1],$data_inicio[2],$data_inicio[0]);
    ?>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_inicio">Data de Inicio:</label>
        </div>
        <div class="col-10">
            <input value="<?=$emprestimo['data_inicio']?>" class='form-control' type="date" id='data_inicio' name='data_inicio'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_fim">Data do Fim:</label>
        </div>
        <div class="col-10">
            <input value='<?=$emprestimo['data_fim']?>'class='form-control' type="date" id='data_fim' name='data_fim'>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-2">
            <label for="data_prazo">Data do Prazo:</label>
        </div>
        <div class="col-10">
            <input value='<?=$emprestimo['data_prazo']?>'class='form-control' type="date" id='data_prazo' name='data_prazo'>
        </div>
    </div>
    <div class="row p-2">
                <?php
                    foreach($listaObra as $obra){
                        $obra[$obra['id']] = $obra['titulo'];
                    }
                ?>
        <div class="col-2">
            <label for="telefone">Livro:</label>
        </div>
        <div class="col-10">
        <select class='form-select' name="id_livro" id="id_livro" required>
            <option>Selecione um Livro</option>
                <?php foreach($listaLivro as $livro) : ?>
                    <?php if($livro['disponivel'] >= 1):?>
                        <option value="<?=$livro['id']?>"><?=$obra[$livro['id_obra']]?></option>
                    <?php endif?>
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