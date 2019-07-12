<?php
/**
 * BookWell functions and definitions
 *
 *
 * @package WordPress
 * @subpackage BookWell
 * @since 1.0.0
 */

use themes\bookwell\classes\Mailer;
use themes\bookwell\classes\base\Base;
use themes\bookwell\classes\base\Options;
use themes\bookwell\classes\base\Settings;
use themes\bookwell\classes\base\Customizer;

define('BOOKWELL_DIR', trailingslashit(dirname(__FILE__)));
define('BOOKWELL_URL', trailingslashit(get_stylesheet_directory_uri()));
define('BOOKWELL_IMAGES', trailingslashit(BOOKWELL_URL.'/assets/images/'));

require_once 'autoload.php';


/**
 * Class BookWell
 *
 * @property Options options;
 *
 */
class BookWell extends Base
{
    private static $instance;

    /**
     * BookWell constructor.
     */
    private function __construct()
    {
        $this->init();
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
     * @return BookWell
     */
    public static function get_instance()
    {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }

    protected function init()
    {
        add_action('wp_enqueue_scripts',    [$this, 'add_scripts']);
        add_action('wp_enqueue_scripts',    [$this, 'add_styles']);
        add_action('admin_enqueue_scripts', [$this, 'add_scripts_admin']);
        add_action('admin_enqueue_scripts', [$this, 'add_styles_admin']);
        Settings::get_instance()->init();
        Customizer::get_instance()->init();
        Mailer::get_instance()->init();

    }


    public function add_scripts()
    {
        wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.js' ), ['jquery'], '1.0', true );
        wp_enqueue_script( 'select2-js', get_theme_file_uri( '/assets/js/select2.min.js' ), ['jquery'], '1.0', true );
        // font awesome scripts
        wp_enqueue_style( 'font-awesome-js', get_theme_file_uri( '/assets/font-awesome/js/all.min.css' ), ['reset' ]);

        if(is_home()) wp_enqueue_script( 'front-page', get_theme_file_uri( '/assets/js/front-page.js' ), ['owl-carousel'], '1.0', true );
        wp_localize_script( 'front-page', 'wp_options', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('contact_form'),
        ] );

    }

    public function add_styles()
    {
        // Theme stylesheet.
        wp_enqueue_style( 'bookwell-style', get_stylesheet_uri() );
        wp_enqueue_style( 'reset', get_theme_file_uri( '/assets/css/reset.css' ), ['bookwell-style'], '1.0' );
        // Custom fonts
        wp_enqueue_style( 'avenir', get_theme_file_uri( '/assets/css/fonts/avenir/avenir.css' ), ['reset'], '1.0' );
        wp_enqueue_style( 'arvo', get_theme_file_uri( '/assets/css/fonts/arvo/arvo.css' ), ['reset'], '1.0' );
        // Flaticons
        wp_enqueue_style( 'flaticon', get_theme_file_uri( '/assets/css/flaticon/flaticon.css' ), ['reset'], '1.0' );
        // Owl stylesheets.
        wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ), ['reset'] );
        wp_enqueue_style( 'owl-default', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ), ['reset'] );
        // Common styles
        wp_enqueue_style( 'bookwell-style-common', get_theme_file_uri( '/assets/css/style.css' ), ['reset' ], '1.0' );
        wp_enqueue_style( 'bookwell-style-media', get_theme_file_uri( '/assets/css/media.css' ), ['reset' ], '1.0' );
        wp_enqueue_style( 'contact-form', get_theme_file_uri( '/assets/css/contact-form.css' ), ['reset' ], '1.0' );
        wp_enqueue_style( 'select2-css', get_theme_file_uri( '/assets/css/select2.min.css' ), ['reset' ], '1.0' );
        // font awesome styles
        wp_enqueue_style( 'font-awesome-css', get_theme_file_uri( '/assets/font-awesome/css/all.min.css' ), ['reset' ]);

    }

    public function add_scripts_admin()
    {

    }

    public function add_styles_admin()
    {

    }

    /**
     * @return Options
     */
    public function get_options()
    {
        return Options::get_instance();
    }


}

function bookwell()
{
    return BookWell::get_instance();
}

bookwell();