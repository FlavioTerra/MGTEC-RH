<?php

    namespace App;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
        
        protected function initRoutes() {
            $routes['/'] = array(
                'route'=>'/',
                'controller'=>'GeneralScreensController',
                'action'=>'index'
            );

            $routes['home'] = array(
                'route'=>'/home',
                'controller'=>'GeneralScreensController',
                'action'=>'index'
            );
            

            // Cadastrar Processo Seletivo
            $routes['processo_seletivo'] = array(
                'route'=>'/processo_seletivo',
                'controller'=>'EmployeeScreensController',
                'action'=>'processoSeletivo'
            );

            $routes['processo_seletivo_cadastrar'] = array(
                'route'=>'/processo_seletivo_cadastrar',
                'controller'=>'EmployeeScreensController',
                'action'=>'processoSeletivoCadastrar'
            );

            $routes['gerenciar_processo_seletivo'] = array(
                'route'=>'/gerenciar_processo_seletivo',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerenciarProcessoSeletivo'
            );

            $routes['visualizar_processo_seletivo'] = array(
                'route'=>'/visualizar_processo_seletivo',
                'controller'=>'EmployeeScreensController',
                'action'=>'visualizarProcessoSeletivo'
            );


            //Registrar Entrevista
            $routes['entrevista_registrar'] = array(
                'route'=>'/entrevista_registrar',
                'controller'=>'ManagerScreensController',
                'action'=>'entrevistaRegistrar'
            );

            $routes['entrevista_candidato_registrar'] = array(
                'route'=>'/entrevista_candidato_registrar',
                'controller'=>'ManagerScreensController',
                'action'=>'entrevistaCandidatoRegistrar'
            );

            $routes['entrevista_registrada'] = array(
                'route'=>'/entrevista_registrada',
                'controller'=>'ManagerScreensController',
                'action'=>'entrevistaRegistrada'
            );

            $routes['visualizar_entrevista_registrada'] = array(
                'route'=>'/visualizar_entrevista_registrada',
                'controller'=>'ManagerScreensController',
                'action'=>'visualizarEntrevistaRegistrada'
            );


            // Marcar Entrevista
            $routes['entrevista_marcar'] = array(
                'route'=>'/entrevista_marcar',
                'controller'=>'EmployeeScreensController',
                'action'=>'entrevistaMarcar'
            );

            $routes['entrevista_candidato_marcar'] = array(
                'route'=>'/entrevista_candidato_marcar',
                'controller'=>'EmployeeScreensController',
                'action'=>'entrevistaCandidatoMarcar'
            );

            $routes['gerenciar_entrevista_candidato'] = array(
                'route'=>'/gerenciar_entrevista_candidato',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerenciarEntrevistaCandidato'
            );

            $routes['visualizar_entrevista_candidato'] = array(
                'route'=>'/visualizar_entrevista_candidato',
                'controller'=>'EmployeeScreensController',
                'action'=>'visualizarEntrevistaCandidato'
            );

            // Requisição de Vaga
            $routes['gerar_requisicao_vaga'] = array(
                'route'=>'/gerar_requisicao_vaga',
                'controller'=>'ManagerScreensController',
                'action'=>'gerarRequisicaoVaga'
            );

            $routes['gerar_vaga'] = array(
                'route'=>'/gerar_vaga',
                'controller'=>'ManagerScreensController',
                'action'=>'gerarVaga'
            );

            $routes['visualizar_requisicao'] = array(
                'route'=>'/visualizar_requisicao',
                'controller'=>'ManagerScreensController',
                'action'=>'visualizarRequisicao'
            );

            $routes['requisicoes_vaga'] = array(
                'route'=>'/requisicoes_vaga',
                'controller'=>'ManagerScreensController',
                'action'=>'requisicoesVagas'
            );

            $routes['gerenciar_vaga'] = array(
                'route'=>'/gerenciar_vaga',
                'controller'=>'ManagerScreensController',
                'action'=>'gerenciarVaga'
            );

            $routes['visualizar_vaga'] = array(
                'route'=>'/visualizar_vaga',
                'controller'=>'ManagerScreensController',
                'action'=>'visualizarVaga'
            );

            $routes['vaga_aprovar'] = array(
                'route'=>'/vaga_aprovar',
                'controller'=>'ManagerScreensController',
                'action'=>'vagaAprovar'
            );

            $routes['alterar_vaga_visualizar'] = array(
                'route'=>'/alterar_vaga_visualizar',
                'controller'=>'ManagerScreensController',
                'action'=>'alterarVagaVisualizar'
            );

            // Teste
            $routes['atribuir_teste'] = array(
                'route'=>'/atribuir_teste',
                'controller'=>'EmployeeScreensController',
                'action'=>'atribuirTeste'
            );

            $routes['cadastrar_teste'] = array(
                'route'=>'/cadastrar_teste',
                'controller'=>'EmployeeScreensController',
                'action'=>'cadastrarTeste'
            );

            $routes['realizar_teste'] = array(
                'route'=>'/realizar_teste',
                'controller'=>'CandidateScreensController',
                'action'=>'renderizaTeste'
            );

            // Perfil Candidato
            $routes['editar_perfil'] = array(
                'route'=>'/editar_perfil',
                'controller'=>'CandidateScreensController',
                'action'=>'editarPerfil'
            );

            $routes['editar_perfil_salvar'] = array(
                'route'=>'/editar_perfil_salvar',
                'controller'=>'CandidateScreensController',
                'action'=>'editarPerfilSalvar'
            );

            $routes['perfil_ver'] = array(
                'route'=>'/perfil_ver',
                'controller'=>'CandidateScreensController',
                'action'=>'perfilVer'
            );

            $routes['vaga_candidatada_ver'] = array(
                'route'=>'/vaga_candidatada_ver',
                'controller'=>'CandidateScreensController',
                'action'=>'vagaCandidatadaVer'
            );

            $routes['realizar_teste'] = array(
                'route'=>'/realizar_teste',
                'controller'=>'CandidateScreensController',
                'action'=>'realizarTeste'
            );


            // Cadastro Usuário
            $routes['usuario_cadastrar'] = array(
                'route'=>'/usuario_cadastrar',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioCadastrar'
            );

            $routes['usuario_cadastrar_salvar'] = array(
                'route'=>'/usuario_cadastrar_salvar',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioCadastrarSalvar'
            );

            // Controle Usuário
            $routes['usuario_entrar'] = array(
                'route'=>'/usuario_entrar',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioEntrar'
            );

            $routes['usuario_logar'] = array(
                'route'=>'/usuario_logar',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioLogar'
            );

            $routes['usuario_entrar_validar'] = array(
                'route'=>'/usuario_entrar_validar',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioEntrarValidar'
            );

            $routes['usuario_sair'] = array(
                'route'=>'/usuario_sair',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioSair'
            );

            $routes['exibir_popup'] = array(
                'route'=>'/exibir_popup',
                'controller'=>'GeneralScreensController',
                'action'=>'exibirPopup'
            );

            $routes['usuario_recuperar_senha'] = array(
                'route'=>'/usuario_recuperar_senha',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioRecuperarSenha'
            );

            $routes['usuario_recuperar_senha_codigo'] = array(
                'route'=>'/usuario_recuperar_senha_codigo',
                'controller'=>'GeneralScreensController',
                'action'=>'usuarioRecuperarSenhaCodigo'
            );

            // Relatórios
            $routes['gerar_relatorio'] = array(
                'route'=>'/gerar_relatorio',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerarRelatorio'
            );

            $routes['gerar_relatorio_indicadores_desempenho'] = array(
                'route'=>'/gerar_relatorio_indicadores_desempenho',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerarRelatorioIndicadoresDesempenho'
            );

            $routes['gerar_relatorio_quadro_vagas'] = array(
                'route'=>'/gerar_relatorio_quadro_vagas',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerarRelatorioQuadroVagas'
            );

            $routes['gerar_relatorio_recrutamento_selecao'] = array(
                'route'=>'/gerar_relatorio_recrutamento_selecao',
                'controller'=>'EmployeeScreensController',
                'action'=>'gerarRelatorioRecrutamentoSelecao'
            );

            $routes['gerenciar_candidato'] = array(
                'route'=>'/gerenciar_candidato',
                'controller'=>'GeneralScreensController',
                'action'=>'gerenciarCandidato'
            );

            $this->setRoutes($routes);
        }    
    }

?>