<?php

class main extends Controller{
    function index() {
        self::render('home', array('content' => 'youpi'));
    }

}
