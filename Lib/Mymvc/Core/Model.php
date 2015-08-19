<?php

namespace Mymvc\Core;
class Model extends \Mymvc\Database\DB {

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        if(!$this->_connection) {
            $db = \Mymvc\Config\Repository::get('database');
            $this->_connection = new \mysqli($db['host'], $db['username'], $db['password'], $db['database']);
        }
    }
}
