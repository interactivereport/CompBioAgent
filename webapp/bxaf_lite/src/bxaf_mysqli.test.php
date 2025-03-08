<?php
ini_set('zlib.output_compression','On');

ini_set('display_errors', '1');
ini_set('session.auto_start', '0');
ini_set('session.use_cookies', '1');
ini_set('session.gc_maxlifetime', 43200); 
ini_set('register_globals', '0');

ini_set('auto_detect_line_endings', true);

session_set_cookie_params (0);
session_cache_limiter('nocache');

session_start();

error_reporting(1);



include_once("bxaf_mysqli.src.php");



/*
CREATE TABLE IF NOT EXISTS `tree_structure1` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`pid` int(10) unsigned NOT NULL,
	`left` int(10) unsigned NOT NULL,
	`right` int(10) unsigned NOT NULL,
	`level` int(10) unsigned NOT NULL,
	`position` int(10) unsigned NOT NULL,
	`name` varchar(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000001 ;

INSERT INTO `tree_structure1` (`id`, `pid`, `left`, `right`, `level`, `position`, `name`) VALUES
(1, 1, 20, 0, 0, 0, 'root'),
(1063, 2, 11, 1, 1, 0, 'Node 12'),
(1064, 3, 10, 2, 1063, 0, 'Node 2'),
(1065, 4, 9, 3, 1064, 0, 'Node 3'),
(1066, 5, 8, 4, 1065, 0, 'Node 4'),
(1067, 6, 7, 5, 1066, 0, 'Node 5'),
(1074, 12, 15, 1, 1, 1, 'Node 9'),
(1078, 13, 14, 2, 1074, 0, 'Node 10'),
(1083, 16, 17, 1, 1, 2, 'test2'),
(1000000, 18, 19, 1, 1, 3, 'Test3');
*/

$opts = array(
	'user'    => 'xxx',
	'pass'    => 'xxx',
	'db'      => 'xxx'
);

$db = new bxaf_mysqli($opts);
$table = 'tree_structure1';


$data = $db->get_column_names($table);
//echo "get_column_names: $sql<pre>" . print_r($data, true) . "</pre>";

$data = $db->MetaColumnNames($table);
//echo "get_column_names: $sql<pre>" . print_r($data, true) . "</pre>";


//Return numeric array, as define('ADODB_FETCH_NUM',1);
$db->SetFetchMode(1);
echo "get_fetch_mode: <pre>" . $db->get_fetch_mode() . "</pre>";
$data = $db->GetAll("SELECT * FROM `$table` LIMIT 1");
echo "GetAll: $sql<pre>" . print_r($data, true) . "</pre>";

//Return assoc array, as define('ADODB_FETCH_ASSOC',2);
$db->SetFetchMode(2);
echo "get_fetch_mode: <pre>" . $db->get_fetch_mode() . "</pre>";
$data = $db->GetAll("SELECT * FROM `$table` LIMIT 1");
echo "GetAll: $sql<pre>" . print_r($data, true) . "</pre>";

//Return numeric array
$db->set_fetch_mode(MYSQLI_NUM);
$data = $db->get_all("SELECT * FROM `$table` LIMIT 1");
echo "get_all: $sql<pre>" . print_r($data, true) . "</pre>";

//Return assoc array
$db->set_fetch_mode(MYSQLI_ASSOC);
$data = $db->get_all("SELECT * FROM `$table` LIMIT 1");
echo "get_all: $sql<pre>" . print_r($data, true) . "</pre>";

exit();

$sql = "SELECT `name` FROM `$table` WHERE `id` = ?i";
$data = $db->get_one($sql, 1067);
echo "get_one: $sql<pre>" . print_r($data, true) . "</pre>";

$sql = "SELECT `name`, `id`, `left` FROM $table";
$data = $db->get_assoc('id', $sql);
echo "get_assoc: $sql<pre>" . print_r($data, true) . "</pre>";

$sql = "SELECT `name`, `id` FROM $table";
$data = $db->get_assoc_col("name", $sql);
echo "get_assoc_col: $sql<pre>" . print_r($data, true) . "</pre>";


