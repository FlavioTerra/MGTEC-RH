<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\Produto;
    use App\Models\Info;
 

    class IndexController extends Action {
        public function index() {
            
        }

        public function ProcessoSeletivo() {
            $this->render('processo-seletivo');
        }
    }   

?>