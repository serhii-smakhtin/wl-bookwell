<?php


namespace themes\bookwell\classes\base;

/**
 * Class Settings
 * @package themes\bookwell\classes\base
 */
class Settings extends Base
{
    private static $instance;

    private function __construct()
    {
        // TODO: Implement __construct() method.
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return Settings
     */
    public static function get_instance()
    {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }

    public function init()
    {
        add_action('after_setup_theme',     [$this, 'setup']);
    }

    public function setup()
    {
        add_theme_support( 'custom-logo', $this->logo_params );
    }

    /**
     * @return array
     */
    protected function get_logo_params()
    {
        return [
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
//            'header-text' => array( 'site-title', 'site-description' ),
        ];
    }




}