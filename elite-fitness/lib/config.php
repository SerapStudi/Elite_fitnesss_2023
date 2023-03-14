<?php
	class Config {
	  // Database Details
	  private const DBHOST = 'db5012281103.hosting-data.io';
	  private const DBUSER = 'dbu2619205';
	  private const DBPASS = 'SiteEliteFitness2023*@';
	  private const DBNAME = 'dbs10331785';
	  // Data Source Network
	  private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';
	  // conn variable
	  protected $conn = null;

	  // Constructor Function
	  public function __construct() {
	    try {
	      $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
	      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
	      die('Connectionn Failed : ' . $e->getMessage());
	    }
	    return $this->conn;
	  }


	}
	
	

?>