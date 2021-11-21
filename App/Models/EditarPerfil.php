<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class EditarPerfil extends Model{
    private $id_candidato;
    private $id_proc;
    private $id_estado;
    private $nome; 
    private $email; 
    private $foto; 
    private $cpf; 
    private $cnpf; 
    private $data_nasc; 
    private $sexo;
    private $bairro; 
    private $cep; 
    private $num_casa; 
    private $rua; 
    private $cadastro_pessoa; 
    private $disponibilidade; 
    private $telefone; 
    private $celular; 
    private $sobre; 
    private $tipo_pessoa; 
    private $curriculo; 
    private $c_status; 

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function save(){
            $query = 'INSERT INTO tb_candidato (id_candidato, id_proc, id_estado, nome, email, foto, cpf, cnpf, data_nasc, sexo, bairro, cep, num_casa, rua, cadastro_pessoa, 
            disponibilidade, telefone, celular, sobre, tipo_pessoa, curriculo, c_status) 
            VALUES(NULL, NULL, :id_estado, :nome, NULL, :foto, :cpf, NULL, :data_nasc, :sexo, :bairro, :cep, :num_casa, :rua, :cadastro_pessoa, 
            :disponibilidade, :telefone, :celular, :sobre, :tipo_pessoa, :curriculo, :c_status)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_estado',$this->__get('id_estado'));
            $stmt->bindValue(':nome',$this->__get('nome'));
            $stmt->bindValue(':foto',$this->__get('foto'));
            $stmt->bindValue(':cpf',$this->__get('cpf'));
            $stmt->bindValue(':data_nasc',$this->__get('data_nasc'));
            $stmt->bindValue(':sexo',$this->__get('sexo'));
            $stmt->bindValue(':bairro',$this->__get('bairro'));
            $stmt->bindValue(':cep',$this->__get('cep'));
            $stmt->bindValue(':num_casa',$this->__get('num_casa'));
            $stmt->bindValue(':rua',$this->__get('rua'));
            $stmt->bindValue(':cadastro_pessoa',$this->__get('cadastro_pessoa'));
            $stmt->bindValue(':disponibilidade',$this->__get('disponibilidade'));
            $stmt->bindValue(':telefone',$this->__get('telefone'));
            $stmt->bindValue(':celular',$this->__get('celular'));
            $stmt->bindValue(':sobre',$this->__get('sobre'));
            $stmt->bindValue(':tipo_pessoa',$this->__get('tipo_pessoa'));
            $stmt->bindValue(':curriculo',$this->__get('curriculo'));
            $stmt->bindValue(':c_status',$this->__get('c_status'));

            $stmt->execute();
        }

        public function getPerfilCandidato() {
            $query = "select e.id_entrevista,  
                        e.id_user,
                        e.responsavel,
                        DATE_FORMAT(e.data_entrevista,'%d/%m/%Y') as data_entrevista,
                        e.titulo_entrevista,
                        e.hora_entrevista,
                        e.descricao
                        from tb_entrevista e
                        inner join tb_usuario u on e.id_user = u.id_user    
                        where e.id_entrevista = :id_entrevista";
  
                
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_entrevista',$this->__get('id_entrevista'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>