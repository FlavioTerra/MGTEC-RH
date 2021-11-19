<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class UsuarioCadastrar extends Model{
        private $id_user; 
        private $email_user; 
        private $login_user; 
        private $senha_user; 
        private $situacao_user; 
        private $tipo_user; 
        private $nome; 

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO tb_usuario (id_user, email_user, login_user, senha_user, situacao_user, tipo_user, nome) 
            VALUES(NULL, :email_user, :login_user, :senha_user, NULL, NULL, :nome)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email_user',$this->__get('email_user'));
            $stmt->bindValue(':login_user',$this->__get('login_user'));
            $stmt->bindValue(':senha_user',$this->__get('senha_user'));
            $stmt->bindValue(':nome',$this->__get('nome'));

            $stmt->execute();
        }

        public function logar(){
            print_r($id_user);
        }
    }

?>