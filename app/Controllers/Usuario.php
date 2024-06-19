<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuarioModel;

class Usuario extends BaseController{
    private $usuarioModel;
    protected $session;
    
    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $dados = $this->usuarioModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('usuario/index.php',['listaUsuarios' => $dados]);
        echo view('_partials/footer');

        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function cadastrar(){
        $usuario = $this->request->getPost();
        $usuario['senha']= md5("senhaforte");
        $this->usuarioModel->save($usuario);
        return redirect()->to('Usuario/index');
    }
    
    public function editar($id){
        $dados = $this->usuarioModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('usuario/edit',['usuario' => $dados]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $usuario = $this->request->getPost();
        $this->usuarioModel->save($usuario);
        return redirect()->to('Usuario/index');
    }

    public function excluir(){
        $usuario = $this->request->getPost();
        $this->usuarioModel->delete($usuario);
        return redirect()->to('Usuario/index');
    }


}
