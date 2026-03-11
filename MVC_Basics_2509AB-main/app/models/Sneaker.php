<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT SNK.Id
                      ,SNK.Merk
                      ,SNK.Model
                      ,SNK.Type
                      ,SNK.Prijs
                      ,SNK.Materiaal
                      ,SNK.Gewicht
                      ,DATE_FORMAT(SNK.Releasedatum, "%d-%m-%Y") AS Releasedatum
                FROM Sneakers AS SNK
                ORDER BY SNK.Prijs DESC,
                         SNK.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($id)
{
    $sql = "DELETE FROM Sneakers WHERE Id = :id";

    $this->db->query($sql);

    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->execute();
}


}