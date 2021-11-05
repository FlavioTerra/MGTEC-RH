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
                            nome
                        from tb_usuario';
            
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
    }

?>