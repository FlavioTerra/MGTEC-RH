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
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $this->render('entrevista-registrar');
        }

        public function entrevistaRegistrada() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $entrevistasRegistradas = Container::getModel('EntrevistaRegistrar');

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->view->todasEntrevistasRegistradas = $entrevistasRegistradas->getAll();

            $this->render('entrevistas-registradas');
        }

        public function visualizarEntrevistaRegistrada() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $viewEntrevistasRegistradas = Container::getModel('EntrevistaRegistrar');

            $viewEntrevistasRegistradas->__set('id_entrevista', $_POST['id_entrevista']);

            $this->view->detalhesEntrevistaRegistradas = $viewEntrevistasRegistradas->getEntrevistaRegistrada(); 

            $this->render('visualizar-entrevista-registrada');
        }

        public function entrevistaCandidatoRegistrar() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $entrevista = Container::getModel('EntrevistaRegistrar');

            $entrevista->__set('id_candidato',$_POST['applpicant']);

            $entrevista->__set('est_comp',$_POST['behavioral_style']);

            $entrevista->__set('pontos_pos',$_POST['positive_points']);

            $entrevista->__set('pontos_neg',$_POST['negative_points']);

            $entrevista->save();

            header('Location:/entrevista_registrada');   
        }

        public function entrevistaRegistrada2() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('entrevista-registrar');
        }

        public function gerarRequisicaoVaga() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $this->render('gerar-requisicao-de-vaga');
        }

        public function gerarVaga() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $requisicaoVaga = Container::getModel('GerarVaga');

            $requisicaoVaga->__set('id_cargo' , $_POST['cargo']);
            $requisicaoVaga->__set('id_solicitante' , $_SESSION['id_usuario']);
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
                $requisicaoVaga->__set('id_competencia' , $_POST['comp-nome-' . $cont]);
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

            header('Location:/requisicoes_vaga');

        }

        public function alterarVagaVisualizar(){
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $alterarVaga = Container::getModel('GerarVaga');

            $alterarVaga->__set('id_vaga', $_POST['id_vaga']);

            $alterarVaga->alterStatusVaga(); 

            $viewRequisicao = Container::getModel('GerarVaga');

            $viewRequisicao->__set('id_vaga', $_POST['id_vaga']);

            $this->view->detalhesVaga = $viewRequisicao->getVaga();
            $this->view->detalhesVagaExperiencia = $viewRequisicao->getVagaExperiencia();
            $this->view->detalhesVagaCompetencia = $viewRequisicao->getVagaCompetencia();
            $this->view->detalhesVagaFormacao = $viewRequisicao->getVagaFormacao();

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $this->render('visualizar-requisicoes-de-vagas');

        }

        public function vagaAprovar(){
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $alterarVaga = Container::getModel('GerarVaga');

            $alterarVaga->__set('id_vaga', $_POST['id_vaga']);

            $alterarVaga->__set('comentario',$_POST['comentario']);

            $alterarVaga->alterStatusVagaAprovar(); 

            // header('Location:/requisicoes_vaga');

        }

        public function visualizarRequisicao() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $viewRequisicao = Container::getModel('GerarVaga');

            $viewRequisicao->__set('id_vaga', $_POST['id_vaga']);
            
            $this->view->detalhesVaga = $viewRequisicao->getVaga();
            $this->view->detalhesVagaExperiencia = $viewRequisicao->getVagaExperiencia();
            $this->view->detalhesVagaCompetencia = $viewRequisicao->getVagaCompetencia();
            $this->view->detalhesVagaFormacao = $viewRequisicao->getVagaFormacao();

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $this->render('visualizar-requisicoes-de-vagas');
        }

        public function requisicoesVagas() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $requisicoes = Container::getModel('GerarVaga');

            $this->view->todasRequisicoes = $requisicoes->getAll();

            $this->render('requisicoes-de-vagas-aprovadas-e-reprovadas');
        }

        public function gerenciarVaga() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $vagas = Container::getModel('GerarVaga');

            $this->view->todasVagas = $vagas->getAllVaga();

            $this->render('gerenciar-vaga');
        }

        public function visualizarVaga() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $viewRequisicao = Container::getModel('GerarVaga');

            $viewRequisicao->__set('id_vaga', $_POST['id_vaga']);

            $this->view->detalhesVaga = $viewRequisicao->getVagaAprovada();
            $this->view->detalhesVagaExperiencia = $viewRequisicao->getVagaExperiencia();
            $this->view->detalhesVagaCompetencia = $viewRequisicao->getVagaCompetencia();
            $this->view->detalhesVagaFormacao = $viewRequisicao->getVagaFormacao();

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $this->render('visualizar-vaga');
        }
    }   

?>