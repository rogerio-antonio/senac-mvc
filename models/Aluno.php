<?php
    
class Aluno extends Model{
        
        private $id;
        private $matricula;
        private $nome;

        public function setId($id){
                $this->id = $id;
        }


        public function setMatricula($matricula){
                $this->matricula = $matricula;
        }

        public function setNome($nome){
                $this->nome = $nome;
        }

        public function insert(){
                $sql = "INSERT INTO alunos (matricula, nome) VALUES (:matricula, :nome)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":matricula", $this->matricula);
                $sql->bindValue(":nome", $this->nome);
                $sql->execute();

                if ($sql->rowCount() > 0){
                        return true;
                }else{
                        return false;
                }

        }

       public function getAll(){ // Método para pegar todos os alunos
               
                $data = [];
               
                $sql = "SELECT * 
                FROM alunos";
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
                FROM alunos 
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