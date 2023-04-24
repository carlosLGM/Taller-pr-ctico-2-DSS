<?php

class Tanques
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTanques()
    {
        $query = "SELECT * FROM tanques";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCantidadActual($tanque_id, $cantidad_actual)
    {
        $query = "UPDATE tanques SET cantidad_actual = :cantidad_actual WHERE id = :tanque_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':cantidad_actual', $cantidad_actual);
        $statement->bindParam(':tanque_id', $tanque_id);
        $statement->execute();
    }

    public function getCapacidad($tanque_id)
    {
        $query = "SELECT capacidad_galones FROM tanques WHERE id = :tanque_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':tanque_id', $tanque_id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['capacidad_galones'];
    }

    public function getCantidadActual($tanque_id)
    {
        $query = "SELECT cantidad_actual FROM tanques WHERE id = :tanque_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':tanque_id', $tanque_id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['cantidad_actual'];
    }

    public function rellenarTanques()
    {
        $query = "UPDATE tanques SET cantidad_actual = capacidad_galones";
        $this->db->query($query);
    }
}

