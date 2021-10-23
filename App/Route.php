<?php

    namespace App;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
        
        protected function initRoutes() {
            $routes['home'] = array(
                'route'=>'/',
                'controller'=>'employeeScreensController',
                'action'=>'index'
            );

            $routes['processo_seletivo'] = array(
                'route'=>'/processo_seletivo',
                'controller'=>'employeeScreensController',
                'action'=>'processoSeletivo'
            );

            $routes['processo_seletivo_cadastrar'] = array(
                'route'=>'/processo_seletivo_cadastrar',
                'controller'=>'employeeScreensController',
                'action'=>'processoSeletivoCadastrar'
            );

            $routes['entrevista_registrar'] = array(
                'route'=>'/entrevista_registrar',
                'controller'=>'employeeScreensController',
                'action'=>'entrevistaRegistrar'
            );

            $routes['entrevista_candidato_registrar'] = array(
                'route'=>'/entrevista_candidato_registrar',
                'controller'=>'employeeScreensController',
                'action'=>'entrevistaCandidatoRegistrar'
            );

            $routes['entrevista_marcar'] = array(
                'route'=>'/entrevista_marcar',
                'controller'=>'employeeScreensController',
                'action'=>'entrevistaMarcar'
            );

            $routes['entrevista_candidato_marcar'] = array(
                'route'=>'/entrevista_candidato_marcar',
                'controller'=>'employeeScreensController',
                'action'=>'entrevistaCandidatoMarcar'
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

            // Teste
            $routes['atribuir_teste'] = array(
                'route'=>'/atribuir_teste',
                'controller'=>'employeeScreensController',
                'action'=>'atribuirTeste'
            );

            $routes['cadastrar_teste'] = array(
                'route'=>'/cadastrar_teste',
                'controller'=>'employeeScreensController',
                'action'=>'cadastrarTeste'
            );

            $this->setRoutes($routes);
        }    
    }

?>