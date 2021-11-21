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
    // 5 => adm

    class GeneralScreensController extends Action {
        public function index() {  
            // trocar dps
            session_start();

            if(empty($_SESSION['tipo_user'])) {
                $_SESSION['tipo_user'] = 6;
            }
            
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

        public function usuarioEntrarValidar(){
            $usuario = Container::getModel('UsuarioCadastrar');

            $usuario->logar();
        }

        public function gerarUsuario() {

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('usuario-cadastrar');
        }

        public function usuarioEntrar() {
            $this->render('login'); 
        }

        public function usuarioLogar() {

            $user = Container::getModel('UsuarioCadastrar');

            $user->__set('email_user', $_POST['user_name']);
            $user->__set('senha_user', $_POST['user_password']);

            $user->logar();

            if(!empty($user->__get('id_user')) && !empty($user->__get('tipo_user'))) {
                
                session_start(); 
                
                $_SESSION['id_usuario'] = $user->__get('id_user');
                $_SESSION['tipo_user'] = $user->__get('tipo_user');
                $_SESSION['nome'] = $user->__get('nome');
                $_SESSION['login_user'] =  $user->__get('login_user');

                header('Location: /');
            } 
            else {
                header('Location: /usuario_entrar?login=error');
            }
         }

        public function usuarioSair() {
            session_start();
            session_destroy();
            header('Location: /'); 
        }

        public function exibirPopup() {
            $this->render('popup'); 
        }

        public function usuarioRecuperarSenha() {
            $this->render('recuperar-senha'); 
        }

        public function usuarioRecuperarSenhaCodigo() {
            $this->render('recuperar-senha-security'); 
        }

    }   

?>