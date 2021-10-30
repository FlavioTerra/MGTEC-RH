<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models

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

        public function entrevistaMarcar() {
            $this->render('entrevista-marcar');
        }

        public function entrevistaCandidatoMarcar() {
            $entrevista = Container::getModel('EntrevistaMarcar');
   
            $entrevista->__set('titulo_entrevista',$_POST['titulo']);

            $entrevista->__set('descricao',$_POST['desc']);

            $entrevista->__set('id_user',$_POST['nome-candidato']);

            $entrevista->__set('responsavel',$_POST['resp']);

            $entrevista->__set('data_entrevista',$_POST['date']);

            $entrevista->__set('hora_entrevista',$_POST['hora']);

            $entrevista->save();

            header('Location:/entrevista_marcar?entrevistaMarcar=sucess');   
        }

        public function atribuirTeste() {

            $this->render('atribuir-teste');
        }

        public function cadastrarTeste() {
            $entrevista = Container::getModel('AtribuirTeste');

            echo '<pre>';
                print_r($_POST);
            echo '<pre>';
        }
    }   

?>