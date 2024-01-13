<?php
require_once 'Models/GestionUserModel.php';
class GestionUserController
{
    public function getUserInformation($idUtilisateur)
    {
        $gestionUserModel = new GestionUserModel();
        $result = $gestionUserModel->getUserInformation($idUtilisateur);
        return $result;
    }

    public function getUserComments($idUtilisateur)
    {
        $gestionUserModel = new GestionUserModel();
        $result = $gestionUserModel->getUserComments($idUtilisateur);
        return $result;
    }

    public function handleUpdateUserInfo($idClient, $nom, $prenom, $email, $sexe, $dateNaissance)
    {
        $gestionUserModel = new GestionUserModel();
        $gestionUserModel->updateUserInfo($idClient, $nom, $prenom, $email, $sexe, $dateNaissance);
        header("Location: ./user-profil?idClient=$idClient");
    }
}
