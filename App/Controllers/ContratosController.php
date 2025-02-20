<?php

namespace App\Controllers;

use App\Models\RelacaoContratos;
use App\Helpers\RenderHTML;
use App\Models\Contrato;
use App\Models\ConvenioServico;

class ContratosController
{
    public $view;
    public function __construct()
    {
        $this->view = new RenderHTML();
    }

    public function create()
    {
        $conveniosContratos = ConvenioServico::all();

        echo $this->view->renderHtml('contratos/create.php', [
            'conveniosContratos' => $conveniosContratos
        ]);
    }

    public function store()
    {
        $dados = $_POST;
        $dados['data_inclusao'] = date('Y-m-d H:i:s');

        $contrato = new Contrato();
        $contrato->setValor($dados['valor']);
        $contrato->setPrazo($dados['prazo']);
        $contrato->setConvenioServico($dados['convenio_servico']);
        $contrato->setDataInclusao($dados['data_inclusao']);
        $contrato->save();

        header('Location: ' . APP_URL . '');
    }
}
