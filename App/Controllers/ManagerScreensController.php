<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\DepartamentosCargos;

    class ManagerScreensController extends Action {
        public function index() {  

        }

        public function entrevistaRegistrar() {
            $this->render('entrevista-registrar');
        }

        public function entrevistaRegistrada() {
            $entrevistasRegistradas = Container::getModel('EntrevistaRegistrar');

            $this->view->todasEntrevistasRegistradas = $entrevistasRegistradas->getAll();

            $this->render('entrevistas-registradas');
        }

        public function visualizarEntrevistaRegistrada() {
            $this->render('visualizar-entrevista-registrada');
        }

        public function entrevistaCandidatoRegistrar() {
            $entrevista = Container::getModel('EntrevistaRegistrar');

            $entrevista->__set('id_candidato',$_POST['applpicant']);

            $entrevista->__set('est_comp',$_POST['behavioral_style']);

            $entrevista->__set('pontos_pos',$_POST['positive_points']);

            $entrevista->__set('pontos_neg',$_POST['negative_points']);

            $entrevista->save();

            header('Location:/entrevista_registrar?entrevistaRegistrar=sucess');   
        }

        public function gerarRequisicaoVaga() {

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $this->render('gerar-requisicao-de-vaga');
        }

        public function gerarVaga() {
            $requisicaoVaga = Container::getModel('GerarVaga');

            // echo '<pre>';
            //     print_r($_POST);
            // echo '<pre>';

            $requisicaoVaga->__set('id_cargo' , $_POST['cargo']);
            //$requisicaoVaga->__set('id_solicitante' , $_POST['id_solicitante']);
            $requisicaoVaga->__set('titulo_vaga' , $_POST['titulo_vaga']);
            $requisicaoVaga->__set('num_vagas' , $_POST['numero_vagas']);
            $requisicaoVaga->__set('vinculo_emp' , $_POST['vinculo_empregaticio']);
            $requisicaoVaga->__set('data_solic' , $_POST['data_solicitacao']);
            $requisicaoVaga->__set('salario' , $_POST['salario']);
            $requisicaoVaga->__set('funcao' , $_POST['funcao']);
            $requisicaoVaga->__set('hora_inicio' , $_POST['hora_trab_inicio']);
            $requisicaoVaga->__set('hora_fim' , $_POST['hora_trab_fim']);
            
            $idVaga = $requisicaoVaga->save();

            //****______________Requisitos da Vaga_________________****//

            $requisicaoVaga->__set('id_vaga', $idVaga->id_vaga);

            // Experiencia
            $cont = 1;
            while(isset($_POST['exp-formacao-' . $cont])) {
                $requisicaoVaga->__set('nome_e' , $_POST['exp-formacao-' . $cont]);
                $requisicaoVaga->__set('r_status_e' , $_POST['exp-status-' . $cont]);
                $requisicaoVaga->__set('anos_xp' , $_POST['exp-anos-experiencia-' . $cont]);

                $requisicaoVaga->saveExperiencia();
                $cont++;
            }

            // Competencia
            $cont = 1;
            while(isset($_POST['comp-nome-' . $cont])) {
                $requisicaoVaga->__set('nome_c' , $_POST['comp-nome-' . $cont]);
                $requisicaoVaga->__set('grau_c' , $_POST['comp-grau-' . $cont]);
                $requisicaoVaga->__set('r_status_c' , $_POST['comp-status-' . $cont]);

                $requisicaoVaga->saveCompetencia();
                $cont++;
            }

            // Formacao
            $cont = 1;
            while(isset($_POST['form-tipo-' . $cont])) {
                $requisicaoVaga->__set('tipo' , $_POST['form-tipo-' . $cont]);
                $requisicaoVaga->__set('grau_f' , $_POST['form-grau-' . $cont]);
                $requisicaoVaga->__set('r_status_f' , $_POST['form-status-' . $cont]);
                $requisicaoVaga->__set('curso' , $_POST['form-nome-' . $cont]);

                $requisicaoVaga->saveFormacao();
                $cont++;
            }

            header('Location:/gerar_requisicao_vaga');
        }

        public function visualizarRequisicao() {
            $viewRequisicao = Container::getModel('GerarVaga');

            $viewRequisicao->__set('id_vaga', $_POST['id_vaga']);

            $this->view->detalhesVaga = $viewRequisicao->getVaga();

            $this->render('visualizar-requisicoes-de-vagas');
        }

        public function requisicoesVagas() {
            $requisicoes = Container::getModel('GerarVaga');

            $this->view->todasRequisicoes = $requisicoes->getAll();

            $this->render('requisicoes-de-vagas-aprovadas-e-reprovadas');
        }
    }   

?>