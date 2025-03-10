<?php

/* Last updated on 2017-06-28 */
if (!defined('ADODB_FETCH_NUM')) {
    define('ADODB_FETCH_NUM', 1);
} if (!defined('ADODB_FETCH_ASSOC')) {
    define('ADODB_FETCH_ASSOC', 2);
} class bxaf_mysqli
{
    private $conn; private $stats; private $show_error; private $error_output; private $fetch_mode; private $defaults = array('host' => 'localhost', 'user' => 'root', 'pass' => '', 'db' => 'test', 'port' => 3306, 'socket' => null, 'pconnect' => true, 'fetch_mode' => MYSQLI_ASSOC, 'flags' => null, 'charset' => 'utf8', 'show_error' => 0, 'error_output' => 'bxaf_mysqli.errors.txt'); public function __construct($opt = array())
    {
        $opt = array_merge($this->defaults, $opt);
        $this->show_error = $opt['show_error'];
        $this->error_output = $opt['error_output'];
        if ($opt['fetch_mode'] == MYSQLI_NUM) {
            $this->fetch_mode = MYSQLI_NUM;
        } else {
            $this->fetch_mode = MYSQLI_ASSOC;
        }
        if (isset($opt['mysqli'])) {
            if ($opt['mysqli'] instanceof mysqli) {
                $this->conn = $opt['mysqli'];

                return;
            } else {
                $this->error('mysqli option must be valid instance of mysqli class');
            }
        }
        if (($opt['host'] == 'localhost') || ($opt['host'] == '127.0.0.1')) {
            if ($opt['pconnect']) {
                $opt['host'] = 'p:'.$opt['host'];
            } $this->conn = mysqli_connect($opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port'], $opt['socket']); if (mysqli_connect_errno()) {
                die("Connect failed: %s\n".mysqli_connect_error());
            } if (!$this->conn) {
                $this->error(mysqli_connect_errno().' '.mysqli_connect_error());
            }
        } else {
            if ($opt['pconnect']) {
                $opt['host'] = 'p:'.$opt['host'];
            } $this->conn = mysqli_init(); if ($this->conn) {
                if (!mysqli_real_connect($this->conn, $opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port'], $opt['socket'], $opt['flags'])) {
                    $this->error(mysqli_connect_errno().' '.mysqli_connect_error());
                }
            } else {
                die('mysqli_init failed.');
            }
        }
        mysqli_set_charset($this->conn, $opt['charset']) or $this->error(mysqli_error($this->conn));
        unset($opt);
    }public function query()
    {
        return $this->raw_query($this->prepare_query(func_get_args()));
    }public function Execute()
    {
        return $this->raw_query($this->prepare_query(func_get_args()));
    }public function fetch($result)
    {
        $mode = $this->fetch_mode == MYSQLI_NUM ? MYSQLI_NUM : MYSQLI_ASSOC;

        return mysqli_fetch_array($result, $mode);
    }public function affected_rows()
    {
        return mysqli_affected_rows($this->conn);
    }public function insert_id()
    {
        return mysqli_insert_id($this->conn);
    }public function num_rows($result)
    {
        return mysqli_num_rows($result);
    }public function field_count($result)
    {
        return mysqli_num_fields($result);
    }public function num_fields($result)
    {
        return mysqli_num_fields($result);
    }public function free($result)
    {
        mysqli_free_result($result);
    }public function get_one()
    {
        $query = $this->prepare_query(func_get_args());
        if ($res = $this->raw_query($query)) {
            $row = $this->fetch($res);
            if (is_array($row)) {
                return reset($row);
            }
            $this->free($res);
        }

        return false;
    }public function GetOne()
    {
        return $this->get_one($this->prepare_query(func_get_args()));
    }public function get_row()
    {
        $query = $this->prepare_query(func_get_args());
        if ($res = $this->raw_query($query)) {
            $ret = $this->fetch($res);
            $this->free($res);

            return $ret;
        }

        return false;
    }public function GetRow()
    {
        return $this->get_row($this->prepare_query(func_get_args()));
    }public function get_col()
    {
        $ret = array();
        $query = $this->prepare_query(func_get_args());
        if ($res = $this->raw_query($query)) {
            while ($row = $this->fetch($res)) {
                $ret[] = reset($row);
            }
            $this->free($res);
        }

        return $ret;
    }public function GetCol()
    {
        return $this->get_col($this->prepare_query(func_get_args()));
    }public function get_all()
    {
        $ret = array();
        $query = $this->prepare_query(func_get_args());
        if ($res = $this->raw_query($query)) {
            if ($this->fetch_mode == MYSQLI_NUM) {
                while ($row = $res->fetch_row()) {
                    $ret[] = $row;
                }
            } else {
                while ($row = $res->fetch_assoc()) {
                    $ret[] = $row;
                }
            }
            $this->free($res);
        }

        return $ret;
    }public function GetAll()
    {
        return $this->get_all($this->prepare_query(func_get_args()));
    }public function GetArray()
    {
        return $this->get_all($this->prepare_query(func_get_args()));
    }public function get_assoc()
    {
        $args = func_get_args();
        $index = array_shift($args);
        $query = $this->prepare_query($args);
        $ret = array();
        if ($res = $this->raw_query($query)) {
            $num_fields = $this->num_fields($res);
            if ($num_fields <= 1) {
            } elseif ($num_fields == 2) {
                while ($row = $this->fetch($res)) {
                    if (array_key_exists($index, $row)) {
                        $key = $row[$index];
                        unset($row[$index]);
                        $value = array_pop($row);
                        $ret[$key] = $value;
                    }
                }
            } else {
                while ($row = $this->fetch($res)) {
                    if (array_key_exists($index, $row)) {
                        $key = $row[$index];
                        unset($row[$index]);
                        $ret[$key] = $row;
                    }
                }
            }
            $this->free($res);
        }

        return $ret;
    }public function get_assoc_all()
    {
        $args = func_get_args();
        $index = array_shift($args);
        $query = $this->prepare_query($args);
        $ret = array();
        if ($res = $this->raw_query($query)) {
            $num_fields = $this->num_fields($res);
            if ($num_fields <= 1) {
            } elseif ($num_fields == 2) {
                while ($row = $this->fetch($res)) {
                    if (array_key_exists($index, $row)) {
                        $key = $row[$index];
                        unset($row[$index]);
                        $value = array_pop($row);
                        $ret[$key] = $value;
                    }
                }
            } else {
                while ($row = $this->fetch($res)) {
                    if (array_key_exists($index, $row)) {
                        $key = $row[$index];
                        $ret[$key] = $row;
                    }
                }
            }
            $this->free($res);
        }

        return $ret;
    }public function GetAssoc()
    {
        $query = $this->prepare_query(func_get_args());
        $ret = array();
        if ($res = $this->raw_query($query)) {
            $num_fields = $this->num_fields($res);
            if ($num_fields <= 1) {
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
    }public function get_assoc_col()
    {
        $args = func_get_args();
        $index = array_shift($args);
        $query = $this->prepare_query($args);
        $ret = array();
        if ($res = $this->raw_query($query)) {
            while ($row = $this->fetch($res)) {
                $key = $row[$index];
                unset($row[$index]);
                $ret[$key] = reset($row);
            }
            $this->free($res);
        }

        return $ret;
    }public function GetAssocCol()
    {
        return $this->get_assoc_col($this->prepare_query(func_get_args()));
    }public function parse()
    {
        return $this->prepare_query(func_get_args());
    }public function white_list($input, $allowed, $default = false)
    {
        $found = array_search($input, $allowed);

        return($found === false) ? $default : $allowed[$found];
    }public function filter_array($input, $allowed)
    {
        foreach (array_keys($input)as $key) {
            if (!in_array($key, $allowed)) {
                unset($input[$key]);
            }
        }

        return $input;
    }public function last_query()
    {
        $last = end($this->stats);

        return $last['query'];
    }public function get_stats()
    {
        return $this->stats;
    }public function get_value()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field = array_shift($args);
        $condition = $this->prepare_query($args);
        $columns = $this->get_column_names($table);
        if (!is_array($columns) || count($columns) <= 0) {
            return false;
        }
        if (!in_array($field, $columns)) {
            return false;
        }
        $sql = 'SELECT ?n FROM ?n ';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }
        $sql .= ' ORDER BY `ID` DESC';

        return $this->get_one($sql, $field, $table, $condition);
    }public function GetValue()
    {
        return $this->get_value($this->prepare_query(func_get_args()));
    }public function get_values()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field = array_shift($args);
        $condition = $this->prepare_query($args);
        $columns = $this->get_column_names($table);
        if (!is_array($columns) || count($columns) <= 0) {
            return false;
        }
        if (!in_array($field, $columns)) {
            return false;
        }
        $sql = 'SELECT ?n FROM ?n ';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }
        $sql .= ' ORDER BY `ID` DESC';

        return $this->get_col($sql, $field, $table, $condition);
    }public function GetValues()
    {
        return $this->get_values($this->prepare_query(func_get_args()));
    }public function get_id()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $condition = $this->prepare_query($args);
        $sql = 'SELECT `ID` FROM ?n ';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }
        $sql .= ' ORDER BY `ID` DESC';

        return $this->get_one($sql, $table, $condition);
    }public function get_ids()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $condition = $this->prepare_query($args);
        $sql = 'SELECT `ID` FROM ?n ';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }

        return $this->get_col($sql, $table, $condition);
    }public function delete()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $condition = $this->prepare_query($args);
        $sql = 'DELETE FROM ?n WHERE ?p';
        $query = $this->parse($sql, $table, $condition);
        $affected_rows = 0;
        if ($res = $this->raw_query($query)) {
            $affected_rows = $this->affected_rows();
            $this->free($res);
        }

        return $this->affected_rows();
    }public function update()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        } else {
            $columns = $this->get_column_names($table);
            if (!is_array($columns) || count($columns) <= 0) {
                return false;
            }
            foreach ($field_values as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_values[$f]);
                }
            }
        }
        $condition = $this->prepare_query($args);
        $sql = 'UPDATE ?n SET ?u WHERE ?p';
        $query = $this->parse($sql, $table, $field_values, $condition);
        $affected_rows = 0;
        if ($res = $this->raw_query($query)) {
            $affected_rows = $this->affected_rows();
            $this->free($res);
        }

        return $this->affected_rows();
    }public function update_batch()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        }
        $columns = $this->get_column_names($table);
        if (!is_array($columns) || count($columns) <= 0) {
            return false;
        }
        if (!in_array($field, $columns)) {
            return false;
        }
        $condition = $this->prepare_query($args);
        $affected_rows = 0;
        foreach ($field_values as $field_value) {
            if (!is_array($field_value) || count($field_value) <= 0) {
                continue;
            } foreach ($field_value as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_value[$f]);
                }
            } if (!array_key_exists($field, $field_value)) {
                continue;
            } $cond = '?n = ?s'; if (trim($condition) != '') {
                $cond .= ' AND ?p';
            } $cond = $this->parse($cond, $field, $field_value[$field], $condition); unset($field_value[$field]); $sql = 'UPDATE ?n SET ?u'; if (trim($cond) != '') {
                $sql .= ' WHERE ?p';
            } $query = $this->parse($sql, $table, $field_value, $cond); if ($res = $this->raw_query($query)) {
                $affected_rows += $this->affected_rows();
                $this->free($res);
            }
        }

        return $affected_rows;
    }public function batch_update()
    {
        return $this->update_batch($this->prepare_query(func_get_args()));
    }public function updateBatch()
    {
        return $this->update_batch($this->prepare_query(func_get_args()));
    }public function batchUpdate()
    {
        return $this->update_batch($this->prepare_query(func_get_args()));
    }public function insert()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        } else {
            $columns = $this->get_column_names($table);
            if (!is_array($columns) || count($columns) <= 0) {
                return false;
            }
            foreach ($field_values as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_values[$f]);
                }
            }
        }
        $condition = $this->prepare_query($args);
        $sql = 'INSERT INTO ?n SET ?u';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }
        $query = $this->parse($sql, $table, $field_values, $condition);
        $insert_id = 0;
        if ($res = $this->raw_query($query)) {
            $insert_id = $this->insert_id();
            $this->free($res);
        }

        return $insert_id;
    }public function replace()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        } else {
            $columns = $this->get_column_names($table);
            if (!is_array($columns) || count($columns) <= 0) {
                return false;
            }
            foreach ($field_values as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_values[$f]);
                }
            }
        }
        $condition = $this->prepare_query($args);
        $sql = 'REPLACE INTO ?n SET ?u';
        if (trim($condition) != '') {
            $sql .= ' WHERE ?p';
        }
        $query = $this->parse($sql, $table, $field_values, $condition);
        $insert_id = 0;
        if ($res = $this->raw_query($query)) {
            $insert_id = $this->insert_id();
            $this->free($res);
        }

        return $insert_id;
    }public function insert_batch()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        }
        $columns = $this->get_column_names($table);
        if (!is_array($columns) || count($columns) <= 0) {
            return false;
        }
        $condition = $this->prepare_query($args);
        $insert_ids = array();
        foreach ($field_values as $field_value) {
            if (!is_array($field_value) || count($field_value) <= 0) {
                continue;
            } foreach ($field_value as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_value[$f]);
                }
            } $sql = 'INSERT INTO ?n SET ?u'; if (trim($condition) != '') {
                $sql .= ' WHERE ?p';
            } $query = $this->parse($sql, $table, $field_value, $condition); if ($res = $this->raw_query($query)) {
                $id = $this->insert_id();
                if ($id > 0) {
                    $insert_ids[] = $id;
                }
                $this->free($res);
            }
        }

        return $insert_ids;
    }public function insertBatch()
    {
        return $this->insert_batch($this->prepare_query(func_get_args()));
    }public function batch_insert()
    {
        return $this->insert_batch($this->prepare_query(func_get_args()));
    }public function batchInsert()
    {
        return $this->insert_batch($this->prepare_query(func_get_args()));
    }public function replace_batch()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $field_values = array_shift($args);
        $tables = $this->get_table_names();
        if (!is_array($tables) || count($tables) <= 0 || !in_array($table, $tables)) {
            return false;
        }
        if (!is_array($field_values) || count($field_values) <= 0) {
            return false;
        }
        $columns = $this->get_column_names($table);
        if (!is_array($columns) || count($columns) <= 0) {
            return false;
        }
        $condition = $this->prepare_query($args);
        $insert_ids = array();
        foreach ($field_values as $field_value) {
            if (!is_array($field_value) || count($field_value) <= 0) {
                continue;
            } foreach ($field_value as $f => $v) {
                if (!in_array($f, $columns)) {
                    unset($field_value[$f]);
                }
            } $sql = 'REPLACE INTO ?n SET ?u'; if (trim($condition) != '') {
                $sql .= ' WHERE ?p';
            } $query = $this->parse($sql, $table, $field_value, $condition); if ($res = $this->raw_query($query)) {
                $id = $this->insert_id();
                if ($id > 0) {
                    $insert_ids[] = $id;
                }
                $this->free($res);
            }
        }

        return $insert_ids;
    }public function batchReplace()
    {
        return $this->replace_batch($this->prepare_query(func_get_args()));
    }public function replaceBatch()
    {
        return $this->replace_batch($this->prepare_query(func_get_args()));
    }public function batch_replace()
    {
        return $this->replace_batch($this->prepare_query(func_get_args()));
    }public function get_table_names($type = 'TABLES')
    {
        $query = $this->parse("SHOW $type");
        $temp = $this->get_col($query);
        natcasesort($temp);
        $temp = array_values($temp);

        return $temp;
    }public function MetaTables($type = 'TABLES')
    {
        return $this->get_table_names($this->prepare_query(func_get_args()));
    }public function get_column_names($table)
    {
        $sql = 'SHOW COLUMNS FROM ?n';
        $query = $this->parse($sql, $table);

        return $this->get_col($query);
    }public function get_field_names($table)
    {
        return $this->get_column_names($this->prepare_query(func_get_args()));
    }public function MetaColumnNames($table)
    {
        $colnames = $this->get_column_names($table);
        $MetaColumnNames = array();
        foreach ($colnames as $k => $v) {
            $MetaColumnNames[strtoupper($v)] = $v;
        }

        return $MetaColumnNames;
    }public function get_fetch_mode()
    {
        return $this->fetch_mode;
    }public function set_fetch_mode($mode)
    {
        if ($mode == MYSQLI_NUM) {
            $this->fetch_mode = MYSQLI_NUM;
        } else {
            $this->fetch_mode = MYSQLI_ASSOC;
        }
    }public function SetFetchMode($mode)
    {
        if ($mode == 1) {
            $this->fetch_mode = MYSQLI_NUM;
        } else {
            $this->fetch_mode = MYSQLI_ASSOC;
        }
    }public function get_conn()
    {
        return $this->conn;
    }public function ping()
    {
        return mysqli_ping($this->conn);
    }public function IsConnected()
    {
        return mysqli_ping($this->conn);
    }private function raw_query($query)
    {
        $start = microtime(true);
        $res = mysqli_query($this->conn, $query);
        $timer = microtime(true) - $start;
        $this->stats[] = array('query' => $query, 'start' => $start, 'timer' => $timer);
        if (!$res) {
            $error = mysqli_error($this->conn);
            end($this->stats);
            $key = key($this->stats);
            $this->stats[$key]['error'] = $error;
            $this->cutStats();
            $this->error("$error. Full query: [$query]");
        }
        $this->cutStats();

        return $res;
    }private function prepare_query($args)
    {
        $query = '';
        $raw = array_shift($args);
        $array = preg_split('~(\?[nsiuap])~u', $raw, null, PREG_SPLIT_DELIM_CAPTURE);
        $anum = count($args);
        $pnum = floor(count($array) / 2);
        if ($anum <= 0) {
            return $raw;
        } elseif ($anum<$pnum) {
            $this->error("Number of args ($anum) doesn't match number of placeholders ($pnum) in [$raw]");
        }
        foreach ($array as $i => $part) {
            if (($i % 2) == 0) {
                $query .= $part;
                continue;
            }
            $value = array_shift($args);
            switch ($part) {case '?n':$part = $this->escapeIdent($value); break; case '?s':$part = $this->escapeString($value); break; case '?i':$part = $this->escapeInt($value); break; case '?a':$part = $this->createIN($value); break; case '?u':$part = $this->createSET($value); break; case '?p':$part = $value; break; }
            $query .= $part;
        }

        return $query;
    }private function escapeInt($value)
    {
        if ($value === null) {
            return 'NULL';
        }
        if (!is_numeric($value)) {
            $this->error('Integer (?i) placeholder expects numeric value, '.gettype($value).' given');

            return false;
        }
        if (is_float($value)) {
            $value = number_format($value, 0, '.', '');
        }

        return $value;
    }private function escapeString($value)
    {
        if ($value === null) {
            return 'NULL';
        }

        return "'".mysqli_real_escape_string($this->conn, $value)."'";
    }public function qstr()
    {
        return $this->escapeString($this->prepare_query(func_get_args()));
    }private function escapeIdent($value)
    {
        if ($value) {
            return '`'.str_replace('`', '``', $value).'`';
        } else {
            $this->error('Empty value for identifier (?n) placeholder');
        }
    }private function createIN($data)
    {
        if (!is_array($data)) {
            $this->error('Value for IN (?a) placeholder should be array');

            return;
        }
        if (!$data) {
            return 'NULL';
        }
        $query = $comma = '';
        foreach ($data as $value) {
            $query .= $comma.$this->escapeString($value);
            $comma = ',';
        }

        return $query;
    }private function createSET($data)
    {
        if (!is_array($data)) {
            $this->error('SET (?u) placeholder expects array, '.gettype($data).' given');

            return;
        }
        if (!$data) {
            $this->error('Empty array for SET (?u) placeholder');

            return;
        }
        $query = $comma = '';
        foreach ($data as $key => $value) {
            $query .= $comma.$this->escapeIdent($key).'='.$this->escapeString($value);
            $comma = ',';
        }

        return $query;
    }private function error($err)
    {
        $err1 = date('Y-m-d H:i:s').' ('.__CLASS__.'): '.$err;
        if ($this->show_error == '1') {
            $err1 .= '. Error initiated in '.$this->caller().". \n";
            $fp = fopen(dirname(__FILE__).'/'.$this->error_output, 'a+');
            fwrite($fp, $err1);
            fclose($fp);
        }
        if (trim($err) != '') {
            trigger_error($err1, E_USER_WARNING);
        }
    }private function caller()
    {
        $trace = debug_backtrace();
        $caller = '';
        foreach ($trace as $t) {
            if (isset($t['class']) && $t['class'] == __CLASS__) {
                $caller = $t['file'].' on line '.$t['line'];
            } else {
                break;
            }
        }

        return $caller;
    }private function cutStats()
    {
        if (count($this->stats) > 100) {
            reset($this->stats);
            $first = key($this->stats);
            unset($this->stats[$first]);
        }
    }
}
