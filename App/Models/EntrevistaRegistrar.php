<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class EntrevistaRegistrar extends Model{
        private $id_candidato;
        private $id_entrevista;	
        private $est_comp;	
        private $pontos_pos;	
        private $pontos_neg;		

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO tb_entrevista_candidato (id_entrevista, id_candidato, est_comp, pontos_pos, pontos_neg) 
            VALUES(NULL, :id_candidato, :est_comp, :pontos_pos, :pontos_neg)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_candidato',$this->__get('id_candidato'));
            $stmt->bindValue(':est_comp',$this->__get('est_comp'));
            $stmt->bindValue(':pontos_pos',$this->__get('pontos_pos'));
            $stmt->bindValue(':pontos_neg',$this->__get('pontos_neg'));

            $stmt->execute();
        }
    }

?>