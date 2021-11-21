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
            // exp-fomacao-1  exp-status-1  exp-anos-experiencia-1 
            // comp-nome-1  comp-grau-1  comp-status-1
            // form-tipo-1  form-status-1  form-nome-1  form-grau-1

            // falta os tres ai de cima
        
            $entrevista->__set('id_estado',$_POST['estado']);
            $entrevista->__set('data_nasc',$_POST['data-de-nascimento']);
            $entrevista->__set('sexo',$_POST['sexo']);
            $entrevista->__set('foto',$_POST['foto']); //a
            $entrevista->__set('bairro',$_POST['bairro']);
            $entrevista->__set('cpf',$_POST['cpf']);
            $entrevista->__set('cep',$_POST['cep']);
            $entrevista->__set('telefone',$_POST['telefone']);
            $entrevista->__set('celular',$_POST['celular']);
            $entrevista->__set('num_casa',$_POST['numero']);
            $entrevista->__set('cadastro_pessoa',$_POST['cadastro-pessoa']); 
            $entrevista->__set('rua',$_POST['rua']);
            $entrevista->__set('cnpj',$_POST['cnpj']);
            $entrevista->__set('curriculo',$_POST['curriculo']); //a
            $entrevista->__set('disponibilidade',$_POST['disponibilidade']);
            $entrevista->__set('sobre',$_POST['sobre']); //a
            $entrevista->__set('tipo_pessoa',$_POST['tipo_pessoa']);
            $entrevista->__set('c_status',$_POST['c_status']); 

            $entrevista->save();

            header('Location:/editar_perfil?editarPerfilSalvar=sucess');   
        }

    }   

?>