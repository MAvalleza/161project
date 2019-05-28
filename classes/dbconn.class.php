<?php 

class dbConnect {

	private $hostname;
	private $username;
	private $password;
	private $dbname;

	public $connection;

	public function __construct() {
		$this->hostname = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "ipil_dormers";
	}


	public function connect() {
		$this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if(!$this->connection) {
			echo 'Connection problem!';
			exit();
		}
	}

	public function disconnect() {
		$this->connection->close();
		exit();
	}
}

?>