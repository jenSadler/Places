<?php 
/**
 * adds basic functionalities to the theme
 * 
 * @package frx
 */

 namespace FRX_THEME\Inc;

 use FRX_THEME\Inc\Traits\Singleton;

 class FRX_THEME{
    use Singleton;

    protected function __construct(){
        //load classes
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hooks();
        
    }
 

    protected function setup_hooks(){
        //actions and filters
        /**
         * Actions
         */

         add_action('after_setup_theme', [$this, 'setup_theme']);
    }
    
    public function setup_theme(){
        global $content_width;

        add_theme_support('title-tag');
        add_theme_support('custom-logo',[
            'header-text'   =>['site-title', 'site-description'],
            'height'        => 50,
            'width'         =>50,
            'flex-height'   =>true,
            'flex-width'    =>true,
            'unlink-homepage-logo' => true
        ]);

        add_theme_support('post-thumbnails');
        
        
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support(
            'html5',[
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );

        add_editor_style();
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        
        if(!isset($content_width)){
            $content_width = 1200;
        }

    }
}


?>