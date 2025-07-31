<?php

class Example extends Model
{
    /*
    * Altere o nome da classe
    * Altere o nome da tabela
    * Altere os campos (field) de acordo com o seu BD
    * Remova esse comentário ao concluir 
    */
    public function insert($form_data)
    {
        // Garantir que o array de dados não esteja vazio
        if (empty($form_data)) {
            return false;
        }

        // Gerar os placeholders e campos dinamicamente
        $fields = implode(", ", array_keys($form_data));
        $placeholders = ":" . implode(", :", array_keys($form_data));

        // Montar a query dinâmica
        $sql = "INSERT INTO name_table ($fields) VALUES ($placeholders)";
        $sql = $this->db->prepare($sql);

        // Atribuir valores dinamicamente
        foreach ($form_data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }

        // Executar a query
        $sql->execute();


        // Retornar o sucesso da operação
        return $sql->rowCount() > 0;
    }

    public function update($form_data, $id)
    {
        // Garantir que o array de dados não esteja vazio
        if (empty($form_data)) {
            return false;
        }

        // Gerar os campos dinamicamente para o UPDATE
        $fields = "";
        foreach ($form_data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        // Remover a última vírgula e espaço
        $fields = rtrim($fields, ", ");

        // Montar a query dinâmica
        $sql = "UPDATE name_table SET $fields WHERE id = :id";

        // Prepara a consulta
        $sql = $this->db->prepare($sql);

        // Atribuir os valores dinamicamente
        foreach ($form_data as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        // Vincula o ID para a cláusula WHERE
        $sql->bindValue(':id', $id);

        // Executa a consulta
        $sql->execute();

        // Verifica se a atualização foi bem-sucedida
        return $sql->rowCount() > 0;
    }

    public function get($id)
    {
        $data = array();
        $sql = "SELECT * FROM name_table WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function getAll($offset, $limit, $filters)
    {

        $data = array();
        $where = array(
            '1=1'
        );

        if (!empty($filters['name_filter'])) {
            $where[] = "name_filter = :name_filter";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "name_table.id";
        }

        $sql = "SELECT *
        FROM name_table 
        WHERE " . implode(' AND ', $where) . "
        ORDER BY " . $order . "
        LIMIT " . $offset . "," . $limit;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['name_filter'])) {
            $sql->bindValue(":name_filter", $filters['name_filter']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function getTotal($filters)
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['name_filter'])) { //repito esse processo para todos os filtros
            $where[] = "name_filter = :name_filter";
        }

        $sql = "SELECT 
        COUNT(*) as total 
        FROM name_table
        WHERE " . implode(' AND ', $where) . "";

        $sql = $this->db->prepare($sql);

        if (!empty($filters['name_filter'])) {
            $sql->bindValue(":name_filter", $filters['name_filter']);
        }


        $sql->execute();
        $array = $sql->fetch();
        return $array['total'];
    }

    public function delete($id)
    {
        $sql = "DELETE FROM name_table WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
