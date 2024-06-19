<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EditoraModel;

class Editora extends BaseController
{
    private $editoraModel;
    protected $session;
    
    public function __construct(){
        $this->editoraModel = new EditoraModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $dados = $this->editoraModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('editora/index.php',['listaEditora' => $dados]);
        echo view('_partials/footer');
        
        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function cadastrar(){
        $editora = $this->request->getPost();
        $editora['senha']= md5("senhaforte");
        $this->editoraModel->save($editora);
        return redirect()->to('Editora/index');
    }
    
    public function editar($id){
        $dados = $this->editoraModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('editora/edit',['editora' => $dados]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $editora = $this->request->getPost();
        $this->editoraModel->save($editora);
        return redirect()->to('Editora/index');
    }

    public function excluir(){
        $editora = $this->request->getPost();
        $this->editoraModel->delete($editora);
        return redirect()->to('Editora/index');
    }
}
