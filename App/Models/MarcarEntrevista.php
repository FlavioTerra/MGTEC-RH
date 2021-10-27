<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class MarcarEntrevista extends Model{
        private $id_entrevista;
        private $id_user;
        private $responsavel;
        private $data_entrevista; 
        private $titulo_entrevista;
        private $hora_entrevista;
        private $descricao;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }
        
        public function save(){
            $query = 'INSERT INTO tb_entrevista (id_entrevista, id_user, responsavel, data_entrevista, titulo_entrevista, hora_entrevista, descricao) 
            VALUES(NULL, :id_user, :responsavel, :data_entrevista, :titulo_entrevista, :hora_entrevista, :descricao)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_user',$this->__get('id_user'));
            $stmt->bindValue(':responsavel',$this->__get('responsavel'));
            $stmt->bindValue(':data_entrevista',$this->__get('data_entrevista'));
            $stmt->bindValue(':titulo_entrevista',$this->__get('titulo_entrevista'));
            $stmt->bindValue(':hora_entrevista',$this->__get('hora_entrevista'));
            $stmt->bindValue(':descricao',$this->__get('descricao'));

            $stmt->execute();
        }
    }

?>