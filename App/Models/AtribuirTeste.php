<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class AtribuirTeste extends Model{
        // Teste
        private $id_proc;
        private $tipo_teste;
        private $descricao;
        private $status;
        
        // Pergunta
        private $id_pergunta;
        private $id_teste;
        private $peso;
        private $Pergunta;
        private $resposta_certa;	
        private $resposta_er1;	
        private $resposta_er2;	
        private $resposta_er3;	

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }
        
        public function saveTeste() {
            $query = 'insert into tb_teste (id_teste,
                                            id_proc,
                                            tipo_teste,
                                            descricao,
                                            status_teste)
                                    values (null,
                                            :id_proc,
                                            :tipo_teste,
                                            :descricao,
                                            "Criado")';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
            $stmt->bindValue(':tipo_teste',$this->__get('tipo_teste'));
            $stmt->bindValue(':descricao',$this->__get('descricao'));

            $stmt->execute();

            $query = 'select max(id_teste) id_teste from tb_teste;';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }

        public function savePerguntas(){
            $query = 'insert into tb_pergunta (id_pergunta,
                                               id_teste,
                                               Pergunta,
                                               resposta_certa,
                                               resposta_er1,
                                               resposta_er2,
                                               resposta_er3)
                                       values(null,
                                              :id_teste,
                                              :Pergunta,
                                              :resposta_certa,
                                              :resposta_er1,
                                              :resposta_er2,
                                              :resposta_er3)';


            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_teste',$this->__get('id_teste'));
            $stmt->bindValue(':Pergunta',$this->__get('Pergunta'));
            $stmt->bindValue(':resposta_certa',$this->__get('resposta_certa'));
            $stmt->bindValue(':resposta_er1',$this->__get('resposta_er1'));
            $stmt->bindValue(':resposta_er2',$this->__get('resposta_er2'));
            $stmt->bindValue(':resposta_er3',$this->__get('resposta_er3'));

            $stmt->execute();
        }

        public function getIdTeste() {
            $query = "select t.id_teste,
                            t.id_proc, 
                            t.status_teste 
                            from tb_teste t
                            inner join tb_processo_seletivo ps on t.id_proc = ps.id_proc  
                            where t.id_proc = :id_proc";
                           

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }

        public function getStatus() {
            $query = "select
                           t.status_teste 
                            from tb_teste t
                            where t.id_teste = 1";
                           

            $stmt = $this->db->prepare($query);
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }

        public function trocaStatusTeste() {
            $query = "update tb_teste t
                    set t.status_teste = 'Liberado'   
                            where t.id_teste = :id_teste";
                           

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_teste',$this->__get('id_teste'));
        
            $stmt->execute();

            $query = "update tb_processo_seletivo ps
                    set ps.status_proc = 'Testes'   
                            where ps.id_proc = :id_proc";
                           

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_proc',$this->__get('id_proc'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>