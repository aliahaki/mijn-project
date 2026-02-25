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
        $sql = 'SELECT ZNG.Naam
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
}