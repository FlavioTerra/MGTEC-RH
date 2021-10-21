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

            $routes['entrevista'] = array(
                'route'=>'/entrevista',
                'controller'=>'employeeScreensController',
                'action'=>'entrevista'
            );

            $routes['entrevista_registrar'] = array(
                'route'=>'/entrevista_registrar',
                'controller'=>'employeeScreensController',
                'action'=>'entrevistaRegistrar'
            );


            $this->setRoutes($routes);
        }    
    }

?>