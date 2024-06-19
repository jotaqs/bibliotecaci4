<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmprestimoModel;
use App\Models\LivroModel;
use App\Models\AlunoModel;
use App\Models\UsuarioModel;
use App\Models\ObraModel;

class Emprestimo extends BaseController
{
    private $emprestimoModel;
    private $livroModel;
    private $alunoModel;
    private $usuarioModel;
    private $obraModel;
    protected $session;
    
    public function __construct(){
        $this->emprestimoModel = new EmprestimoModel();
        $this->livroModel = new LivroModel();
        $this->alunoModel = new AlunoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->session = \Config\Services::session();
    }   
    public function index(){
        $emprestimo = $this->emprestimoModel->findAll();
        $livro = $this->livroModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        $nome = $this->session->get('nome');
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/index.php',['listaEmprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario,'usuarioLogado' => $this->session->get('nome') ]);
        echo view('_partials/footer');

        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function cadastrar(){
        $emprestimo = $this->request->getPost();
        $this->emprestimoModel->save($emprestimo);
        return redirect()->to('Emprestimo/index');
    }
    
    public function editar($id){
        $emprestimo = $this->emprestimoModel->find($id);
        $livro = $this->livroModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/edit',['emprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $emprestimo = $this->request->getPost();
        $this->emprestimoModel->save($emprestimo);
        return redirect()->to('Emprestimo/index');
    }

    public function excluir(){
        $emprestimo = $this->request->getPost();
        $this->emprestimoModel->delete($emprestimo);
        return redirect()->to('Emprestimo/index');
    }

    public function devolucao($id){
        $emprestimo = $this->emprestimoModel->find($id);
        $livro = $this->livroModel->find($emprestimo['id_livro']); // Busca o livro associado ao empréstimo
    
        // Verifica se o livro foi encontrado
        if (!$livro) {
            // Lida com o caso em que o livro não foi encontrado
            // Pode redirecionar, mostrar mensagem de erro, etc.
            return redirect()->to(base_url('Emprestimo/index'))->with('error', 'Livro não encontrado.');
        }
    
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('devolucao/index.php', [
            'emprestimo' => $emprestimo,
            'livro' => $livro // Passa apenas o livro associado ao empréstimo
        ]);
        echo view('_partials/footer');
    }
    
    
}