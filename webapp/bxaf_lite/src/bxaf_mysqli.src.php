<?php

/**
 * Heavily modified and enhanced from SafeMySQL by Ron Zhu, BioInfoRx, Inc.
 * Last modified on June 28, 2017
 *
 * 2017-06-28: Updated error() to replace the second parameter from E_USER_ERROR to E_USER_WARNING so that the program does not stop when error is;
 * 2017-01-16: enhancement of error(), execute trigger_error() on error. To show errors on browser, add this line: ini_set('display_errors', '1');
 * 2017-01-16: enhancement of prepare_query(), ensure the number of passed parameters matches the number of placeholders, if no parameters are passed, return raw SQL directly
 * 2016-12-09: enhancement of GetAssoc(), allow duplicated field names in SQL, e.g., SELECT `ID`, `ID` FROM `mytable`
 * 2016-11-22: Added get_field_names(), get_value(), get_values(), get_assoc_all().
 * 2016-08-26: Updated get_table_names(), get_column_names(), update(), update_batch(), insert(), insert_batch(), replace(), replace_batch(). Added routine to check if table exists and field names are valid.
 * 2016-08-22: Updated get_id() function by adding "$sql .= " ORDER BY `ID` DESC";" so that it will return the last ID by default.
 *
 *
 * Public functions:
 *
 public function query()
* Examples:
* $result = $db->query("DELETE FROM table WHERE id=?i", $id);

public function Execute()

public function fetch($result)

public function affected_rows()

public function insert_id()

public function num_rows($result)

public function field_count($result)
public function num_fields($result)

public function free($result)


public function get_one()
public function GetOne()
* Examples:
* $name = $db->get_one("SELECT name FROM table WHERE id=1");
* $name = $db->get_one("SELECT name FROM table WHERE id=?i", $id);


public function get_row()
public function GetRow()
* Examples:
* $data = $db->get_row("SELECT * FROM table WHERE id=1");
* $data = $db->get_one("SELECT * FROM table WHERE id=?i", $id);
*


public function get_col()
public function GetCol()
* Examples:
* $ids = $db->get_col("SELECT id FROM table WHERE cat=1");
* $ids = $db->get_col("SELECT id FROM tags WHERE tagname = ?s", $tag);


public function get_all()
public function GetAll()
public function GetArray()
* Examples:
* $data = $db->get_all("SELECT * FROM table");
* $data = $db->get_all("SELECT * FROM table LIMIT ?i,?i", $start, $rows);


public function get_assoc()
public function get_assoc_all()
* Examples:
* $data = $db->get_assoc("id", "SELECT * FROM table");
* $data = $db->get_assoc("id", "SELECT * FROM table LIMIT ?i,?i", $start, $rows);

public function GetAssoc()
* Examples:
* $data = $db->GetAssoc("SELECT * FROM table");
* $data = $db->GetAssoc("SELECT * FROM table LIMIT ?i,?i", $start, $rows);

public function get_assoc_col()
public function GetAssocCol()
* Examples:
* $data = $db->get_assoc_col("name", "SELECT name, id FROM cities");



public function parse()
* Examples:
* $query = $db->parse("SELECT * FROM table WHERE foo=?s AND bar=?s", $foo, $bar);
* echo $query;
*
* if ($foo) {
*     $qpart = $db->parse(" AND foo=?s", $foo);
* }
* $data = $db->get_all("SELECT * FROM table WHERE bar=?s ?p", $bar, $qpart);


public function white_list($input,$allowed,$default=FALSE)
* Example:
* $order = $db->white_list($_GET['order'], array('name','price'));
* $dir   = $db->white_list($_GET['dir'],   array('ASC','DESC'));
* if (!$order || !dir) {
*     throw new http404(); //non-expected values should cause 404 or similar response
* }
* $sql  = "SELECT * FROM table ORDER BY ?p ?p LIMIT ?i,?i"
* $data = $db->getArr($sql, $order, $dir, $start, $per_page);


public function filter_array($input,$allowed)
* Example:
* $allowed = array('title','url','body','rating','term','type');
* $data    = $db->filter_array($_POST,$allowed);
* $sql     = "INSERT INTO ?n SET ?u";
* $db->query($sql,$table,$data);


public function last_query()

public function get_stats()

public function get_id()
public function get_ids()
* Examples:
* $one_id = $db->get_id("table_name", "`name` = 'test'");
* $id_list = $db->get_ids("table_name", "`name` = 'test'");

public function get_value()
public function get_values()
* Examples:
* $one_id = $db->get_value("table_name", 'field_name', "`id` = 3");
* $id_list = $db->get_values("table_name", 'field_name', "`id` = 3");

public function delete()
* Examples:
* $data = $db->delete("table_name", "`id` = 4");
* $data = $db->delete("table_name", "?n = ?s", 'name', '123');


public function update()
* Examples:
* $field_values = array('name'=>'Name1', 'pid'=>'4');
* $condition = "`id` = 3";
* $data = $db->update("table_name", $field_values, $condition);
* $data = $db->update("table_name", $field_values, "?n = ?s", 'name', '123');


public function update_batch()
public function batch_update()
public function updateBatch()
public function batchUpdate()
* Examples:
* $field_values = array(array('id'=>111, 'name'=>'Name1', 'pid'=>'4'), array('id'=>112, 'name'=>'Name2', 'pid'=>'4'), array('id'=>113, 'name'=>'Name3', 'pid'=>'4'));
* $condition = "`id` > 100";
* $data = $db->update_batch("table_name", 'id', $field_values, $condition);



public function insert()
public function replace()
* Examples:
* $field_values = array('id'=>111, 'name'=>'Name1', 'pid'=>'4');
* $condition = "`id` > 100";
* $data = $db->insert("table_name", $field_values, $condition);


public function insert_batch()
public function insertBatch()
public function batch_insert()
public function batchInsert()
* Examples:
* $field_values = array(array('id'=>111, 'name'=>'Name1', 'pid'=>'4'), array('id'=>112, 'name'=>'Name2', 'pid'=>'4'), array('id'=>113, 'name'=>'Name3', 'pid'=>'4'));
* $condition = "`id` > 100";
* $data = $db->insert_batch("table_name", $field_values, $condition);


public function replace_batch()
public function batchReplace()
public function replaceBatch()
public function batch_replace()


public function MetaTables($type = 'TABLES')

public function get_column_names($table)
public function get_field_names($table)
public function MetaColumnNames($table)
* Examples:
* $column_names = $db->get_column_names('Table_Name');
* $column_names = $db->MetaColumnNames('Table_Name');

public function get_fetch_mode()
public function set_fetch_mode($mode)

public function SetFetchMode($mode)

public function get_conn()

public function ping()

public function IsConnected()



 *
 *
 *
 * @link https://github.com/colshrapnel/safemysql/blob/master/safemysql.class.php
 *
 * Safe and convenient way to handle SQL queries utilizing type-hinted placeholders.
 *
 * Key features
 * - set of helper functions to get the desired result right out of query, like in PEAR::DB
 * - conditional query building using parse() method to build queries of whatever comlexity,
 *   while keeping extra safety of placeholders
 * - type-hinted placeholders
 *
 *  Type-hinted placeholders are great because
 * - safe, as any other [properly implemented] placeholders
 * - no need for manual escaping or binding, makes the code extra DRY
 * - allows support for non-standard types such as identifier or array, which saves A LOT of pain in the back.
 *
 * Supported placeholders at the moment are:
 *
 * ?s ("string")  - strings (also DATE, FLOAT and DECIMAL)
 * ?i ("integer") - the name says it all
 * ?n ("name")    - identifiers (table and field names)
 * ?a ("array")   - complex placeholder for IN() operator  (substituted with string of 'a','b','c' format, without parentesis)
 * ?u ("update")  - complex placeholder for SET operator (substituted with string of `field`='value',`field`='value' format)
 * and
 * ?p ("parsed") - special type placeholder, for inserting already parsed statements without any processing, to avoid double parsing.
 *
 * Connection:
 *
 * $db = new bxaf_mysqli(); // with default settings
 *
 * $opts = array(
 *		'user'    => 'user',
 *		'pass'    => 'pass',
 *		'db'      => 'db'
 * );
 * $db = new bxaf_mysqli($opts); // with some of the default settings overwritten
 *
 * Alternatively, you can just pass an existing mysqli instance that will be used to run queries
 * instead of creating a new connection.
 * Excellent choice for migration!
 *
 * $db = new bxaf_mysqli(['mysqli' => $mysqli]);
 *
 * Some examples:
 *
 * $name = $db->get_one('SELECT name FROM table WHERE id = ?i',$_GET['id']);
 * $data = $db->get_assoc('id','SELECT * FROM ?n WHERE id IN ?a','table', array(1,2));
 * $data = $db->get_all("SELECT * FROM ?n WHERE mod=?s LIMIT ?i",$table,$mod,$limit);
 *
 * $ids  = $db->get_col("SELECT id FROM tags WHERE tagname = ?s",$tag);
 * $data = $db->get_all("SELECT * FROM table WHERE category IN (?a)",$ids);
 *
 * $data = array('field1' => $value1, 'field2' => $value2);
 * $sql  = "INSERT INTO stats SET dt=CURDATE(),?u ON DUPLICATE KEY UPDATE ?u";
 * $db->query($sql,$data,$data);
 *
 * if ($var === NULL) {
 *     $sqlpart = "field is NULL";
 * } else {
 *     $sqlpart = $db->parse("field = ?s", $var);
 * }
 * $data = $db->get_all("SELECT * FROM table WHERE ?p", $bar, $sqlpart);
 *
 */

