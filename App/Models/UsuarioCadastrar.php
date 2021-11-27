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
            $query = 'select id_user,
                             nome,
                             email_user,
                             tipo_user,
                             login_user
                        from tb_usuario
                       where (email_user = :email_user or nome = :email_user)
                         and senha_user = :senha_user';
            
            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':email_user', $this->__get('email_user'));
            $stmt->bindValue(':senha_user', $this->__get('senha_user'));

            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_OBJ);

            if($user) {
                $this->__set('id_user', $user->id_user);
                $this->__set('tipo_user', $user->tipo_user);  
                $this->__set('nome', $user->nome);  
                $this->__set('login_user', $user->login_user);  
            }
        }

        public function getAllCandidatos() {
            $query = 'select *
                        from tb_candidato tc
                  inner join tb_processo_seletivo tps on tc.id_proc = tps.id_proc 
                       where tc.id_proc is not null';

            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } 
    }

?>