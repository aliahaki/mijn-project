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

public function create($data)
{
    $sql = "INSERT INTO horloges ( Merk
                                 ,Model
                                 ,Prijs
                                 ,Materiaal
                                 ,Gewicht
                                 ,Releasedatum
                                 ,Waterdichtheid
                                 ,Type
                                 ,UniekKenmerk
                                )
            VALUES (:merk,
                    :model,
                    :prijs,
                    :materiaal,
                    :gewicht,
                    :releasedatum,
                    :waterdichtheid,
                    :type,
                    :uniekkenmerk)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
    $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
    $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_INT);
    $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
    $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);

    return $this->db->execute();
}

  public function getHorlogeById($id)
  {
    $sql = "SELECT HRG.Id
                  ,HRG.Merk
                  ,HRG.Model
                  ,HRG.Prijs
                  ,HRG.Materiaal
                  ,HRG.Gewicht
                  ,DATE_FORMAT(HRG.Releasedatum, '%Y-%m-%d') AS Releasedatum
                  ,HRG.Waterdichtheid
                  ,HRG.Type
                  ,HRG.UniekKenmerk
            FROM Horloges AS HRG
            WHERE HRG.Id = :id";

    $this->db->query($sql);
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->single();
 }

 public function updateHorloge($request)
    {
        // var_dump($request);
        $sql = "UPDATE Horloges as HRG
                SET HRG.Merk = :merk,
                    HRG.Model = :model,
                    HRG.Prijs = :prijs,
                    HRG.Materiaal = :materiaal,
                    HRG.Gewicht = :gewicht,
                    HRG.Releasedatum = :releasedatum,
                    HRG.Waterdichtheid = :waterdichtheid,
                    HRG.Type = :type,
                    HRG.UniekKenmerk = :uniekkenmerk
                WHERE HRG.Id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_STR );
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR); 
        $this->db->bind(':waterdichtheid', $request['waterdichtheid'], PDO::PARAM_INT);
        $this->db->bind(':type', $request['type'], PDO::PARAM_STR);
        $this->db->bind(':uniekkenmerk', $request['uniekkenmerk'], PDO::PARAM_STR); 

        return $this->db->execute();
    }                    
 
} 
