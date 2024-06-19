<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Home extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Verificar se o usuário está logado
        if ($this->session->has('logged_in')) {
            $data['nome'] = $this->session->get('nome');
            return view('Home/index', $data);
            echo view('_partials/header');
            echo view('home/index.php');
            echo view('_partials/footer');
        } else {
            return redirect()->to(base_url('login'));
        }

    }
}
