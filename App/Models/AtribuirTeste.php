<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class AtribuirTeste extends Model{
 
        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }
        
        public function save(){
            $query = '';

            $stmt = $this->db->prepare($query);

            $stmt->execute();
        }
    }

?>