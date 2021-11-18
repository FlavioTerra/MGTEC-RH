<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class EntrevistaMarcar extends Model{
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

        public function getAll() {
            $query = 'select e.id_entrevista,  
                        e.id_user,
                        e.responsavel,
                        e.data_entrevista,
                        e.titulo_entrevista,
                        e.hora_entrevista,
                        e.descricao
                        from tb_entrevista e';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getEntrevistaCandidato() {
            $query = 'select e.id_entrevista,  
                        e.id_user,
                        e.responsavel,
                        e.data_entrevista,
                        e.titulo_entrevista,
                        e.hora_entrevista,
                        e.descricao
                        from tb_entrevista e
                        inner join tb_usuario u on e.id_user = u.id_user    
                        where e.id_entrevista = :id_proc';
  
                
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>