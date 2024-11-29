<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserByID($user_ID)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE user_ID=?");
        $stmt->execute([$user_ID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loginUser($mail, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE mail=? and password=?");
        $stmt->execute([$mail, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser($name, $mail, $password, $pay_info, $address)
    {
        $stmt = $this->db->prepare("INSERT INTO user VALUES(NULL, ?, ?, ?, ?, ?, false)");
        $stmt->execute([$name, $mail, $password, $pay_info, $address]);
    }

    public function updateUser($user_ID, $mail, $password)
    {
        $stmt = $this->db->prepare("UPDATE user SET mail=?, password=? WHERE user_ID=?");
        $stmt->execute([$user_ID, $mail, $password]);
    }
}
