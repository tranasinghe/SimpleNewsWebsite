<?php

namespace App\Controllers;

class ArticleController extends \Mymvc\Core\Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        
        //@todo: implement Pgainationn dclass to populate pagaination and handle request
        
        $page = 1;
        $start = 0;
        $per_page = 10;
        $a = new \App\Models\Article;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            
            $start = ($page-1) * $per_page;
        }
          
        $total_rows = $a->getCount();
        $pages = ceil($total_rows/$per_page);
        $data = $a->getArticles($start, $per_page);
        
        $this->render('article/index', ['data' => $data, 'pages' => $pages, 'current_page' => $page]);
    }
    
    public function details($article_id = 0) {
        $a = new \App\Models\Article;
        $data = $a->get($article_id);
        $this->render('article/details', ['data' => $data]);
    }
    
    public function post() {
        $data =  array();
        
        $command = filter_input(INPUT_POST, 'command_save');
        if(!empty($command)) {
            
            //@TODO implement Formvalidation  to the framework.
            $save = [];
            $save['title'] =  filter_input(INPUT_POST, 'title');
            $save['content'] = filter_input(INPUT_POST, 'content');
            $save['status'] = filter_input(INPUT_POST, 'status');
            
            $article = new \App\Models\Article();
            $article->insert('articles', $save);
            
            $this->redirect('/');
        }
        $this->render('article/post', ['data' => $data]);
    }
    
    public function delete($id)
    {
        $res = ['status' => 0];
        $a = new \App\Models\Article();
        if($a->update($id,'articles', array('status' => 2))) {
            $res['status'] = 1;
        }
        echo json_encode($res);
        exit;
    }
    
}