$sql = "SELECT * FROM ?n WHERE position=?s LIMIT ?i";
$data = $db->get_all($sql, $table, 0, 5);
echo "get_all: $sql<pre>" . print_r($data, true) . "</pre>";


$sql = "SELECT id FROM $table WHERE name = ?s";
$ids  = $db->get_col($sql, 'test2');
echo "get_col: $sql<pre>" . print_r($data, true) . "</pre>";


$sql = "SELECT * FROM ?n WHERE ?n IN (?a)";
$data = $db->GetAll($sql,$table, 'name', array("Node' 5", 'Node" 2'));
echo "GetAll: $sql<pre>" . print_r($data, true) . "</pre>";



$d = array('name' => 'Test1', 'pid' => 1);
$sql  = "UPDATE `$table` SET ?u WHERE `id` = 133";
$data = $db->query($sql, $d);
echo "$sql<pre>" . print_r($data, true) . "</pre>";



$fld = 'id';
$ids = array(1078, 1083);
$condition = "?n IN (?a)";
$query = $db->parse($condition, $fld, $ids);
echo "query<pre>" . print_r($query, true) . "</pre>";

$query = $db->delete($table, $condition, $fld, $ids);
$query = $db->delete($table, "`id` IN ('1078','1083')");

$ids = array(1078, 1083);
$fv = array('name' => 'Test1', 'pid' => 1);
$condition = "?n IN (?a)";
$result = $db->update($table, $fv, "`id` IN ('1078','1083')");
//UPDATE `tree_structure1` SET `name`='Test1',`pid`='1' WHERE `id` IN ('1078','1083')
$result = $db->update($table, $fv, $condition, $fld, $ids);
//UPDATE `tree_structure1` SET `name`='Test1',`pid`='1' WHERE `id` IN ('1078','1083')

$fld = 'id';
$fv = array(
	array('id'=>1067, 'name' => 'Test55', 'pid' => 3), 
	array('id'=>1066, 'name' => 'Test44', 'pid' => 3)
);
$condition = "?n IN (?a)";
//$result = $db->update_batch($table, $fld, $fv, $condition, $fld, $ids);
$result = $db->update_batch($table, $fld, $fv);
//echo "result<pre>" . print_r($result, true) . "</pre>";


$fld = 'id';
$ids = array(1078, 1083);
$fv = array('name' => 'Test3', 'pid' => 1, 'id' => 66);
$condition = "?n IN (?a)";
$result = $db->replace($table, $fv);
//$result = $db->insert($table, $fv);
$result = $db->insert($table, $fv, $condition, $fld, $ids);
echo "result<pre>" . print_r($result, true) . "</pre>";

$fld = 'id';
$fv = array(
	array('id'=>1067, 'name' => 'Test55', 'pid' => 3), 
	array('name' => 'Test77', 'pid' => 3)
);
$condition = "?n IN (?a)";
$result = $db->insert_batch($table, $fv, $condition, $fld, $ids);
//$result = $db->insert_batch($table, $fv);
echo "result<pre>" . print_r($result, true) . "</pre>";

$result = $db->get_ids($table, "`name` != 'Test77'");
echo "result<pre>" . print_r($result, true) . "</pre>";



$data = $db->last_query();
echo "last_query<pre>" . print_r($data, true) . "</pre>";

$data = $db->get_stats();
echo "get_stats<pre>" . print_r($data, true) . "</pre>";

