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
            $estadosCidades = Container::getModel('InformacoesGlobais');

            $this->view->estados = $estadosCidades->getEstados();
            $this->view->cidades = $estadosCidades->getCidades();

            $this->render('editar-perfil');
        }

        public function editarPerfilSalvar() {
            $perfil = Container::getModel('EditarPerfil');
        
            $perfil->__set('id_estado',$_POST['estado']);
            $perfil->__set('data_nasc',$_POST['data-de-nascimento']);
            $perfil->__set('sexo',$_POST['sexo']);
            $perfil->__set('foto',$_POST['foto']); //a
            $perfil->__set('bairro',$_POST['bairro']);
            $perfil->__set('cpf',$_POST['cpf']);
            $perfil->__set('cep',$_POST['cep']);
            $perfil->__set('telefone',$_POST['telefone']);
            $perfil->__set('celular',$_POST['celular']);
            $perfil->__set('num_casa',$_POST['numero']);
            $perfil->__set('cadastro_pessoa',$_POST['cadastro-pessoa']); 
            $perfil->__set('rua',$_POST['rua']);
            $perfil->__set('cnpj',$_POST['cnpj']);
            $perfil->__set('curriculo',$_POST['curriculo']); //a
            $perfil->__set('disponibilidade',$_POST['disponibilidade']);
            $perfil->__set('sobre',$_POST['sobre']); //a
            $perfil->__set('tipo_pessoa',$_POST['tipo_pessoa']);
            $perfil->__set('c_status',$_POST['c_status']);
            $perfil->__set('c_status',$_POST['c_status']); 
            $perfil->__set('nome', $_SESSION['nome']); 

            $idPerfil = $perfil->save();

            //****______________Requisitos do perfil _________________****//

            $perfil->__set('id_candidato', $idPerfil->id_candidato);

            // Experiencia
            $cont = 1;
            while(isset($_POST['exp-formacao-' . $cont])) {
                $perfil->__set('nome_e' , $_POST['exp-formacao-' . $cont]);
                $perfil->__set('c_status_e' , $_POST['exp-status-' . $cont]);
                $perfil->__set('anos_xp' , $_POST['exp-anos-experiencia-' . $cont]);

                $perfil->saveExperiencia();
                $cont++;
            }

            // Competencia
            $cont = 1;
            while(isset($_POST['comp-nome-' . $cont])) {
                $perfil->__set('id_competencia' , $_POST['comp-nome-' . $cont]);
                $perfil->__set('nome_c' , $_POST['comp-nome-' . $cont]);
                $perfil->__set('grau_c' , $_POST['comp-grau-' . $cont]);
                $perfil->__set('c_status_c' , $_POST['comp-status-' . $cont]);

                $perfil->saveCompetencia();
                $cont++;
            }

            // Formacao
            $cont = 1;
            while(isset($_POST['form-tipo-' . $cont])) {
                $perfil->__set('tipo' , $_POST['form-tipo-' . $cont]);
                $perfil->__set('grau_f' , $_POST['form-grau-' . $cont]);
                $perfil->__set('c_status_f' , $_POST['form-status-' . $cont]);
                $perfil->__set('curso' , $_POST['form-nome-' . $cont]);

                $perfil->saveFormacao();
                $cont++;
            }

            header('Location:/editar_perfil?editarPerfilSalvar=sucess');   
        }
    }   

?>