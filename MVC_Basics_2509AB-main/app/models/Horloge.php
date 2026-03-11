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
        $sql = 'SELECT HRG.Id
                      ,HRG.Merk
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

    public function delete($id)
{
    $sql = "DELETE 
            FROM Horloges 
            WHERE Id = :id";

    $this->db->query($sql);
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->execute();
}
}