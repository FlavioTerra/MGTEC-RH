<?php
    namespace App\Models;

    use MF\Model\Model;

    Class InformacoesGlobais extends Model{
    
        function getDepartamentos() {
            $query = 'select id_departamento, 
                             nome_departamento, 
                             descricao
                        from tb_departamento';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function getCargos() {
            $query = 'select id_cargo, 
                             id_departamento, 
                             nome_cargo,
                             descricao
                        from tb_cargo';

            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function getUsuarios() {
            $query = 'select id_user, 
                            login_user, 
                            situacao_user,
                            tipo_user,
                            nome
                        from tb_usuario
                        where tipo_user="3";';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function getEstados() {
            $query = 'select id_estado,
                             nome
                        from tb_estado';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        function getCidades() {
            $query = 'select id_cidade,
                             id_estado,
                             nome
                        from tb_cidade';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getAllVagasAbertas() {
            $query = "select v.id_vaga,  
                             v.titulo_vaga
                             from tb_vaga v 
                            where v.status_vaga = 'Aprovada'";
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public function getAllVagasDivulgadas() {
            $query = "select v.id_vaga,  
                             v.id_proc,
                             v.id_cargo,
                             c.nome_cargo,
                             c.descricao,
                             v.titulo_vaga,
                             v.num_vagas,
                             v.salario,
                             v.funcao,
                             v.titulo_vaga
                        from tb_vaga v 
                   left join tb_processo_seletivo tps on v.id_proc = tps.id_proc 
                   left join tb_cargo c on v.id_cargo = c.id_cargo 
                       where tps.status_proc = 'Divulgado'";
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
    }

?>