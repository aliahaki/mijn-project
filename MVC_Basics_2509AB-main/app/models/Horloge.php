<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT HRG.Merk
                      ,HRG.Model
                      ,HRG.Prijs
                      ,HRG.Materiaal
                      ,HRG.Gewicht
                      ,DATE_FORMAT(HRG.Releasedatum, "%d-%m-%Y") AS Releasedatum
                      ,HRG.Waterdichtheid
                      ,HRG.Type
                      ,HRG.UniekKenmerk
                FROM Horloges AS HRG
                WHERE HRG.IsActief = 1
                ORDER BY HRG.Prijs DESC,
                         HRG.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}