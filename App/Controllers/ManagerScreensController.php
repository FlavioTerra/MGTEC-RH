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

        public function registrarEntrevista() {
            $this->render('registrar-entrevista');
        }

        public function registrarEntrevistaCadastrar() {
            $entrevista = Container::getModel('EntrevistaRegistrar');

            $entrevista->__set('id_candidato',$_POST['applpicant']);

            // $entrevista->__set('id_entrevista',$_POST['role']); role é o processo seletivo e não o id da entrevista

            $entrevista->__set('est_comp',$_POST['behavioral_style']);

            $entrevista->__set('pontos_pos',$_POST['positive_points']);

            $entrevista->__set('pontos_neg',$_POST['negative_points']);

            $entrevista->save();

            header('Location:/registrar_entrevista?entrevistaRegistrar=sucess');   
        }
    }   

?>