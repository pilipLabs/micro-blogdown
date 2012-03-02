<?php

class main extends Controller{
    function index() {
        self::render('home', array('content' => 'youpi'));
    }

    static function error($error = false) {
        $args = array();
        if ($error) {
            header('HTTP/1.1 '. ($error->getCode() == '404' ? '404 Not Found' : '500 Application Error'));
            $args = array(
                'error' => array(
                    'code'    => 'File Not Found',
                    'message' => $error->getMessage()
                    )
                );
        }
    }
}
