<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class ProcessoSeletivo extends Model{
        private $id_entrevista;	
        private $id_user;	
        private $titulo_entrevista;	
        private $descricao;	

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }
        
        public function save(){
            $query = 'INSERT INTO tb_processo_seletivo (id_entrevista, id_user, titulo_entrevista, descricao) 
            VALUES(NULL, id_user, titulo_entrevista, descricao)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user',$this->__get('id_user'));
            $stmt->bindValue(':titulo_entrevista',$this->__get('titulo_entrevista'));
            $stmt->bindValue(':descricao',$this->__get('descricao'));

            $stmt->execute();
        }
    }

?>