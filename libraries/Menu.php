<?php

class Menu {

   public static function get($active_tab) {

        $items = new DirectoryIterator(APP_IMG_PATH);
        $gallery = array();
        foreach ($items as $item){
            if ($item->isDir() && $item->getFilename() != '.' && $item->getFilename() != '..'){
               $gallery[] = array(
                    "caption"  => ucfirst($item->getFilename()),
                    "href"  => "/main/gallery/collection/".$item->getFilename(),
                );
            }
        }

	   	$menu = array(
			"home" => array(
				"caption"  => "Home",
				"href"     => "/",
				),
			"gallery" => array(
				"caption"  => "Gallery",
				"href"     => "/main/gallery",
				'dropdown' => $gallery,
				),
		);


		foreach( $menu as $k => $v) {
			if( $k == $active_tab){
				 $menu[$k]['active'] = "active";
				 break;
			}
		}
        return $menu;
  }

}