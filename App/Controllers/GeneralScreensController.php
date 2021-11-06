<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\DepartamentosCargos;

    class GeneralScreensController extends Action {
        public function index() {  

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

    }   

?>