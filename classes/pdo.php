 
<?php 
	class Database
{
	private $host= "localhost";
	private $db=   "logbook_s";
	private $user= "root";
	private $pass= "root";
	private $charset= "utf8mb4";
	private $port= "3306";

	private $options = [
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES=>false,
	];

	private $pdo;
	private $dsn;

	public function InitConnection()
	{
		$this->dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset;port=$this->port";
		$this->pdo=null;

		try{
			$this->pdo=new PDO($this->dsn,$this->user,$this->pass,$this->options);
		} catch(\PDOException $e){
			throw new \PDOException($e->getMessage(),(Int)$e->getCode());
		}

		return $this->pdo;
	}
	}
	

	$connect=new Database();
	$db=$connect->InitConnection();

?>






 