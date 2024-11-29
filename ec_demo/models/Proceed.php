<?php
class Proceed
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllProceeds()
    {
        $stmt = $this->db->prepare("SELECT * FROM proceeds");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
