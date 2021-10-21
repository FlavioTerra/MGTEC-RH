<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\Produto;
    use App\Models\Info;
 

    class EmployeeScreensController extends Action {
        public function index() {  
        }

        public function processoSeletivo() {
            $this->render('processo-seletivo');
        }

        public function processoSeletivoCadastrar() {
            $processoSeletivo = Container::getModel('ProcessoSeletivo');
            
            $processoSeletivo->__set('titulo_proc',$_POST['tituloProcSeletivo']);

            $processoSeletivo->__set('id_responsavel',$_POST['responsible']);

            $processoSeletivo->__set('data_inicio', $_POST['start_date']);

            $processoSeletivo->__set('data_termino', $_POST['end_date']);
            
            $processoSeletivo->__set('regra_class',$_POST['classification-rule']);

            $processoSeletivo->__set('descricao',$_POST['descProc']);

            $processoSeletivo->save();

            header('Location:/processo_seletivo?cadastroProcSeletivo=sucess');   
        }
    }   

?>