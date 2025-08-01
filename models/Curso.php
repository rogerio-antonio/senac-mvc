<?php
    
class Curso extends Model{
        private $id;
        private $nome;
        private $descricao;

        public function setId($id){
                $this->id = $id;
        }


        public function setNome($nome){
                $this->nome = $nome;
        }

        public function setDescricao($descricao){
                $this->descricao = $descricao;
        }

        public function insert(){
                $sql = "INSERT INTO cursos (nome, descricao) VALUES (:nome, :descricao)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":nome", $this->nome);
                $sql->bindValue(":descricao", $this->descricao);
                $sql->execute();

                if ($sql->rowCount() > 0){
                        return true;
                }else{
                        return false;
                }

        }

       public function getAll(){ // Método para pegar todos os cursos
               
                $data = [];
               
                $sql = "SELECT * 
                FROM cursos";
                $sql = $this->db->prepare($sql); //Preparo da query para tirar códigos maliciosos, etc.
                $sql->execute();


                if ($sql->rowCount() > 0){
                        return $sql->fetchAll(PDO::FETCH_ASSOC);// FETCH_ASSOC retorna um array associativo. P FETCH sozinho só pega o primeiro resultado.
                }else{
                        return $data;
                }
                
        
        }

        public function get(){ // Método para pegar um aluno específico
               
                $data = [];
               
                $sql = "SELECT * 
                FROM cursos 
                WHERE id = :id";
                $sql = $this->db->prepare($sql); //Preparo da query para tirar códigos maliciosos, etc.
                $sql->bindValue(":id", $this->id); // Bind do id para evitar SQL Injection - Encapsula o valor da variável para não ser interpretado como código SQL.
                $sql->execute();

               
                if ($sql->rowCount() > 0){
                        return $sql->fetchAll(PDO::FETCH_ASSOC);// FETCH_ASSOC retorna um array associativo. P FETCH sozinho só pega o primeiro resultado.
                }else{
                        return $data;
                }
        }

}


?>