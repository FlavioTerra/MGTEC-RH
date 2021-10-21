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


            $this->setRoutes($routes);
        }    
    }

?>