if (! defined('ADODB_FETCH_NUM')) define("ADODB_FETCH_NUM", 1);
if (! defined('ADODB_FETCH_ASSOC')) define("ADODB_FETCH_ASSOC", 2);

class bxaf_mysqli
{

	private $conn;
	private $stats;
	private $show_error;
	private $error_output;
	private $fetch_mode; // MYSQLI_ASSOC, MYSQLI_NUM

	private $defaults = array(
		'host'      => '127.0.0.1',
		'user'      => 'root',
		'pass'      => '',
		'db'        => 'test',
		'port'      => 3306,
		'socket'    => NULL,
		'pconnect'  => TRUE,
		'fetch_mode'  => MYSQLI_ASSOC,
		'flags'  	=> NULL, //MYSQLI_CLIENT_COMPRESS | MYSQLI_CLIENT_FOUND_ROWS | MYSQLI_CLIENT_IGNORE_SPACE | MYSQLI_CLIENT_INTERACTIVE | MYSQLI_CLIENT_SSL
		'charset'   => 'utf8',
		'show_error' => 0, //0 for hiding errors or 1 for outputing errors in errors.txt
		'error_output' => 'bxaf_mysqli.errors.txt' //Error output file
	);



	function __construct($opt = array())
	{
		$opt = array_merge($this->defaults, $opt);

		$this->show_error  = $opt['show_error'];
		$this->error_output  = $opt['error_output'];

		if($opt['fetch_mode'] == MYSQLI_NUM) $this->fetch_mode = MYSQLI_NUM;
		else $this->fetch_mode  = MYSQLI_ASSOC;

		if (isset($opt['mysqli']))
		{
			if ($opt['mysqli'] instanceof mysqli)
			{
				$this->conn = $opt['mysqli'];
				return;

			} else {

				$this->error("mysqli option must be valid instance of mysqli class");
			}
		}


		if (($opt['host'] == 'localhost') || ($opt['host'] == '127.0.0.1')){
			if($opt['pconnect']) $opt['host'] = "p:".$opt['host'];

			$this->conn = mysqli_connect($opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port'], $opt['socket']);

			if (mysqli_connect_errno()) {
				die("Connect failed: %s\n" . mysqli_connect_error());
			}

			if ( ! $this->conn ){
				$this->error(mysqli_connect_errno() . " ". mysqli_connect_error());
			}

		}
		else {
			if($opt['pconnect']) $opt['host'] = "p:".$opt['host'];

			$this->conn = mysqli_init();

			if ($this->conn){
				if ( ! mysqli_real_connect($this->conn, $opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port'], $opt['socket'], $opt['flags']) ){
					$this->error(mysqli_connect_errno() . " ". mysqli_connect_error());
				}
			}
			else {
				die('mysqli_init failed.');
			}
		}


		mysqli_set_charset($this->conn, $opt['charset']) or $this->error(mysqli_error($this->conn));
		unset($opt); // I am paranoid
	}



	/**
	 * Conventional function to run a query with placeholders. A mysqli_query wrapper with placeholders support
	 *
	 * Examples:
	 * $result = $db->query("DELETE FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return resource|FALSE whatever mysqli_query returns
	 */
	public function query()
	{
		return $this->raw_query($this->prepare_query(func_get_args()));
	}
	public function Execute()
	{
		return $this->raw_query($this->prepare_query(func_get_args()));
	}

	/**
	 * Conventional function to fetch single row.
	 *
	 * @param resource $result - mysqli result
	 * @return array|FALSE whatever mysqli_fetch_array returns
	 */
	public function fetch($result)
	{
		$mode = $this->fetch_mode == MYSQLI_NUM ? MYSQLI_NUM : MYSQLI_ASSOC;
		return mysqli_fetch_array($result, $mode);
	}

	/**
	 * Conventional function to get number of affected rows.
	 *
	 * @return int whatever mysqli_affected_rows returns
	 */
	public function affected_rows()
	{
		return mysqli_affected_rows ($this->conn);
	}

	/**
	 * Conventional function to get last insert id.
	 *
	 * @return int whatever mysqli_insert_id returns
	 */
	public function insert_id()
	{
		return mysqli_insert_id($this->conn);
	}

	/**
	 * Conventional function to get number of rows and columns in the resultset.
	 *
	 * @param resource $result - mysqli result
	 * @return int whatever mysqli_num_rows returns
	 */
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
	public function field_count($result)
	{
		return mysqli_num_fields($result);
	}
	public function num_fields($result)
	{
		return mysqli_num_fields($result);
	}

	/**
	 * Conventional function to free the resultset.
	 */
	public function free($result)
	{
		mysqli_free_result($result);
	}

	/**
	 * Helper function to get scalar value right out of query and optional arguments
	 *
	 * Examples:
	 * $name = $db->get_one("SELECT name FROM table WHERE id=1");
	 * $name = $db->get_one("SELECT name FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return string|FALSE either first column of the first row of resultset or FALSE if none found
	 */
	public function get_one()
	{
		$query = $this->prepare_query(func_get_args());
		if ($res = $this->raw_query($query))
		{
			$row = $this->fetch($res);
			if (is_array($row)) {
				return reset($row);
			}
			$this->free($res);
		}
		return FALSE;
	}
	public function GetOne()
	{
		return $this->get_one($this->prepare_query(func_get_args()));
	}

	/**
	 * Helper function to get single row right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->get_row("SELECT * FROM table WHERE id=1");
	 * $data = $db->get_one("SELECT * FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array|FALSE either associative array contains first row of resultset or FALSE if none found
	 */
	public function get_row()
	{
		$query = $this->prepare_query(func_get_args());
		if ($res = $this->raw_query($query)) {
			$ret = $this->fetch($res);
			$this->free($res);
			return $ret;
		}
		return FALSE;
	}
	public function GetRow()
	{
		return $this->get_row($this->prepare_query(func_get_args()));
	}

	/**
	 * Helper function to get single column right out of query and optional arguments
	 *
	 * Examples:
	 * $ids = $db->get_col("SELECT id FROM table WHERE cat=1");
	 * $ids = $db->get_col("SELECT id FROM tags WHERE tagname = ?s", $tag);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array|FALSE either enumerated array of first fields of all rows of resultset or FALSE if none found
	 */
	public function get_col()
	{
		$ret   = array();
		$query = $this->prepare_query(func_get_args());
		if ( $res = $this->raw_query($query) )
		{
			while($row = $this->fetch($res))
			{
				$ret[] = reset($row);
			}
			$this->free($res);
		}
		return $ret;
	}
	public function GetCol()
	{
		return $this->get_col($this->prepare_query(func_get_args()));
	}




	/**
	 * Helper function to get all the rows of resultset right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->get_all("SELECT * FROM table");
	 * $data = $db->get_all("SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array enumerated 2d array contains the resultset. Empty if no rows found.
	 */
	public function get_all()
	{
		$ret   = array();
		$query = $this->prepare_query(func_get_args());
		if ( $res = $this->raw_query($query) )
		{
			if($this->fetch_mode == MYSQLI_NUM) while($row = $res->fetch_row()) $ret[] = $row;
			else while($row = $res->fetch_assoc()) $ret[] = $row;
			$this->free($res);
		}
		return $ret;
	}

	public function GetAll()
	{
		return $this->get_all($this->prepare_query(func_get_args()));
	}
	public function GetArray()
	{
		return $this->get_all($this->prepare_query(func_get_args()));
	}

	/**
	 * Helper function to get all the rows of resultset into indexed array right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->get_assoc("id", "SELECT * FROM table");
	 * $data = $db->get_assoc("id", "SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $index - name of the field which value is used to index resulting array
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative 2d array contains the resultset. Empty if no rows found.
	 */
	public function get_assoc()
	{
		$args  = func_get_args();
		$index = array_shift($args);
		$query = $this->prepare_query($args);

		$ret = array();
		if ( $res = $this->raw_query($query) )
		{
			$num_fields = $this->num_fields($res);

			if($num_fields <= 1){
				//return empty array()
			}
			else if($num_fields == 2){
				while($row = $this->fetch($res))
				{
					if(array_key_exists($index, $row)){
						$key = $row[$index];
						unset($row[$index]);
						$value = array_pop($row);
						$ret[$key] = $value;
					}
				}
			}
			else {
				while($row = $this->fetch($res))
				{
					if(array_key_exists($index, $row)){
						$key = $row[$index];
						unset($row[$index]);
						$ret[$key] = $row;
					}
				}
			}

			$this->free($res);
		}
		return $ret;
	}

	/**
	 * Helper function to get all the rows of resultset into indexed array right out of query and optional arguments
	 * The differnce of get_assoc_all() vs get_assoc() is that get_assoc_all() return all fields in the value of assoicated array, get_assoc() does not have the key field in the value array
	 *
	 * Examples:
	 * $data = $db->get_assoc_all("id", "SELECT * FROM table");
	 * $data = $db->get_assoc_all("id", "SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $index - name of the field which value is used to index resulting array
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative 2d array contains the resultset. Empty if no rows found.
	 */
	public function get_assoc_all()
	{
		$args  = func_get_args();
		$index = array_shift($args);
		$query = $this->prepare_query($args);

		$ret = array();
		if ( $res = $this->raw_query($query) )
		{
			$num_fields = $this->num_fields($res);

			if($num_fields <= 1){
				//return empty array()
			}
			else if($num_fields == 2){
				while($row = $this->fetch($res))
				{
					if(array_key_exists($index, $row)){
						$key = $row[$index];
						unset($row[$index]);
						$value = array_pop($row);
						$ret[$key] = $value;
					}
				}
			}
			else {
				while($row = $this->fetch($res))
				{
					if(array_key_exists($index, $row)){
						$key = $row[$index];
						$ret[$key] = $row;
					}
				}
			}

			$this->free($res);
		}
		return $ret;
	}

	/**
	 * Helper function to get all the rows of resultset into indexed array right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->GetAssoc("SELECT * FROM table");
	 * $data = $db->GetAssoc("SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative 2d array contains the resultset. The first column is the key/index. Empty if no rows found.
	 * Notice that, GetAssoc() is different from get_assoc() in that, get_assoc() has a field name as the first parameter
	 */
	public function GetAssoc()
    {
        $query = $this->prepare_query(func_get_args());

        $ret = array();

        if ($res = $this->raw_query($query)) {
            $num_fields = $this->num_fields($res);

            if ($num_fields <= 1) {

                   //return empty array()
            } elseif ($num_fields == 2) {
                while ($row = $this->fetch($res)) {
                    if (is_array($row) && sizeof($row) == 1) {
                        $second = array_pop($row);

                        $ret[$second] = $second;
                    } else {
                        $second = array_pop($row);

                        $first = array_pop($row);

                        $ret[$first] = $second;
                    }
                }
            } else {
                while ($row = $this->fetch($res)) {
                    $first = array_shift($row);

                    $ret[$first] = $row;
                }
            }

            $this->free($res);
        }

        return $ret;
    }

	/**
	 * Helper function to get a dictionary-style array right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->get_assoc_col("name", "SELECT name, id FROM cities");
	 *
	 * @param string $index - name of the field which value is used to index resulting array
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative array contains key=value pairs out of resultset. Empty if no rows found.
	 */
	public function get_assoc_col()
	{
		$args  = func_get_args();
		$index = array_shift($args);
		$query = $this->prepare_query($args);

		$ret = array();
		if ( $res = $this->raw_query($query) )
		{
			while($row = $this->fetch($res))
			{
				$key = $row[$index];
				unset($row[$index]);
				$ret[$key] = reset($row);
			}
			$this->free($res);
		}
		return $ret;
	}
	public function GetAssocCol()
	{
		return $this->get_assoc_col($this->prepare_query(func_get_args()));
	}




	/**
	 * Function to parse placeholders either in the full query or a query part
	 * unlike native prepared statements, allows ANY query part to be parsed
	 *
	 * useful for debug
	 * and EXTREMELY useful for conditional query building
	 * like adding various query parts using loops, conditions, etc.
	 * already parsed parts have to be added via ?p placeholder
	 *
	 * Examples:
	 * $query = $db->parse("SELECT * FROM table WHERE foo=?s AND bar=?s", $foo, $bar);
	 * echo $query;
	 *
	 * if ($foo) {
	 *     $qpart = $db->parse(" AND foo=?s", $foo);
	 * }
	 * $data = $db->get_all("SELECT * FROM table WHERE bar=?s ?p", $bar, $qpart);
	 *
	 * @param string $query - whatever expression contains placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the expression
	 * @return string - initial expression with placeholders substituted with data.
	 */
	public function parse()
	{
		return $this->prepare_query(func_get_args());
	}

	/**
	 * function to implement whitelisting feature
	 * sometimes we can't allow a non-validated user-supplied data to the query even through placeholder
	 * especially if it comes down to SQL OPERATORS
	 *
	 * Example:
	 *
	 * $order = $db->white_list($_GET['order'], array('name','price'));
	 * $dir   = $db->white_list($_GET['dir'],   array('ASC','DESC'));
	 * if (!$order || !dir) {
	 *     throw new http404(); //non-expected values should cause 404 or similar response
	 * }
	 * $sql  = "SELECT * FROM table ORDER BY ?p ?p LIMIT ?i,?i"
	 * $data = $db->getArr($sql, $order, $dir, $start, $per_page);
	 *
	 * @param string $input   - field name to test
	 * @param  array  $allowed - an array with allowed variants
	 * @param  string $default - optional variable to set if no match found. Default to false.
	 * @return string|FALSE    - either sanitized value or FALSE
	 */
	public function white_list($input,$allowed,$default=FALSE)
	{
		$found = array_search($input,$allowed);
		return ($found === FALSE) ? $default : $allowed[$found];
	}

	/**
	 * function to filter out arrays, for the whitelisting purposes
	 * useful to pass entire superglobal to the INSERT or UPDATE query
	 * OUGHT to be used for this purpose,
	 * as there could be fields to which user should have no access to.
	 *
	 * Example:
	 * $allowed = array('title','url','body','rating','term','type');
	 * $data    = $db->filter_array($_POST,$allowed);
	 * $sql     = "INSERT INTO ?n SET ?u";
	 * $db->query($sql,$table,$data);
	 *
	 * @param  array $input   - source array
	 * @param  array $allowed - an array with allowed field names
	 * @return array filtered out source array
	 */
	public function filter_array($input,$allowed)
	{
		foreach(array_keys($input) as $key )
		{
			if ( !in_array($key,$allowed) )
			{
				unset($input[$key]);
			}
		}
		return $input;
	}

	/**
	 * Function to get last executed query.
	 *
	 * @return string|NULL either last executed query or NULL if were none
	 */
	public function last_query()
	{
		$last = end($this->stats);
		return $last['query'];
	}

	/**
	 * Function to get all query statistics.
	 *
	 * @return array contains all executed queries with timings and errors
	 */
	public function get_stats()
	{
		return $this->stats;
	}





	/**
	 * Helper function to select ids right out of query and optional arguments
	 *
	 * Examples:
	 * $one_id = $db->get_value("table_name", "field_name", "`id` = 3");
	 *
	 * @param string $table_name - name of the table
	 * @param string $field_name - name of the table
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function get_value()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field = array_shift($args);
		$condition = $this->prepare_query($args);

		$columns = $this->get_column_names($table);
		if(! is_array($columns) || count($columns) <= 0) return false;
		if(! in_array($field, $columns)) return false;

		$sql = "SELECT ?n FROM ?n ";
		if(trim($condition) != '') $sql .= " WHERE ?p";
		$sql .= " ORDER BY `ID` DESC";

		return $this->get_one($sql, $field, $table, $condition);
	}
	public function GetValue()
	{
		return $this->get_value($this->prepare_query(func_get_args()));
	}

	/**
	 * Helper function to select ids right out of query and optional arguments
	 *
	 * Examples:
	 * $id_list = $db->get_ids("table_name", "field_name", "`name` = 'test'");
	 *
	 * @param string $table_name - name of the table
	 * @param string $field_name - name of the table
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function get_values()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field = array_shift($args);
		$condition = $this->prepare_query($args);

		$columns = $this->get_column_names($table);
		if(! is_array($columns) || count($columns) <= 0) return false;
		if(! in_array($field, $columns)) return false;

		$sql = "SELECT ?n FROM ?n ";
		if(trim($condition) != '') $sql .= " WHERE ?p";
		$sql .= " ORDER BY `ID` DESC";

		return $this->get_col($sql, $field, $table, $condition);
	}
	public function GetValues()
	{
		return $this->get_values($this->prepare_query(func_get_args()));
	}




	/**
	 * Helper function to select ids right out of query and optional arguments
	 *
	 * Examples:
	 * $one_id = $db->get_id("table_name", "`name` = 'test'");
	 *
	 * @param string $table_name - name of the table
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function get_id()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$condition = $this->prepare_query($args);

		$sql = "SELECT `ID` FROM ?n ";
		if(trim($condition) != '') $sql .= " WHERE ?p";
		$sql .= " ORDER BY `ID` DESC";

		return $this->get_one($sql, $table, $condition);
	}

	/**
	 * Helper function to select ids right out of query and optional arguments
	 *
	 * Examples:
	 * $id_list = $db->get_ids("table_name", "`name` = 'test'");
	 *
	 * @param string $table_name - name of the table
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function get_ids()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$condition = $this->prepare_query($args);

		$sql = "SELECT `ID` FROM ?n ";
		if(trim($condition) != '') $sql .= " WHERE ?p";

		return $this->get_col($sql, $table, $condition);
	}




	/**
	 * Helper function to delete records right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->delete("table_name", "`id` = 4");
	 * $data = $db->delete("table_name", "?n = ?s", 'name', '123');
	 *
	 * @param string $table_name - name of the table
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function delete()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$condition = $this->prepare_query($args);

		$sql = "DELETE FROM ?n WHERE ?p";
		$query = $this->parse($sql, $table, $condition);

		$affected_rows = 0;
		if ($res = $this->raw_query($query))
		{
			$affected_rows = $this->affected_rows();
			$this->free($res);
		}
		return $this->affected_rows();
	}


	/**
	 * Helper function to delete records right out of query and optional arguments
	 *
	 * Examples:
	 * $field_values = array('name'=>'Name1', 'pid'=>'4');
	 * $condition = "`id` = 3";
	 * $data = $db->update("table_name", $field_values, $condition);
	 * $data = $db->update("table_name", $field_values, "?n = ?s", 'name', '123');
	 *
	 * @param string $table_name - name of the table
	 * @param string $field_values - associate array of field-value pairs
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function update()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;
		else {
			$columns = $this->get_column_names($table);
			if(! is_array($columns) || count($columns) <= 0) return false;
			foreach($field_values as $f=>$v) if(! in_array($f, $columns)) unset($field_values[$f]);
		}

		$condition = $this->prepare_query($args);

		$sql = "UPDATE ?n SET ?u WHERE ?p";
		$query = $this->parse($sql, $table, $field_values, $condition);

		$affected_rows = 0;
		if ($res = $this->raw_query($query))
		{
			$affected_rows = $this->affected_rows();
			$this->free($res);
		}
		return $this->affected_rows();
	}


	/**
	 * Helper function to delete records right out of query and optional arguments
	 *
	 * Examples:
	 * $field_values = array(array('id'=>111, 'name'=>'Name1', 'pid'=>'4'), array('id'=>112, 'name'=>'Name2', 'pid'=>'4'), array('id'=>113, 'name'=>'Name3', 'pid'=>'4'));
	 * $condition = "`id` > 100";
	 * $data = $db->update_batch("table_name", 'id', $field_values, $condition);
	 *
	 * @param string $table_name - name of the table
	 * @param string $key_field - name of the key field, must exist in the $field_values array
	 * @param string $field_values - 2-D array of field-value associate arrays
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function update_batch()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;

		$columns = $this->get_column_names($table);
		if(! is_array($columns) || count($columns) <= 0) return false;

		//Do not update if the key field does not exist
		if(! in_array($field, $columns)) return false;



		$condition = $this->prepare_query($args);

		$affected_rows = 0;
		foreach($field_values as $field_value){
			if(! is_array($field_value) || count($field_value) <= 0 ) continue;

			//Remove extra values
			foreach($field_value as $f=>$v) if(! in_array($f, $columns)) unset($field_value[$f]);

			//Do not update if the key field does not exist
			if(! array_key_exists($field, $field_value)) continue;

			$cond = "?n = ?s";
			if(trim($condition) != '') $cond .= " AND ?p";
			$cond = $this->parse($cond, $field, $field_value[$field], $condition);

			unset($field_value[$field]);

			$sql = "UPDATE ?n SET ?u";
			if(trim($cond) != '') $sql .= " WHERE ?p";

			$query = $this->parse($sql, $table, $field_value, $cond);

			if ($res = $this->raw_query($query))
			{
				$affected_rows += $this->affected_rows();
				$this->free($res);
			}
		}

		return $affected_rows;
	}

	public function batch_update()
	{
		return $this->update_batch($this->prepare_query(func_get_args()));
	}

	public function updateBatch()
	{
		return $this->update_batch($this->prepare_query(func_get_args()));
	}

	public function batchUpdate()
	{
		return $this->update_batch($this->prepare_query(func_get_args()));
	}


	/**
	 * Helper function to delete records right out of query and optional arguments
	 *
	 * Examples:
	 * $field_values = array('id'=>111, 'name'=>'Name1', 'pid'=>'4');
	 * $condition = "`id` > 100";
	 * $data = $db->insert("table_name", $field_values, $condition);
	 *
	 * @param string $table_name - name of the table
	 * @param string $field_values - associate array of field-value pairs
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function insert()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;
		else {
			$columns = $this->get_column_names($table);
			if(! is_array($columns) || count($columns) <= 0) return false;
			foreach($field_values as $f=>$v) if(! in_array($f, $columns)) unset($field_values[$f]);
		}

		$condition = $this->prepare_query($args);

		$sql = "INSERT INTO ?n SET ?u";
		if(trim($condition) != '') $sql .= " WHERE ?p";
		$query = $this->parse($sql, $table, $field_values, $condition);

		$insert_id = 0;
		if ($res = $this->raw_query($query))
		{
			$insert_id = $this->insert_id();
			$this->free($res);
		}

		return $insert_id;
	}

	public function replace()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;
		else {
			$columns = $this->get_column_names($table);
			if(! is_array($columns) || count($columns) <= 0) return false;
			foreach($field_values as $f=>$v) if(! in_array($f, $columns)) unset($field_values[$f]);
		}

		$condition = $this->prepare_query($args);

		$sql = "REPLACE INTO ?n SET ?u";
		if(trim($condition) != '') $sql .= " WHERE ?p";
		$query = $this->parse($sql, $table, $field_values, $condition);

		$insert_id = 0;
		if ($res = $this->raw_query($query))
		{
			$insert_id = $this->insert_id();
			$this->free($res);
		}

		return $insert_id;
	}


	/**
	 * Helper function to delete records right out of query and optional arguments
	 *
	 * Examples:
	 * $field_values = array(array('id'=>111, 'name'=>'Name1', 'pid'=>'4'), array('id'=>112, 'name'=>'Name2', 'pid'=>'4'), array('id'=>113, 'name'=>'Name3', 'pid'=>'4'));
	 * $condition = "`id` > 100";
	 * $data = $db->insert_batch("table_name", $field_values, $condition);
	 *
	 * @param string $table_name - name of the table
	 * @param string $field_values - 2-D array of field-value associate arrays
	 * @param string $condition - a SQL statement with placeholders after WHERE
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the SQL statement
	 * @return number - number of afftected rows.
	 */
	public function insert_batch()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;

		$columns = $this->get_column_names($table);
		if(! is_array($columns) || count($columns) <= 0) return false;

		$condition = $this->prepare_query($args);

		$insert_ids = array();
		foreach($field_values as $field_value){
			if(! is_array($field_value) || count($field_value) <= 0 ) continue;

			//Remove extra values
			foreach($field_value as $f=>$v) if(! in_array($f, $columns)) unset($field_value[$f]);

			$sql = "INSERT INTO ?n SET ?u";
			if(trim($condition) != '') $sql .= " WHERE ?p";

			$query = $this->parse($sql, $table, $field_value, $condition);

			if ($res = $this->raw_query($query))
			{
				$id = $this->insert_id();
				if($id > 0) $insert_ids[] = $id;

				$this->free($res);
			}

		}

		return $insert_ids;
	}
	public function insertBatch()
	{
		return $this->insert_batch($this->prepare_query(func_get_args()));
	}
	public function batch_insert()
	{
		return $this->insert_batch($this->prepare_query(func_get_args()));
	}
	public function batchInsert()
	{
		return $this->insert_batch($this->prepare_query(func_get_args()));
	}

	public function replace_batch()
	{
		$args = func_get_args();
		$table = array_shift($args);
		$field_values = array_shift($args);

		$tables = $this->get_table_names();
		if(! is_array($tables) || count($tables) <= 0 || ! in_array($table, $tables)) return false;

		if(! is_array($field_values) || count($field_values) <= 0 ) return false;

		$columns = $this->get_column_names($table);
		if(! is_array($columns) || count($columns) <= 0) return false;

		$condition = $this->prepare_query($args);

		$insert_ids = array();
		foreach($field_values as $field_value){
			if(! is_array($field_value) || count($field_value) <= 0 ) continue;

			//Remove extra values
			foreach($field_value as $f=>$v) if(! in_array($f, $columns)) unset($field_value[$f]);

			$sql = "REPLACE INTO ?n SET ?u";
			if(trim($condition) != '') $sql .= " WHERE ?p";

			$query = $this->parse($sql, $table, $field_value, $condition);
			if ($res = $this->raw_query($query))
			{
				$id = $this->insert_id();
				if($id > 0) $insert_ids[] = $id;

				$this->free($res);
			}
		}

		return $insert_ids;
	}
	public function batchReplace()
	{
		return $this->replace_batch($this->prepare_query(func_get_args()));
	}
	public function replaceBatch()
	{
		return $this->replace_batch($this->prepare_query(func_get_args()));
	}
	public function batch_replace()
	{
		return $this->replace_batch($this->prepare_query(func_get_args()));
	}



	/**
	 * Helper function to get a list of table/view names
	 *
	 * Examples:
	 * $table_names = $db->get_table_names();
	 * $table_names = $db->get_table_names('VIEWS');
	 *
	 * @param string $type: 'Tables' or 'Views'
	 * @return an array of table names in current database
	 */
	public function get_table_names($type = 'TABLES')
	{
        $query = $this->parse("SHOW $type");
        $temp  = $this->get_col($query);
        natcasesort($temp);
        $temp  = array_values($temp);
        return $temp;
	}
	public function MetaTables($type = 'TABLES')
	{
		return $this->get_table_names($this->prepare_query(func_get_args()));
	}

	/**
	 * Helper function to get column names from a table
	 *
	 * Examples:
	 * $column_names = $db->get_column_names('Table_Name');
	 * $column_names = $db->MetaColumnNames('Table_Name');
	 *
	 * @param string $table - table name
	 * @return an array of field names, with numeric key in function get_column_names($table) or upper case field name as key in MetaColumnNames($table)
	 */
	public function get_column_names($table)
	{
		$sql = "SHOW COLUMNS FROM ?n";
		$query = $this->parse($sql, $table);

		return $this->get_col($query);
	}
	public function get_field_names($table)
	{
		return $this->get_column_names($this->prepare_query(func_get_args()));
	}

	public function MetaColumnNames($table)
	{
		$colnames = $this->get_column_names($table);
		$MetaColumnNames = array();
		foreach($colnames as $k=>$v) $MetaColumnNames[strtoupper($v)] = $v;
		return $MetaColumnNames;
	}


	public function get_fetch_mode()
	{
		return $this->fetch_mode;
	}
	/**
	 * Helper function to set fetch mode for function get_all(), parameter: MYSQLI_ASSOC or MYSQLI_NUM
	 * define('MYSQLI_ASSOC',1);
	 * define('MYSQLI_NUM',2);
	 */
	public function set_fetch_mode($mode)
	{
		if($mode == MYSQLI_NUM) $this->fetch_mode = MYSQLI_NUM;
		else $this->fetch_mode  = MYSQLI_ASSOC;
	}

	/**
	 * Helper function to set fetch mode for function GetAll(), this is for compatibility of ADODB: The following constants are defined:
	 * define('ADODB_FETCH_NUM',1);
	 * define('ADODB_FETCH_ASSOC',2);
	 */
	public function SetFetchMode($mode)
	{
		if($mode == 1) $this->fetch_mode = MYSQLI_NUM;
		else $this->fetch_mode  = MYSQLI_ASSOC;
	}



	public function get_conn()
	{
		return $this->conn;
	}

	/**
	 * mysqli_ping — Pings a server connection, or tries to reconnect if the connection has gone down
	 */
	public function ping()
	{
		return mysqli_ping($this->conn);
	}
	public function IsConnected()
	{
		return mysqli_ping($this->conn);
	}













	/**
	 * private function which actually runs a query against Mysql server.
	 * also logs some stats like profiling info and error message
	 *
	 * @param string $query - a regular SQL query
	 * @return mysqli result resource or FALSE on error
	 */
	private function raw_query($query)
	{
		$start = microtime(TRUE);
		$res   = mysqli_query($this->conn, $query);
		$timer = microtime(TRUE) - $start;

		$this->stats[] = array(
			'query' => $query,
			'start' => $start,
			'timer' => $timer,
		);
		if (!$res)
		{
			$error = mysqli_error($this->conn);

			end($this->stats);
			$key = key($this->stats);
			$this->stats[$key]['error'] = $error;
			$this->cutStats();

			$this->error("$error. Full query: [$query]");
		}
		$this->cutStats();
		return $res;
	}

	private function prepare_query($args)
	{
		$query = '';
		$raw   = array_shift($args);
		$array = preg_split('~(\?[nsiuap])~u',$raw,null,PREG_SPLIT_DELIM_CAPTURE);
		$anum  = count($args);
		$pnum  = floor(count($array) / 2);
		if($anum <= 0){
			return $raw;
		}
		else if ($anum<$pnum)
		{
			$this->error("Number of args ($anum) doesn't match number of placeholders ($pnum) in [$raw]");
		}

		foreach ($array as $i => $part)
		{
			if ( ($i % 2) == 0 )
			{
				$query .= $part;
				continue;
			}

			$value = array_shift($args);
			switch ($part)
			{
				case '?n':
					$part = $this->escapeIdent($value);
					break;
				case '?s':
					$part = $this->escapeString($value);
					break;
				case '?i':
					$part = $this->escapeInt($value);
					break;
				case '?a':
					$part = $this->createIN($value);
					break;
				case '?u':
					$part = $this->createSET($value);
					break;
				case '?p':
					$part = $value;
					break;
			}
			$query .= $part;
		}
		return $query;
	}

	private function escapeInt($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
		if(!is_numeric($value))
		{
			$this->error("Integer (?i) placeholder expects numeric value, ".gettype($value)." given");
			return FALSE;
		}
		if (is_float($value))
		{
			$value = number_format($value, 0, '.', ''); // may lose precision on big numbers
		}
		return $value;
	}

	private function escapeString($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
		return	"'".mysqli_real_escape_string($this->conn,$value)."'";
	}
	public function qstr()
	{
		return $this->escapeString($this->prepare_query(func_get_args()));
	}

	private function escapeIdent($value)
	{
		if ($value)
		{
			return "`".str_replace("`","``",$value)."`";
		} else {
			$this->error("Empty value for identifier (?n) placeholder");
		}
	}

	private function createIN($data)
	{
		if (!is_array($data))
		{
			$this->error("Value for IN (?a) placeholder should be array");
			return;
		}
		if (!$data)
		{
			return 'NULL';
		}
		$query = $comma = '';
		foreach ($data as $value)
		{
			$query .= $comma.$this->escapeString($value);
			$comma  = ",";
		}
		return $query;
	}

	private function createSET($data)
	{
		if (!is_array($data))
		{
			$this->error("SET (?u) placeholder expects array, ".gettype($data)." given");
			return;
		}
		if (!$data)
		{
			$this->error("Empty array for SET (?u) placeholder");
			return;
		}
		$query = $comma = '';
		foreach ($data as $key => $value)
		{
			$query .= $comma.$this->escapeIdent($key).'='.$this->escapeString($value);
			$comma  = ",";
		}
		return $query;
	}

	private function error($err)
	{
		$err1  = date('Y-m-d H:i:s') . ' (' . __CLASS__ . "): " . $err;

		if ( $this->show_error == '1' )
		{
			$err1 .= ". Error initiated in " . $this->caller() . ". \n";

			$fp = fopen(dirname(__FILE__) . '/' . $this->error_output, 'a+');
			fwrite($fp, $err1);
			fclose($fp);

		}
		if(trim($err) != '') trigger_error($err1, E_USER_WARNING);
	}

	private function caller()
	{
		$trace  = debug_backtrace();
		$caller = '';
		foreach ($trace as $t)
		{
			if ( isset($t['class']) && $t['class'] == __CLASS__ )
			{
				$caller = $t['file'] . " on line " . $t['line'];
			} else {
				break;
			}
		}
		return $caller;
	}

	/**
	 * On a long run we can eat up too much memory with mere statsistics
	 * Let's keep it at reasonable size, leaving only last 100 entries.
	 */
	private function cutStats()
	{
		if ( count($this->stats) > 100 )
		{
			reset($this->stats);
			$first = key($this->stats);
			unset($this->stats[$first]);
		}
	}

}

?>
