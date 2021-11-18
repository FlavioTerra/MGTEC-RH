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
            $query = "select ec.id_candidato,
                      ec.est_comp,
                      ec.pontos_pos,
                      ec.pontos_neg
                      from tb_entrevista_candidato ec";
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getEntrevistaRegistrada() {
            $query = "select ps.id_proc,  
                             ps.titulo_proc,
                             u.nome,
                             ps.status_proc,
                             DATE_FORMAT(ps.data_inicio,'%d/%m/%Y') as data_inicio,
                             DATE_FORMAT(ps.data_termino,'%d/%m/%Y') as data_termino,
                             ps.regra_class,
                             ps.descricao
                            from tb_processo_seletivo ps
                            inner join tb_usuario u on ps.id_responsavel = id_user    
                            where ps.id_proc = :id_proc";
  
            // Fazer junção com vaga mais tarde

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>