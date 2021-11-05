<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    //Models
    use App\Models\DepartamentosCargos;

    // 1 => Usuario comum
    // 2 => Usuario funcionario
    // 3 => Usuario gestor
    // 4 => Usuario chefe

    class GeneralScreensController extends Action {
        public function index() {  

        }

        public function usuarioCadastrar() {
            $this->render('usuario-cadastrar');
        }

        public function usuarioCadastrarSalvar() {
            $entrevista = Container::getModel('UsuarioCadastrar');
          
            $entrevista->__set('login_user',$_POST['login']);
            $entrevista->__set('email_user',$_POST['email']);
            $entrevista->__set('senha_user',$_POST['senha']);
            $entrevista->__set('nome',$_POST['nome']);

            $entrevista->save();

            header('Location:/usuario_cadastrar?usuarioCadastrar=sucess');   
        }

        public function gerarUsuario() {

            $usuarios = Container::getModel('InformacoesGlobais');
            $this->view->usuarios = $usuarios->getUsuarios();

            $this->render('usuario-cadastrar');
        }

    }   

?>