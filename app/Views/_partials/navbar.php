<nav class="navbar navbar-expand-lg mb-3">
  <div class="container">
    <b><?=anchor("#","Biblioteca",['class' => 'navbar-brand'])?></b>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?=anchor("Aluno/index","Aluno",['class' => 'nav-link active'])?>
        </li>
        <li class="nav-item">
        <?=anchor("Autor/index","Autor",['class' => 'nav-link active'])?>
        </li>
        <li class="nav-item">
        <?=anchor("Usuario/index","Usuário",['class' => 'nav-link active'])?>
        </li>
        <li class="nav-item">
          <?=anchor("Editora/index","Editora",['class' => 'nav-link active',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Obra/index","Obra",['class' => 'nav-link active',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Livro/index","Livro",['class' => 'nav-link active', 'aria-current'=>'page',])?>
        </li>
        <li class="nav-item">
          <?=anchor("Emprestimo/index","Empréstimo",['class' => 'nav-link active', 'aria-current'=>'page',])?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if(isset($_SESSION['nome'])) {
              echo '<b>Olá, ' . $_SESSION['nome'] . '<br>';
                } else {
                  echo 'Nome não encontrado na sessão.';
                  }?>
          </a>
          <ul class="dropdown-menu"><center>
            <li> <a href="<?= base_url('login/logout') ?>" class="btn btn-dark" method="post">Sair</a></li></ri>
            </center>
          </ul>
        </li>
      
    </div>
  </div>
</nav>


