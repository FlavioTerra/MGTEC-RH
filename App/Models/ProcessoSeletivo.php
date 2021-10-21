<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class ProcessoSeletivo extends Model{
        private $id_proc;	
        private $id_responsavel;	
        private $titulo_proc;	
        private $data_inicio;	
        private $data_termino;	
        private $regra_class;	
        private $descricao;

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO tb_processo_seletivo (id_proc, id_responsavel, titulo_proc, data_inicio, data_termino, regra_class, descricao) 
            VALUES(NULL, :id_responsavel, :titulo_proc, :data_inicio, :data_termino, :regra_class, :descricao)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_responsavel',$this->__get('id_responsavel'));
            $stmt->bindValue(':titulo_proc',$this->__get('titulo_proc'));
            $stmt->bindValue(':data_inicio',$this->__get('data_inicio'));
            $stmt->bindValue(':data_termino',$this->__get('data_termino'));
            $stmt->bindValue(':regra_class',$this->__get('regra_class'));
            $stmt->bindValue(':descricao',$this->__get('descricao'));

            $stmt->execute();
        }
    }

?>