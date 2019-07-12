<?php


namespace themes\bookwell\classes\base;

/**
 * Class Options
 * @package themes\bookwell\classes\base
 *
 * @property string site_logo_url
 */
class Options extends Base
{
    private static $instance;

    protected $key = 'bookwell_';

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
     * @return Options
     */
    public static function get_instance()
    {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setOption($name, $value)
    {
        update_option($this->key.$name, $value);
    }


    /**
     * @param $name
     * @return mixed|void
     */
    public function getOption($name)
    {
        return get_option($this->key.$name);
    }

    /**
     * @return string
     */
    public function get_site_logo_url()
    {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        return esc_url($logo[0]);
    }

    public function get_home_logo_url()
    {

    }

}