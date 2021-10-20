<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\Produto;
    use App\Models\Info;
 

    class EmployeeScreensController extends Action {
        public function index() {
            echo 'teste';
        }

        public function processoSeletivo() {
            $this->render('processo-seletivo');
        }
    }   

?>