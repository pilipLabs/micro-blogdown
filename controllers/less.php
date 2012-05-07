<?php
require_once FRAMEWORK_PATH.'/lessphp/lessc.inc.php';

class less extends Controller{
    function index() {
        header('Content-Type:text/css; charset:utf-8;');

        $out = "";

        $lc = new lessc();
        $lesscode = '
            // CSS Reset
            @import "'.FRAMEWORK_PATH.'/bootstrap/less/reset.less";
			@import "'.FRAMEWORK_PATH.'/bootstrap/less/variables.less";

            // Core variables and mixins'
            .'@import "'.FRAMEWORK_PATH.'/less/variables.less";'
            .(isset($this->theme) && file_exists(FRAMEWORK_PATH.'/less/themes/'.$this->theme.'/theme.less')?
                preg_replace('/{{PATH}}/', FRAMEWORK_PATH.'/', file_get_contents(FRAMEWORK_PATH.'/less/themes/'.$this->theme.'/theme.less'))
              : '')
            .preg_replace('/{{PATH}}/', FRAMEWORK_PATH.'/', file_get_contents(FRAMEWORK_PATH.'/my.less'))
        ;
        try {
            $out  .= $lc->parse($lesscode);
        } catch (Exception $ex) {
           self::error($ex);
        }
        echo $out;
    }

    function responsive() {
        header('Content-Type:text/css; charset:utf-8;');

        $out = "";

        $lc = new lessc();
        $lesscode = '
			@import "'.FRAMEWORK_PATH.'/bootstrap/less/variables.less";
            // Core variables and mixins'
            .'@import "'.FRAMEWORK_PATH.'/less/variables.less";'
            .(isset($this->theme) && file_exists(FRAMEWORK_PATH.'/less/themes/'.$this->theme.'/theme.less')?
                preg_replace('/{{PATH}}/', FRAMEWORK_PATH.'/', file_get_contents(FRAMEWORK_PATH.'/less/themes/'.$this->theme.'/theme.less'))
              : '')
            .preg_replace('/{{PATH}}/', FRAMEWORK_PATH.'/', file_get_contents(FRAMEWORK_PATH.'/my_responsive.less'))
        ;
        try {
            $out  .= $lc->parse($lesscode);
        } catch (Exception $ex) {
           self::error($ex);
        }
        echo $out;
    }

}
