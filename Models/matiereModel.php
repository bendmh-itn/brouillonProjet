<?php

class matiereModel
{
    protected $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function selectAllMatieres()
    {
        try {
            $query = 'select * from matieres';
            $select = $this->dbh->prepare($query);
            $select->execute();
            $matieres = $select->fetchAll();
            return $matieres;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }

    public function selectMyMatieres($sectionId)
    {
        try {
            $query = 'select * from section_matieres natural join matieres where sectionId = :sectionId';
            $select = $this->dbh->prepare($query);
            $select->execute([
                'sectionId' => $sectionId
            ]);
            $matieres = $select->fetchAll();
            return $matieres;
        } catch (PDOException $e) {
            $message = $e->getMessage();
            die($message);
        }
    }
}
