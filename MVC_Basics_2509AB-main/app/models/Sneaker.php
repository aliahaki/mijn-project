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

     public function create($request)
    {
        $sql = "INSERT INTO sneakers ( Merk,
                                      Model,
                                      Type,
                                      Prijs,
                                      Materiaal,
                                      Gewicht,
                                      Releasedatum )
                VALUES (:merk,
                        :model,
                        :type,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $request['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT SNK.Id
                      ,SNK.Merk
                      ,SNK.Model
                      ,SNK.Type
                      ,SNK.Prijs
                      ,SNK.Materiaal
                      ,SNK.Gewicht
                      ,DATE_FORMAT(SNK.Releasedatum, "%Y-%m-%d") AS Releasedatum
                FROM Sneakers AS SNK
                WHERE SNK.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateSneaker($request)
    {
        //var_dump($_REQUEST);
        $sql = "UPDATE Sneakers AS SNK
                SET SNK.Merk = :merk,
                    SNK.Model = :model,
                    SNK.Type = :type,
                    SNK.Prijs = :prijs,
                    SNK.Materiaal = :materiaal,
                    SNK.Gewicht = :gewicht,
                    SNK.Releasedatum = :releasedatum
                WHERE SNK.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $request['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}    
