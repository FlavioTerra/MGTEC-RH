<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\DepartamentosCargos;

    // 1 => Usuario comum
    // 2 => Usuario funcionario
    // 3 => Usuario gestor
    // 4 => Usuario chefe rh

    class GeneralScreensController extends Action {
        public function index() {  
            $this->render('home');
        }

        public function usuarioCadastrar() {
            $this->render('usuario-cadastrar');
        }

        public function usuarioCadastrarSalvar() {
            $usuario = Container::getModel('UsuarioCadastrar');
          
            $usuario->__set('login_user',$_POST['login']);
            $usuario->__set('email_user',$_POST['email']);
            $usuario->__set('senha_user',$_POST['senha']);
            $usuario->__set('nome',$_POST['nome']);

            $usuario->save();

            header('Location:/usuario_cadastrar?usuarioCadastrar=sucess');   
        }

        public function gerarUsuario() {

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('usuario-cadastrar');
        }

    }   

?>