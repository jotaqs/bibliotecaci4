<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AlunoModel;

class Aluno extends BaseController{   
    private $alunoModel;
    protected $session;
    
    public function __construct(){
        $this->alunoModel = new AlunoModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $dados = $this->alunoModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/index.php',['listaAlunos' => $dados]);
        echo view('_partials/footer');


        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
            $nome = $this->session->get('nome');
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function cadastrar(){
        $aluno = $this->request->getPost();
        $aluno['senha']= md5("senhaforte");
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function editar($id){
        $dados = $this->alunoModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/edit',['aluno' => $dados]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $aluno = $this->request->getPost();
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function excluir(){
        $aluno = $this->request->getPost();
        $this->alunoModel->delete($aluno);
        return redirect()->to('Aluno/index');
    }

}
