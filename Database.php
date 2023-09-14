<?php
class Database {
    private $conn;
    
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=moduleconnexionb2",'root','Dyane198124//');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function getConnection() {
        return $this->conn;
    }

	/**
	 * @return mixed
	 */
	public function getConn() {
		return $this->conn;
	}
	
	/**
	 * @param mixed $conn 
	 * @return self
	 */
	public function setConn($conn): self {
		$this->conn = $conn;
		return $this;
	}
}
?>
