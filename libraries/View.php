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
    private $layout;

    public function __construct($view){

        $this->loader = new Twig_Loader_Filesystem(APP_VIEWS_PATH);
        // Attention le dossier cache doit etre en premission drwxrwxrwx
        $this->twig   = new Twig_Environment($this->loader, array(
           // 'cache' => APP_PATH . '/cache',
        ));
        if(!is_file(APP_VIEWS_PATH . "/" . $view  .".twig")){
            $this->template = $this->twig->loadTemplate("layout.twig");
        }else{
            $this->template = $this->twig->loadTemplate($view  .".twig");
        }

    }

    public function render($params = array()) {
        return $this->template->render($params);
    }
}
