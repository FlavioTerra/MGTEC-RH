<?php

    namespace App;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
        
        protected function initRoutes() {
            $routes['home']=array(
                'route'=>'/',
                'controller'=>'indexController',
                'action'=>'index'
            );

            $routes['processo_seletivo']=array(
                'route'=>'/processo_seletivo',
                'controller'=>'employee-screensController',
                'action'=>'ProcessoSeletivo'
            );

            $this->setRoutes($routes);
        }    
    }

?>