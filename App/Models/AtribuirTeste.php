<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class AtribuirTeste extends Model{
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
        
        public function save(){
            $query = 'insert into tb_pergunta (id_pergunta,
                                               id_teste,
                                               peso,
                                               Pergunta,
                                               resposta_certa,
                                               resposta_er1,
                                               resposta_er2,
                                               resposta_er3)
                                       values(:id_pergunta,
                                              :id_teste,
                                              :peso,
                                              :Pergunta,
                                              :resposta_certa,
                                              :resposta_er1,
                                              :resposta_er2,
                                              :resposta_er3)';

            $stmt = $this->db->prepare($query);
            
            $stmt->bindValue(':id_pergunta',$this->__get('id_pergunta'));
            $stmt->bindValue(':id_teste',$this->__get('id_teste'));
            $stmt->bindValue(':peso',$this->__get('peso'));
            $stmt->bindValue(':Pergunta',$this->__get('Pergunta'));
            $stmt->bindValue(':resposta_certa',$this->__get('resposta_certa'));
            $stmt->bindValue(':resposta_er1',$this->__get('resposta_er1'));
            $stmt->bindValue(':resposta_er2',$this->__get('resposta_er2'));
            $stmt->bindValue(':resposta_er3',$this->__get('resposta_er3'));

            $stmt->execute();
        }
    }

?>