<?php 

    namespace App\Controllers;
    use App\Models\RelacaoContratos;
    use App\Helpers\RenderHTML;

    class HomeController
    {

        public $view;

        public function __construct(){
            $this->view = new RenderHTML();

        }

        public function index(){
          $relacaoContratos = new RelacaoContratos(); 
          
          $relacao = $relacaoContratos->allContracts();
            
          echo $this->view->renderHtml('home.php', ['relacao' => $relacao]);

         } 

    }