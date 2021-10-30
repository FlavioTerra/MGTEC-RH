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
            // id_candidato  id_proc  id_estado  nome  data_nasc  sexo  bairro  cep  num_casa  rua  cadastro_pessoa  disponibilidade  telefone  celular  sobre  tipo_pessoa  curriculo  c_status

            $entrevista->__set('id_candidato',$_POST['applpicant']);

            $entrevista->save();

            header('Location:/editar_perfil?editarPerfilSalvar=sucess');   
        }

    }   

?>