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

        //****______________Requisitos do Perfil _________________****//

        private $id_experiencia;
        private $id_competencia;
        private $id_formacao;

        // Experiencia
        private $nome_e;
        private $c_status_e;
        private $anos_xp;
        
        // Competencia
        private $grau_c;
        private $nome_c;
        private $c_status_c;	

        // Formação
        private $tipo;
        private $grau_f;
        private $c_status_f;
        private $curso;	

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
            $stmt->bindValue(':nome',$this->__get('nome'));

            $stmt->execute();

            // Recupera o ultimo id_pefil 
            $query = 'select max(id_candidato) id_candidato from tb_candidato';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ);   
        }

        public function saveExperiencia() {

            $query = 'insert into tb_experiencia_c (id_experiencia,
                                                    nome,
                                                    c_status,
                                                    anos_xp)
                                            values (null,
                                                    :nome_e,
                                                    :c_status_e,
                                                    :anos_xp)';    

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':nome_e',$this->__get('nome_e'));
            $stmt->bindValue(':c_status_e',$this->__get('c_status_e'));
            $stmt->bindValue(':anos_xp',$this->__get('anos_xp'));

            $stmt->execute();   

            // Recupera o ultimo id_experiencia 
            $query = 'select max(id_experiencia) id_experiencia from tb_experiencia_c';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $id_xp = $stmt->fetch(\PDO::FETCH_OBJ);
            $this->__set('id_experiencia', $id_xp->id_experiencia);

            //***________ Relacionando com a tabela intermediária ________*** //

            $query = 'insert into tb_candidato_experiencia (id_candidato, 
                                                       id_experiencia) 
                                                values (:id_candidato,
                                                        :id_experiencia)';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id_candidato',$this->__get('id_candidato'));
            $stmt->bindValue(':id_experiencia',$this->__get('id_experiencia'));

            $stmt->execute();      
        }

        public function saveCompetencia() {

            $query = 'insert into tb_competencia_c (id_competencia,
                                                    grau,
                                                    nome,
                                                    c_status)
                                            values (null,
                                                    :grau_c,
                                                    :nome_c,
                                                    :c_status_c)';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':grau_c',$this->__get('grau_c'));
            $stmt->bindValue(':nome_c',$this->__get('nome_c'));
            $stmt->bindValue(':c_status_c',$this->__get('c_status_c'));

            $stmt->execute();   

            // Recupera o ultimo id_competencia 
            $query = 'select max(id_competencia) id_competencia from tb_competencia_c';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $id_comp = $stmt->fetch(\PDO::FETCH_OBJ);
            $this->__set('id_competencia', $id_comp->id_competencia);

            //***________ Relacionando com a tabela intermediária ________*** //

            $query = 'insert into tb_candidato_competencia (id_candidato, 
                                                            id_competencia) 
                                                    values (:id_candidato,
                                                            :id_competencia)';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id_candidato',$this->__get('id_candidato'));
            $stmt->bindValue(':id_competencia',$this->__get('id_competencia'));

            $stmt->execute();                                   		
        }
        
        public function saveFormacao() {

            $query = 'insert into tb_formacao_c (id_formacao,
                                                 tipo,
                                                 grau,
                                                 c_status,
                                                 curso)
                                        values (null,
                                                :tipo,
                                                :grau_f,
                                                :c_status_f,
                                                :curso)';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':tipo',$this->__get('tipo'));
            $stmt->bindValue(':grau_f',$this->__get('grau_f'));
            $stmt->bindValue(':c_status_f',$this->__get('c_status_f'));
            $stmt->bindValue(':curso',$this->__get('curso'));

            $stmt->execute();

            // Recupera o ultimo id_formacao 
            $query = 'select max(id_formacao) id_formacao from tb_formacao_c';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $id_form= $stmt->fetch(\PDO::FETCH_OBJ);
            $this->__set('id_formacao', $id_form->id_formacao);

            //***________ Relacionando com a tabela intermediária ________*** //

            $query = 'insert into tb_candidato_formacao (id_candidato, 
                                                        id_formacao) 
                                                values (:id_candidato,
                                                        :id_formacao)';

            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id_candidato',$this->__get('id_candidato'));
            $stmt->bindValue(':id_formacao',$this->__get('id_formacao'));

            $stmt->execute();
        }
    }

?>