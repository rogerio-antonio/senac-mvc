<?php
    
class Usuario extends Model{
        private $id;
        private $login;
        private $password;
        private $hash;
        public function setId($id){
                $this->id = $id;
        }

        public function setLogin($login){
                $this->login = $login;
        }

        public function setPassword($password){
                $this->password = $password;
        }

        public function setHash($hash){
                $this->hash = $hash;
        }



        public function insert(){
                $sql = "INSERT INTO usuarios (login, password) VALUES (:login, :password)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":login", $this->login);
                $sql->bindValue(":password", $this->password);
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
                FROM usuarios";
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
                FROM usuarios 
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