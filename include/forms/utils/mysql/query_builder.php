<?php

    /* if you use 1 DB in your project, u can connect in here */
    
    class simple_query_builder
    {
    	private $mysqli;
    	public function __construct(){
    		$this->mysqli = new mysqli('mysql.ecr-forum.com', 'ecrforum', 'RR56dkF89', 'ecrforum');
    		$this->mysqli->set_charset("utf8");
    	}
        public $parms = array();
        /* Developer Mode */
        public $devMode = 0;
        /* Protect from SQL Injections */
        public function sqlProt($str)
        {
            
            return "'" . $this->mysqli->real_escape_string($str) . "'";
        }
        /* Add field name and protected value */
        public function add($name, $value)
        {
            $this->parms[$name] = $this->sqlProt($value);
        }
        /* Add field name and non protected value (USE for example: NOW() + INTERVAL 1 DAY) */
        public function addCustom($name, $value)
        {
            $this->parms[$name] = $value;
        }
        /* Build INSERT query */
        public function insert($tableName)
        {
            
            $queryCol = '';
            $queryVal = '';
            foreach ($this->parms as $key => $val) {
                if ($queryCol == '') {
                    $queryCol = "`$key`";
                } else {
                    $queryCol = $queryCol . ',' . "`$key`";
                }
                if ($queryVal == '') {
                    $queryVal = $val;
                } else {
                    $queryVal = $queryVal . "," . $val;
                }
            }
            $query = "INSERT INTO $tableName ($queryCol) VALUES ($queryVal)";
            $res   = $this->mysqli->query($query);
            if (!$res) {
                if ($this->devMode == 1) {
                    echo "Error: <b>Wrong MySQL INSERT syntax.</b> <br>" . " \r\n";
                    echo $query . "<br>" . " \r\n";
                }
                $this->parms = array(); //Reset params
                return false;
            } else {
                $ret = $this->mysqli->insert_id;
                if ($ret == 0) $ret = true;
                $this->parms = array(); //Reset params
                return $ret;
            }
        }
        # Build UPDATE Query
        public function update($tableName, $where = null)
        {
            
            $querySET = '';
            foreach ($this->parms as $key => $val) {
                if ($querySET == '') {
                    $querySET = "`$key`" . " = " . $val;
                } else {
                    $querySET = $querySET . ',' . "`$key`" . " = " . $val;
                }
            }
            if ($where != null) {
                $query = "UPDATE $tableName SET $querySET WHERE $where";
            } else {
                $query = "UPDATE $tableName SET $querySET";
            }
            $res = $this->mysqli->query($query);
            if (!$res) {
                if ($this->devMode == 1) {
                    echo "Error: <b>Wrong MySQL UPDATE syntax.</b> <br>" . " \r\n";
                    echo $query . "<br>" . " \r\n";
                }
                $this->parms = array(); //Reset params
                return false;
            } else {
                $this->parms = array(); //Reset params
                return $this->mysqli->affected_rows; //Return number of affected rows
            }
        }
        # Build SELECT Query with default LIMIT
        public function select($query, $offset = 0, $limit = 50)
        {
            
            $this->parms = array(); //Reset Params
            $result = null;
            $res    = $this->mysqli->query($query . " LIMIT $offset, $limit");
            if (!$res) {
                if ($this->devMode == 1) {
                    echo "Error: <b>Wrong MySQL SELECT syntax.</b> <br>" . " \r\n";
                    echo $query . "<br>" . " \r\n";
                }
                return false;
            }
            while ($row = $res->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }
    }
