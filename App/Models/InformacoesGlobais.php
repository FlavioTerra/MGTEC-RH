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
    }

?>