<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT ZNG.Id
                      ,ZNG.Naam
                      ,ZNG.Vermogen
                      ,ZNG.Nationaliteit
                      ,ZNG.Leeftijd
                      ,ZNG.Genre
                      ,ZNG.HitSong
                      ,DATE_FORMAT(ZNG.Releasedatum, "%d-%m-%Y") AS Releasedatum
                FROM Zangeressen AS ZNG
                ORDER BY ZNG.Vermogen DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

     public function delete($Id)
    {
        $sql = "DELETE
                 FROM Zangeressen
                 WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }


}