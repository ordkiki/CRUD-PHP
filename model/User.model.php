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
    }   
?>