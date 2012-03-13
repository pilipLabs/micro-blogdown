<?php
require_once FRAMEWORK_PATH.'/lessphp/lessc.inc.php';

class less extends Controller{
    function index() {
        header('Content-Type:text/css; charset:utf-8;');
        $input = FRAMEWORK_PATH.'/bootstrap/less/bootstrap.less';
        $lc = new lessc($input);
        try {
            $out  = $lc->parse();
            $out .= $lc->parse('@import "reset.less";');
            self::render('less', array('css' => $lc->parse()));
        } catch (Exception $ex) {
           self::error($ex);
        }
    }

}