/*

get_one: SELECT `name` FROM `tree_structure1` WHERE `id` = ?i

Test55

get_assoc: SELECT `name`, `id`, `left` FROM tree_structure1

Array
(
    [1] => Array
        (
            [name] => root
            [id] => 1
            [left] => 20
        )

    [1063] => Array
        (
            [name] => Node 12
            [id] => 1063
            [left] => 11
        )

    [1064] => Array
        (
            [name] => Node" 2
            [id] => 1064
            [left] => 10
        )

    [1065] => Array
        (
            [name] => Node 3
            [id] => 1065
            [left] => 9
        )

    [1066] => Array
        (
            [name] => Test44
            [id] => 1066
            [left] => 8
        )

    [1067] => Array
        (
            [name] => Test55
            [id] => 1067
            [left] => 7
        )

    [1074] => Array
        (
            [name] => Node 9
            [id] => 1074
            [left] => 15
        )

    [1000002] => Array
        (
            [name] => Test1
            [id] => 1000002
            [left] => 0
        )

    [1000001] => Array
        (
            [name] => Test1
            [id] => 1000001
            [left] => 0
        )

    [1000000] => Array
        (
            [name] => Test3
            [id] => 1000000
            [left] => 19
        )

    [11] => Array
        (
            [name] => 
            [id] => 11
            [left] => 0
        )

    [12] => Array
        (
            [name] => 
            [id] => 12
            [left] => 0
        )

    [122] => Array
        (
            [name] => 
            [id] => 122
            [left] => 0
        )

    [133] => Array
        (
            [name] => Test1
            [id] => 133
            [left] => 0
        )

    [555] => Array
        (
            [name] => Test3
            [id] => 555
            [left] => 0
        )

    [66] => Array
        (
            [name] => Test3
            [id] => 66
            [left] => 0
        )

    [1000003] => Array
        (
            [name] => Test77
            [id] => 1000003
            [left] => 0
        )

)

get_assoc_col: SELECT `name`, `id` FROM tree_structure1

Array
(
    [root] => 1
    [Node 12] => 1063
    [Node" 2] => 1064
    [Node 3] => 1065
    [Test44] => 1066
    [Test55] => 1067
    [Node 9] => 1074
    [Test1] => 133
    [Test3] => 66
    [] => 122
    [Test77] => 1000003
)

get_all: SELECT * FROM ?n WHERE position=?s LIMIT ?i

Array
(
    [0] => Array
        (
            [id] => 1
            [pid] => 1
            [left] => 20
            [right] => 0
            [level] => 0
            [position] => 0
            [name] => root
        )

    [1] => Array
        (
            [id] => 1063
            [pid] => 2
            [left] => 11
            [right] => 1
            [level] => 1
            [position] => 0
            [name] => Node 12
        )

    [2] => Array
        (
            [id] => 1064
            [pid] => 3
            [left] => 10
            [right] => 2
            [level] => 1063
            [position] => 0
            [name] => Node" 2
        )

    [3] => Array
        (
            [id] => 1065
            [pid] => 4
            [left] => 9
            [right] => 3
            [level] => 1064
            [position] => 0
            [name] => Node 3
        )

    [4] => Array
        (
            [id] => 1066
            [pid] => 3
            [left] => 8
            [right] => 4
            [level] => 1065
            [position] => 0
            [name] => Test44
        )

)

get_col: SELECT id FROM tree_structure1 WHERE name = ?s

Array
(
    [0] => Array
        (
            [id] => 1
            [pid] => 1
            [left] => 20
            [right] => 0
            [level] => 0
            [position] => 0
            [name] => root
        )

    [1] => Array
        (
            [id] => 1063
            [pid] => 2
            [left] => 11
            [right] => 1
            [level] => 1
            [position] => 0
            [name] => Node 12
        )

    [2] => Array
        (
            [id] => 1064
            [pid] => 3
            [left] => 10
            [right] => 2
            [level] => 1063
            [position] => 0
            [name] => Node" 2
        )

    [3] => Array
        (
            [id] => 1065
            [pid] => 4
            [left] => 9
            [right] => 3
            [level] => 1064
            [position] => 0
            [name] => Node 3
        )

    [4] => Array
        (
            [id] => 1066
            [pid] => 3
            [left] => 8
            [right] => 4
            [level] => 1065
            [position] => 0
            [name] => Test44
        )

)

GetAll: SELECT * FROM ?n WHERE ?n IN (?a)

Array
(
    [0] => Array
        (
            [id] => 1064
            [pid] => 3
            [left] => 10
            [right] => 2
            [level] => 1063
            [position] => 0
            [name] => Node" 2
        )

)

UPDATE `tree_structure1` SET ?u WHERE `id` = 133

1

query

`id` IN ('1078','1083')

result

0

result

Array
(
)

result

Array
(
    [0] => 1
    [1] => 1063
    [2] => 1064
    [3] => 1065
    [4] => 1066
    [5] => 1067
    [6] => 1074
    [7] => 1000002
    [8] => 1000001
    [9] => 1000000
    [10] => 11
    [11] => 12
    [12] => 122
    [13] => 133
    [14] => 555
    [15] => 66
)

last_query

SELECT `ID` FROM `tree_structure1`  WHERE `name` != 'Test77'

get_stats

Array
(
    [0] => Array
        (
            [query] => SELECT `name` FROM `tree_structure1` WHERE `id` = 1067
            [start] => 1438190621.8829
            [timer] => 0.00037503242492676
        )

    [1] => Array
        (
            [query] => SELECT `name`, `id`, `left` FROM tree_structure1
            [start] => 1438190621.8833
            [timer] => 0.00035309791564941
        )

    [2] => Array
        (
            [query] => SELECT `name`, `id` FROM tree_structure1
            [start] => 1438190621.884
            [timer] => 0.00032401084899902
        )

    [3] => Array
        (
            [query] => SELECT * FROM `tree_structure1` WHERE position='0' LIMIT 5
            [start] => 1438190621.8845
            [timer] => 0.0004730224609375
        )

    [4] => Array
        (
            [query] => SELECT id FROM tree_structure1 WHERE name = 'test2'
            [start] => 1438190621.8852
            [timer] => 0.00026798248291016
        )

    [5] => Array
        (
            [query] => SELECT * FROM `tree_structure1` WHERE `name` IN ('Node\' 5','Node\" 2')
            [start] => 1438190621.8857
            [timer] => 0.00039911270141602
        )

    [6] => Array
        (
            [query] => UPDATE `tree_structure1` SET `name`='Test1',`pid`='1' WHERE `id` = 133
            [start] => 1438190621.8863
            [timer] => 0.00034809112548828
        )

    [7] => Array
        (
            [query] => DELETE FROM `tree_structure1` WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8868
            [timer] => 0.00028800964355469
        )

    [8] => Array
        (
            [query] => DELETE FROM `tree_structure1` WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8872
            [timer] => 0.00028800964355469
        )

    [9] => Array
        (
            [query] => UPDATE `tree_structure1` SET `name`='Test1',`pid`='1' WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8877
            [timer] => 0.0002589225769043
        )

    [10] => Array
        (
            [query] => UPDATE `tree_structure1` SET `name`='Test1',`pid`='1' WHERE `id` IN ('1078','1083')
            [start] => 1438190621.888
            [timer] => 0.00025200843811035
        )

    [11] => Array
        (
            [query] => UPDATE `tree_structure1` SET `name`='Test55',`pid`='3' WHERE `id` = '1067'
            [start] => 1438190621.8885
            [timer] => 0.00028204917907715
        )

    [12] => Array
        (
            [query] => UPDATE `tree_structure1` SET `name`='Test44',`pid`='3' WHERE `id` = '1066'
            [start] => 1438190621.8889
            [timer] => 0.00027990341186523
        )

    [13] => Array
        (
            [query] => REPLACE INTO `tree_structure1` SET `name`='Test3',`pid`='1',`id`='66'
            [start] => 1438190621.8893
            [timer] => 0.00031304359436035
        )

    [14] => Array
        (
            [query] => INSERT INTO `tree_structure1` SET `name`='Test3',`pid`='1',`id`='66' WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8898
            [timer] => 0.00016903877258301
            [error] => You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE `id` IN ('1078','1083')' at line 1
        )

    [15] => Array
        (
            [query] => INSERT INTO `tree_structure1` SET `id`='1067',`name`='Test55',`pid`='3' WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8901
            [timer] => 0.00020217895507812
            [error] => You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE `id` IN ('1078','1083')' at line 1
        )

    [16] => Array
        (
            [query] => INSERT INTO `tree_structure1` SET `name`='Test77',`pid`='3' WHERE `id` IN ('1078','1083')
            [start] => 1438190621.8904
            [timer] => 0.00020408630371094
            [error] => You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE `id` IN ('1078','1083')' at line 1
        )

    [17] => Array
        (
            [query] => SELECT `ID` FROM `tree_structure1`  WHERE `name` != 'Test77'
            [start] => 1438190621.8908
            [timer] => 0.00039196014404297
        )

)

*/

?>