<?php
require_once FRAMEWORK_PATH.'/lessphp/lessc.inc.php';

class less extends Controller{
    function index() {
        header('Content-Type:text/css; charset:utf-8;');
        $input = FRAMEWORK_PATH.'/my.less';
        $lc = new lessc($input);
        $out = "";
        try {
            $out .= $lc->parse();
            self::render('less', array('css' => $out));
        } catch (Exception $ex) {
           self::error($ex);
        }
    }

}
