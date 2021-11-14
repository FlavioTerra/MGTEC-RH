<?php 

    namespace App\Models;

    use MF\Model\Model;

    Class GerarVaga extends Model{
        private $id_vaga;	
        private $id_cargo;	
        private $id_solicitante;	
        private $titulo_vaga;
        private $num_vagas;
        private $vinculo_emp;
        private $data_solic;
        private $salario;
        private $funcao;
        private $hora_inicio;
        private $hora_fim;	

        public function __get($attribute){
            return $this->$attribute;
        }

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }
        
        public function save(){
            // id_proc é setado quando é criado o processo seletivo
            // id_solicitante pe setado pelo usuário em que esta logado
            $query = 'insert into tb_vaga (id_vaga,
                                           id_proc,
                                           id_cargo,
                                           id_solicitante,
                                           titulo_vaga,
                                           num_vagas,
                                           vinculo_emp,
                                           status_vaga,
                                           data_solic,
                                           salario,
                                           funcao,
                                           hora_inicio,
                                           hora_fim)
                                    values (null,
                                           null, 
                                           :id_cargo,
                                           null,
                                           :titulo_vaga,
                                           :num_vagas,
                                           :vinculo_emp,
                                           "Aberta",
                                           :data_solic,
                                           :salario,
                                           :funcao,
                                           :hora_inicio,
                                           :hora_fim)';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_cargo',$this->__get('id_cargo'));
            $stmt->bindValue(':titulo_vaga',$this->__get('titulo_vaga'));
            $stmt->bindValue(':num_vagas',$this->__get('num_vagas'));
            $stmt->bindValue(':vinculo_emp',$this->__get('vinculo_emp'));
            $stmt->bindValue(':data_solic',$this->__get('data_solic'));
            $stmt->bindValue(':status_vaga',$this->__get('status_vaga'));
            $stmt->bindValue(':salario',$this->__get('salario'));
            $stmt->bindValue(':funcao',$this->__get('funcao'));
            $stmt->bindValue(':hora_inicio',$this->__get('hora_inicio'));
            $stmt->bindValue(':hora_fim',$this->__get('hora_fim'));

            $stmt->execute();
        }

        public function saveCompetencia() {
            $query = 'insert into tb_vaga_competencia (id_vaga, 
                                                       id_competencia) 
                                               values';
        }
        
        public function saveExperiencia() {
            $query = 'insert into tb_vaga_experiencia (id_vaga, 
                                                       id_experiencia) 
                                               values';
        }
        
        public function saveFormacao() {
            $query = 'insert into tb_vaga_formacao (id_vaga, 
                                                    id_formacao) 
                                            values (';
        }

        public function getAll() {
            $query = 'select v.id_vaga,  
                             v.titulo_vaga,
                             v.num_vagas,
                             c.nome_cargo,
                             d.nome_departamento
                             from tb_vaga v 
                  inner join tb_cargo c        on v.id_cargo = c.id_cargo
                  inner join tb_departamento d on d.id_departamento = c.id_departamento';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getVaga() {
            $query = "select v.id_vaga,
                             c.nome_cargo,
                             d.nome_departamento,
                             u.nome,
                             v.titulo_vaga,
                             v.num_vagas,
                             v.vinculo_emp,
                             DATE_FORMAT(v.data_solic, '%d/%m/%Y') as data_solic,
                             v.salario,
                             v.funcao,
                             v.hora_inicio,
                             v.hora_fim
                        from tb_vaga v 
                  inner join tb_cargo c on v.id_cargo = c.id_cargo
                  inner join tb_departamento d on c.id_departamento = d.id_departamento
                  inner join tb_usuario u on v.id_solicitante = u.id_user
                       where v.id_vaga = :id_vaga";
                
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_vaga',$this->__get('id_vaga'));
        
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
    }

?>