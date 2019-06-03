<?php
/**
 * Gerenciador de base da dados
 */
class MySQL {

	private $host, $pass, $user, $db;
	private static $connection = null;
	private static $default = null;

	function __construct()
	{
		$mysql = unserialize(mysql);
		/**
		 * Dismember mysql var to your respective attributes
		 */
		$this->host = $mysql['host'];
		$this->db = $mysql['db'];
		$this->user = $mysql['user'];
		$this->pass = $mysql['pass'];
	}

	/**
	 * Sets the connection.
	 *
	 * @param      string   $host      The host
	 * @param      string   $database  The database
	 * @param      string   $user      The user
	 * @param      string   $pass      The pass
	 * @param      boolean  $default   Connection is default
	 */
	public function setConnection($host = '', $database = '', $user= '', $pass = '', $default = false)
	{
		$connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $pass);
		if($default) {
			self::$default = $connection;
		} else {
			self::$connection = $connection;
		}
	}

	/**
	 * Gets the connection.
	 *
	 * @param      boolean  $default  Connection is default
	 *
	 * @return     PDO   The connection.
	 */
	public function getConnection($default = true)
	{
		if($default) {
			if (is_null(self::$default)) {
				$this->setConnection($this->host, $this->db, $this->user, $this->pass, true);
			}
			return self::$default;
		} else {
			return self::$connection;
		}
	}

	/**
	 * Create a table to a data type indicated by name
	 *
	 * The use allows to view a columns and data type object, like as:
	 *
	 * <code> $tableName = 'categories';
	 *
	 * Example to object code: createTable(NAME, [OBJECT-NAME =>
	 * OBJECT-DATA-TYPE]);
	 *
	 * //single-line createTable($tablesName, ["id" =>
	 * "INT NOT NULL PRIMARY KEY"]);
	 *
	 * //multo-line createTable($tableName, [ "id" =>
	 * "INT NOT NULL PRIMARY KEY", "name" => "VARCHAR(32) NOT NULL",
	 * "description" => "TINYTEXT" ]); </code>
	 *
	 * Looking in the structure table <code> mysql> desc categories;
	 * +-------------+-------------+------+-----+---------+-------+
	 * | Field       | Type        | Null | Key | Default | Extra |
	 *   +-------------+-------------+------+-----+---------+-------+
	 * | id          | int(11)     | NO   | PRI | NULL    |       |
	 * | name        | varchar(32) | NO   |     | NULL    |       |
	 * | description | tinytext    | YES  |     | NULL    |       |
	 *   +-------------+-------------+------+-----+---------+-------+ 3 rows in
	 *   set (0.04 sec) </code>
	 *
	 * @param      string  $tableName  A object table name
	 * @param      array   $columns    data type objects
	 */
	public function createTable($tableName, $columns = [])
	{
		$datatypes = '';
		$delimiter = ", ";
		/**
		 * Convert the Array to String, $datatypes = $columns[index][value] $delimieter ...
		 */
		foreach ($columns as $column => $datatype) {
			$datatypes .= "`{$column}` {$datatype}{$delimiter}";
		}
		/**
		 * Verify that the end of the string is the $delimiter and 
		 * remove the $delimiter from the string
		 */
		if (substr($datatypes, -strlen($delimiter)) === $delimiter) {
			$datatypes = substr($datatypes, 0, -strlen($delimiter));
		}
		/**
		 * Create a table
		 */
		$this->execute("CREATE TABLE IF NOT EXISTS `{$tableName}` ({$datatypes})");
	}

	/**
	 * Execute a prepare statment
	 *
	 * @param      sring   $sql      The strutured query
	 * @param      array    $params   The parameters
	 * @param      boolean  $default  Is connection default
	 *
	 * @return     array   ( All characteristics object )
	 */
	public function execute($sql, $params = [], $default = true)
	{
		$stmt = $this->getConnection($default)->prepare($sql);
		foreach($params as $param => $value) {
			$value = $this->test_input($value);
			$stmt->bindValue($param, $value);
		}
		$stmt->execute();
		return $stmt->fetchAll();
	}

	/**
	 * test input form
	 *
	 * @param      string  $param  The parameter
	 *
	 * @return     string  ( string tested )
	 */
	public function test_input($param)
	{
		$param = trim($param);
		$param = stripslashes($param);
		$param = htmlspecialchars($param);
		return $param;
	}
}