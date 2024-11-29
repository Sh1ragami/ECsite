<?php
class Database
{
    private $host = 'mysql311.phy.lolipop.lan';
    private $db_name = 'LAA1553851-ecdemo';
    private $username = 'LAA1553851';
    private $password = 'Pass0927';
    private $conn;

    // DB接続の作成
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
