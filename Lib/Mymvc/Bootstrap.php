<?php

namespace Mymvc;


class Bootstrap {
    
    public static function run() {
        try {
            Config\Repository::setDirectory(APPPATH . '/Config');
            $frontConroller = new Core\Controller();
            $frontConroller->run();
        } catch (Exception $e) {
            var_dump($e);die;
        }
    }
}
