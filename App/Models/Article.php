<?php

namespace App\Models;

class Article extends \Mymvc\Core\Model{
 
    public function __construct() {
        parent::__construct();
    }

    public function getArticles($_limit = 0, $_offet = 0 ) {
     
        $limit = '';
        if($_offet > 0) {
            $limit = ' LIMIT ' . $_limit;
            $limit = $limit . ',' . $_offet;
        }
        
        $sql = "SELECT * FROM articles WHERE status IN(0,1) ORDER BY status DESC, created_at DESC $limit";
        $result = $this->query($sql)
            ->fetchAll();
        return $result;
    }
    
    public function getCount()
    {
        $sql = "SELECT id FROM articles WHERE status IN(0,1)";
        return $this->query($sql, array('2'))->resultCount();
    }

    public function get($id = 0) {
        $sql = "SELECT * FROM articles WHERE id = '{$id}'";
        $result = $this->query($sql)
            ->fetch();
        return $result;
    }
    
}
