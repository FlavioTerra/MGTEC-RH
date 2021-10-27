<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\DepartamentosCargos;

    class CandidateScreensController extends Action {
        public function index() {  

        }

        public function editarPerfil() {
            $this->render('editar-perfil');
        }

        public function editarPerfilSalvar() {
            $entrevista = Container::getModel('EditarPerfil');

            $entrevista->__set('id_candidato',$_POST['applpicant']);

            $entrevista->save();

            header('Location:/editar_perfil?editarPerfilSalvar=sucess');   
        }

    }   

?>