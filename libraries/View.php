<?php
require_once FRAMEWORK_PATH.'/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/*
   Micro View
*/
class View {

    private $loader;
    private $twig;
    private $template;

    public function __construct($view){

        $this->loader = new Twig_Loader_Filesystem(APP_VIEWS_PATH);
        $this->twig   = new Twig_Environment($this->loader, array(
            'cache' => APP_PATH . '/cache',
        ));

        $this->template = $this->twig->loadTemplate($view);

    }

    public function render($params = array()) {
        return $this->template->render($params);
    }
}
