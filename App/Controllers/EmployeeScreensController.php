<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use App\Models\DepartamentosCargos;

    class EmployeeScreensController extends Action {
        public function index() {  
        }

        public function processoSeletivo() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $vagas = Container::getModel('InformacoesGlobais');
            $this->view->vagasAbertasProc = $vagas->getAllVagasAbertas();

            $this->render('processo-seletivo');
        }

        public function visualizarProcessoSeletivo() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $viewProcessoSeletivo = Container::getModel('ProcessoSeletivo');

            $viewProcessoSeletivo->__set('id_proc', $_POST['id_proc']);

            $this->view->detalhesProcessoSeletivo = $viewProcessoSeletivo->getProcessoSeletivo(); 

            $this->render('visualizar-processo-seletivo');
        }

        public function gerenciarProcessoSeletivo() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $processosSeletivos = Container::getModel('ProcessoSeletivo');

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->view->todosProcessoSeletivos = $processosSeletivos->getAll();
            
            $this->render('gerenciar-processo-seletivo');
        }

        public function processoSeletivoCadastrar() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $processoSeletivo = Container::getModel('ProcessoSeletivo');
            
            $processoSeletivo->__set('titulo_proc',$_POST['tituloProcSeletivo']);

            $processoSeletivo->__set('id_responsavel',$_POST['responsible']);

            $processoSeletivo->__set('data_inicio', $_POST['start_date']);

            $processoSeletivo->__set('data_termino', $_POST['end_date']);
            
            $processoSeletivo->__set('regra_class',$_POST['classification-rule']);

            $processoSeletivo->__set('descricao',$_POST['descProc']);

            $processoSeletivo->__set('id_vaga',$_POST['vacancy']);

            $processoSeletivo->save();

            header('Location:/gerenciar_processo_seletivo');   
        }

        // Marcar Entrevista
        public function entrevistaMarcar() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $this->render('entrevista-marcar');
        }

        public function entrevistaCandidatoMarcar() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $entrevista = Container::getModel('EntrevistaMarcar');
   
            $entrevista->__set('titulo_entrevista',$_POST['titulo']);

            $entrevista->__set('descricao',$_POST['desc']);

            $entrevista->__set('id_user',$_POST['nome-candidato']);

            $entrevista->__set('responsavel',$_POST['resp']);

            $entrevista->__set('data_entrevista',$_POST['date']);

            $entrevista->__set('hora_entrevista',$_POST['hora']);

            $entrevista->save();

            header('Location:/gerenciar_entrevista_candidato');   
        }

        public function visualizarEntrevistaCandidato() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $viewEntrevistasCandidato = Container::getModel('EntrevistaMarcar');

            $viewEntrevistasCandidato->__set('id_entrevista', $_POST['id_entrevista']);

            $this->view->detalhesEntrevistaCandidato = $viewEntrevistasCandidato->getEntrevistaCandidato(); 

            $this->render('visualizar-entrevista');
        }

        public function gerenciarEntrevistaCandidato() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $entrevistasCandidato = Container::getModel('EntrevistaMarcar');

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->view->todasEntrevistasCandidato = $entrevistasCandidato->getAll();
            
            $this->render('gerenciar-entrevista');
        }

        public function entrevistaCandidato() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('entrevista-marcar');
        }


        // Teste

        public function cadastrarTeste() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $teste = Container::getModel('AtribuirTeste');

            $teste->__set('id_proc', 1); //<- Ver como pegar o id do processo seletivo
            $teste->__set('tipo_teste', $_POST['test_Title']);
            $teste->__set('descricao', $_POST['description']);

            $idTeste = $teste->saveTeste();
            
            $cont = 1;
            while(isset($_POST['question_title_' . $cont])) {
                $teste->__set('Pergunta', $_POST['question_title_' . $cont]);
                $teste->__set('id_teste', $idTeste->id_teste);
                
                for($cont2 = 1; $cont2 < 5; $cont2++) {
                    if(isset($_POST['check_quest_' . $cont . '_answer_' . $cont2])) {
                        $teste->__set('resposta_certa', $_POST['quest_' . $cont . '_answer_' . $cont2]);
                        break;
                    }
                }
                
                $cont3 = 1;
                $auxiliar = 1;
                while($cont3 < 5 ) {
                    if($cont3 != $cont2) {
                        $teste->__set('resposta_er' . $auxiliar, $_POST['quest_' . $cont . '_answer_' . $cont3]);
                        $auxiliar++;
                    }
                    $cont3++;
                }
                $cont++;
                $teste->savePerguntas();

                header('Location:/atribuir_teste?atribuir_teste=sucess');   
            }
        }

        public function gerarEntrevistaCandidato() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('entrevista-marcar');
        }

        // Atribuir Teste
        public function atribuirTeste() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $this->render('atribuir-teste');
        }


        // Relatórios
        public function gerarRelatorio() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $this->render('gerar-relatorio');
        }
        
        public function gerarRelatorioIndicadoresDesempenho() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $this->render('relatorio-indicadores-desempenho');
        }

        public function gerarRelatorioQuadroVagas() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $this->render('relatorio-quadro-de-vagas');
        }

        public function gerarRelatorioRecrutamentoSelecao() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }

            $this->render('relatorio-recrutamento-selecao');
        }

        public function gerenciarVaga() {
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
            $entrevistasCandidato = Container::getModel('GerarVaga');

            $departametos = Container::getModel('InformacoesGlobais');
            $this->view->departamentos = $departametos->getDepartamentos();

            $cargos = Container::getModel('InformacoesGlobais');
            $this->view->cargos = $cargos->getCargos();

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->view->todasVagas = $vagas->getAll();

            $this->render('gerenciar-vaga');
        }

        public function gerenciarCandidato() {
            $candidatos = Container::getModel('UsuarioCadastrar');

            $this->view->todosCandidatos = $candidatos->getAllCandidatos();

            $this->render('gerenciar-candidato');
        }
        
        public function divulgarProcessoSeletivo(){
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 0;
            }
        

            $viewProcessoSeletivo = Container::getModel('ProcessoSeletivo');

            $viewProcessoSeletivo->__set('id_proc', $_POST['id_proc']);

            // var_dump($_POST);

            $this->view->detalhesProcessoSeletivo = $viewProcessoSeletivo->alterarStatusProcessoSeletivo();

            $this->view->detalhesProcessoSeletivo = $viewProcessoSeletivo->getProcessoSeletivo(); 

            $this->render('divulgar-processo-seletivo'); 
        }

    }   

?>