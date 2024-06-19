<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ObraModel;
use App\Models\EditoraModel;
use App\Models\AutorModel;
use App\Models\AutorObraModel;

class Obra extends BaseController
{
    private $obraModel;
    private $editoraModel;
    private $autorModel;
    private $autorObraModel;
    protected $session;
    
    public function __construct(){
        $this->editoraModel = new EditoraModel();
        $this->obraModel = new ObraModel();
        $this->autorModel = new AutorModel();
        $this->autorObraModel = new AutorObraModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $obra = $this->obraModel->findAll();
        $editora = $this->editoraModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('obra/index.php',['listaObra'=>$obra,'listaEditora'=>$editora]);
        echo view('_partials/footer');

        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function cadastrar(){
        $obra = $this->request->getPost();
        $this->obraModel->save($obra);
        return redirect()->to('Obra/index');
    }
    
    public function editar($id){
        $obra = $this->obraModel->find($id);
        $autor = $this->autorModel->findAll();
        $editora = $this->editoraModel->findAll();
        $dadosAutorObra = $this->autorObraModel->findAll();
        
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('obra/edit',['obra' => $obra,'listaAutor' => $autor,'listaEditora' => $editora,'listaAutorObra' => $dadosAutorObra]);
        echo view('_partials/footer');
    }

    public function adicionarAutor(){
        $this->autorObraModel->save(
            $this->request->getPost()
        );
        return redirect()->to(
            'Obra/editar/'.$this->request->getPost('id_obra')
        );
    }

    public function salvar(){
        $obra = $this->request->getPost();
        $this->obraModel->save($obra);
        return redirect()->to('Obra/index');
    }

    public function excluir(){
        $obra = $this->request->getPost();
        $this->obraModel->delete($obra);
        return redirect()->to('Obra/index');
    }


}
