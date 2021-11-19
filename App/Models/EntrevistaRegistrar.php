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

        public function getAll() {
            $query = "select ec.id_entrevista,
                      ec.id_candidato,
                      ec.est_comp,
                      ec.pontos_pos,
                      ec.pontos_neg
                      from tb_entrevista_candidato ec";
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getEntrevistaRegistrada() {
            $query = "select ec.id_entrevista,
                        ec.id_candidato,
                        ec.est_comp,
                        ec.pontos_pos,
                        ec.pontos_neg
                        from tb_entrevista_candidato ec
                        inner join tb_candidato u on ec.id_candidato = u.id_candidato  
                        where ec.id_entrevista = :id_entrevista";
  
            // Fazer junção com vaga mais tarde

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_entrevista',$this->__get('id_entrevista'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>