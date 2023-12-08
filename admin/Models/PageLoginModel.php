<?php
require_once 'Models/ConnexionBdd.php';
class PageLoginModel extends ConnexionBdd
{
    public function login($email, $password)
    {
        $database = $this->connexion();
        $sql_query = "SELECT * FROM Admins WHERE Email = :email";
        $requete = $database->prepare($sql_query);
        $requete->execute(['email' => $email]);
        if ($requete->rowCount() == 1) {
            $result = $requete->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = hash('sha256', $password);
            if ($result['Mot_de_passe'] === $hashedPassword) {
                $this->deconnexion($database);
                return $result;
            }
        }
        $this->deconnexion($database);
        return false;
    }
}
