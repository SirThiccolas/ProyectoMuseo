<?php

require_once("database.php");

class Users extends Database
{
    public function verifyUser($usuario, $contrasenya)
    {
        $sql = "SELECT * FROM usuaris WHERE Nom_Usuari = :usuario AND Password = :contrasenya";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasenya', $contrasenya);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM usuaris";
        $db = $this->conectar();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($nomUser, $pwdUser, $emailUser, $rolUser)
    {
        $db = $this->conectar();

        $comprNom = "SELECT * FROM usuaris WHERE Nom_Usuari = :nomUser";
        $stmt = $db->prepare($comprNom);
        $stmt->bindParam(':nomUser', $nomUser);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "Aquest nom no es troba disponible, prova de nou.";
        }

        $sql = "INSERT INTO usuaris (Nom_Usuari, Password, Email, Rol) VALUES (:nomUser, :pwdUser, :emailUser, :rolUser)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nomUser', $nomUser);
        $stmt->bindParam(':pwdUser', $pwdUser); 
        $stmt->bindParam(':emailUser', $emailUser);
        $stmt->bindParam(':rolUser', $rolUser);

        return $stmt->execute();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM usuaris WHERE ID_Usuari = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $nomUser, $emailUser, $rolUser)
    {
        $sql = "UPDATE usuaris SET Nom_Usuari = :nomUser, Email = :emailUser, Rol = :rolUser WHERE ID_Usuari = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomUser', $nomUser);
        $stmt->bindParam(':emailUser', $emailUser);
        $stmt->bindParam(':rolUser', $rolUser);

        return $stmt->execute();
    }

    public function deleteUser($id) 
    {
        $sql = "DELETE FROM usuaris WHERE ID_Usuari = :id";
        $db = $this->conectar();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

}
