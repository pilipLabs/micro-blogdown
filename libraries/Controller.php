<?php

abstract class Controller {

    static protected function render($view, $params = array()) {
        $v = new View($view);
        echo $v->render($params);
    }


    static function error($error = false) {
        if ($error) {
            Micro::error($error);
        }
    }

}
