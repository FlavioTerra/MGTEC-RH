<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class ProcessoSeletivo extends Model{
        private $id_proc;	
        private $id_responsavel;	
        private $titulo_proc;	
        private $status_proc;
        private $data_inicio;	
        private $data_termino;	
        private $regra_class;	
        private $descricao;

        private $id_vaga;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO tb_processo_seletivo (id_proc, id_responsavel, titulo_proc, status_proc, data_inicio, data_termino, regra_class, descricao) 
            VALUES(NULL, :id_responsavel, :titulo_proc, "Aberto", :data_inicio, :data_termino, :regra_class, :descricao)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_responsavel',$this->__get('id_responsavel'));
            $stmt->bindValue(':titulo_proc',$this->__get('titulo_proc'));
            $stmt->bindValue(':data_inicio',$this->__get('data_inicio'));
            $stmt->bindValue(':data_termino',$this->__get('data_termino'));
            $stmt->bindValue(':regra_class',$this->__get('regra_class'));
            $stmt->bindValue(':descricao',$this->__get('descricao'));

            $stmt->execute();

            $query = 'select max(id_proc) id_proc
                        from tb_processo_seletivo';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $id_processo= $stmt->fetch(\PDO::FETCH_OBJ);
            $this->__set('id_proc', $id_processo->id_proc);

            $query = 'update tb_vaga
                         set id_proc = :id_proc
                       where id_vaga = :id_vaga';
            
            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
            $stmt->bindValue(':id_vaga',$this->__get('id_vaga'));

            $stmt->execute();
                         
        }

        public function getAll() {
            $query = "select ps.id_proc,  
                      ps.titulo_proc,
                      ps.status_proc,
                      DATE_FORMAT(ps.data_inicio, '%d/%m/%Y') as data_inicio,
                      DATE_FORMAT(ps.data_termino, '%d/%m/%Y') as data_termino,
                      ps.regra_class,
                      ps.descricao
                      from tb_processo_seletivo ps";
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getProcessoSeletivo() {
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