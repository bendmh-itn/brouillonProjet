<?php

class sectionModel
{
    protected $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function selectAllSections()
    {
        try {
            $query = 'select * from section order by sectionId desc';
            $select = $this->dbh->prepare($query);
            $select->execute();
            $sections = $select->fetchAll();
            return $sections;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }

    public function selectMySections($utilisateurId)
    {
        try {
            $query = 'select * from utilisateur_section natural join section where utilisateurId = :utilisateurId';
            $select = $this->dbh->prepare($query);
            $select->execute([
                'utilisateurId' => $utilisateurId
            ]);
            $sections = $select->fetchAll();
            return $sections;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }
}
