<?php

class UserModel
{
    protected $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function enregistrerNouvelUtilisateur($utilisateurLastName, $utilisateurFirstName, $utilisateurEmail, $utilisateurPassword, $sectionId, $utilisateurAnnee)
    {
        try {
            $query = "INSERT INTO utilisateur (utilisateurLastName, utilisateurFirstName, utilisateurEmail, utilisateurPassword, sectionId, utilisateurAnnee) VALUES (:utilisateurLastName, :utilisateurFirstName, :utilisateurEmail, :utilisateurPassword, :sectionId, :utilisateurAnnee)";
            $enregistrerNouvelUtilisateur = $this->dbh->prepare($query);
            $enregistrerNouvelUtilisateur->execute([
                'utilisateurLastName' => $utilisateurLastName,
                'utilisateurFirstName' => $utilisateurFirstName,
                'utilisateurEmail' => $utilisateurEmail,
                'utilisateurPassword' => password_hash($utilisateurPassword, PASSWORD_DEFAULT),
                'sectionId' => $sectionId,
                'utilisateurAnnee' => $utilisateurAnnee
            ]);
            return $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }


    public function connecterUtilisateur($utilisateurEmail, $utilisateurMotDePasse)
    {
        try {
            $query = "SELECT * FROM utilisateur WHERE utilisateurEmail = :utilisateurEmail;";
            $connecterUtilisateur = $this->dbh->prepare($query);
            $connecterUtilisateur->execute([
                'utilisateurEmail' => $utilisateurEmail,
            ]);
            $user = $connecterUtilisateur->fetch();

            if ($user && password_verify($utilisateurMotDePasse, $user->utilisateurPassword)) {
                unset($user->utilisateurPassword);
                $_SESSION['user'] = $user;
                return true;
            }
            return false;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }
}
