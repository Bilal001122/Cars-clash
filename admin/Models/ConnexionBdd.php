<?php
class ConnexionBdd
{
    private $BDD_HOST = 'localhost';
    private $BDD_USER = 'root';
    private $BDD_PASSWORD = '';
    private $BDD_DATABASE_NAME = 'carsclash';

    public function connexion()
    {
        try {
            $bdd = new PDO("mysql:host={$this->BDD_HOST};dbname={$this->BDD_DATABASE_NAME}", $this->BDD_USER, $this->BDD_PASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            printf("Erreur de connexion à la base de données : %s\n", $exception->getMessage());
        }
        return $bdd;

    }

    public function deconnexion(&$bdd)
    {
        $bdd = null;
    }

    public function requete($bdd, $requete)
    {
        $reponse = $bdd->query($requete);
        return $reponse;
    }

}
