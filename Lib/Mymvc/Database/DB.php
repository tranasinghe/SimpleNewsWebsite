<?php

namespace Mymvc\Database;

abstract class DB {
    protected $_connection;
    protected $_table;
    private $_result;
    protected $_timestamp = true;


    abstract protected function connect();  
    

    protected function query($sql = '') {
        if ($result = mysqli_query($this->_connection, $sql)) {
            $this->_result = $result;
        }
        return $this;
    }
    
    protected function fetch() {
        $row =  null;
        if(!empty($this->_result)) {
           $row = (object)$this->_result->fetch_assoc();
        }
        return $row;
    }
    
    protected function fetchAll() {
        $rows =  null;
        if(!empty($this->_result)) {
            while ($row = $this->_result->fetch_assoc()) {
                $rows[] = (object)$row;
            }
        }
        return $rows;
    }
    
    public function resultCount()
    {
        return $this->_result->num_rows;
    }

    public function insert($table, $data) {
        
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $fields = $values = '';
        foreach($data as $k => $v) {
            $fields[] = $k;
            $values[] = mysqli_real_escape_string($this->_connection, $v);
        }
        
        $fieldsStr = implode(",", $fields);
        $valuesStr = "'" . implode("','", $values) . "'";
        
        $sql = "INSERT INTO `{$table}` ({$fieldsStr})
        VALUES ({$valuesStr})";
        
        if (!mysqli_query($this->_connection, $sql)) {
             echo "Error: " . $sql . "<br>" . mysqli_error($this->_connection);
             exit;
        }
        return true;
    }
    
    public function update($id, $table, $data) {
        
        $update = '';
        foreach($data as $k => $v) {
            $update .= $k . '= "'.$v.'" ' ;
        }
        $sql = "UPDATE $table SET $update WHERE id='{$id}'";
        
        if (mysqli_query($this->_connection, $sql)) {
           return true;
        }
        return false;
    }
    
    public function delete() {
        //@todo implement this function
    }
}
