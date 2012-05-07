<?php

class main extends Controller{
    function index() {
        self::render('home', array(
            'site_title' => SITE_TITLE,
            'title' => SITE_TITLE,
            'content' => 'test',
            'navigation' => Menu::get('home'),
            )
        );
    }

    function gallery() {

        $items = new DirectoryIterator(APP_IMG_PATH);
        $menus = array();
        foreach ($items as $item){
            if ($item->isDir() && $item->getFilename() != '.' && $item->getFilename() != '..'){
                if(isset($this->collection) && $this->collection == $item->getFilename()){
                    $class = 'active';
                }else{
                    $class = '';
                }
               $menus[] = array(
                    "id"     => $item->getFilename(),
                    "bg_img" => APP_IMG_URL . '/' . $item->getFilename() . '.jpg',
                    "title"  => ucfirst($item->getFilename()),
                    "url"  => $item->getFilename(),
                    "class"  => $class,
                );
            }
        }
        self::render(
            'gallery',
            array(
                'site_title' => SITE_TITLE,
                'title' => SITE_TITLE . ' | ' . ' Gallery',
                'menu' => $menus,
                'navigation' => Menu::get('gallery'),
                'photo' => (isset($this->collection) ? $this->oneGallery('/'.$this->collection) : array())
                )
            );
    }

    protected function oneGallery ($folder) {
        $images = array();
        $items = new DirectoryIterator(APP_IMG_PATH.$folder);
        foreach ($items as $item){
            if ($item->isFile() && preg_match('/\.(jpeg|jpg|png|gif)$/', $item->getFilename())){
                if(file_exists(APP_IMG_PATH.$folder . '/mini_' . $item->getFilename())){
                    $mini = APP_IMG_URL . $folder . '/mini_' . $item->getFilename();
                }else{
                    $mini = APP_IMG_URL . $folder . '/'      . $item->getFilename();
                }
                $images[] = array(
                        "href"      => APP_IMG_URL . $folder . '/'      . $item->getFilename(),
                        "href_mini" => $mini,
                        'caption'   => $item->getFilename(),
                        'categ'     => 'gallery',
                    );
            }
        }
        return $images;
    }

}
