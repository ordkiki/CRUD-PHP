<?php
    class UserModel{
        private $Id_user;
        private $Nom;
        private $Prenom;
        private $Email;
        private $Telephone;
        private $conn;

        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function GetUsername() {
            return $this->Nom;
        }
    
        public function GetID() {
            return $this->Id_user;
        }

        public function GetEmail() {
            return $this->Email;
        }

        public function GetTel() {
            return $this->Telephone;
        }

        public function CreateUser($data){
            $sql = "INSERT INTO Users (Nom, Prenom, Email, Telephone)
                    VALUES (:Nom , :Prenom, :Email, :Telephone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':Nom', $data['Nom']);
            $stmt->bindParam(':Prenom', $data['Prenom']);
            $stmt->bindParam(':Email', $data['Email']);
            $stmt->bindParam(':Telephone', $data['Telephone']);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
        public function ListeAll(){
            $sql = "SELECT * FROM Users";
            $stmt = $this->conn->query($sql);
            if ($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
        }

        public function Remove_User_ById($id) {
            $sql = "DELETE FROM Users WHERE Id_user = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        public function Modify_userById($data, $id) {
            $sql = "UPDATE Users SET Nom = :Nom, Prenom = :Prenom, Email = :Email, Telephone = :Telephone WHERE Id_user = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':Nom', $data['Nom']);
            $stmt->bindParam(':Prenom', $data['Prenom']);
            $stmt->bindParam(':Email', $data['Email']);
            $stmt->bindParam(':Telephone', $data['Telephone']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            return $stmt->execute();
        }
        
        
    }   
?>