<?php


namespace themes\bookwell\classes\base;

use WP_Customize_Color_Control;
/**
 * Class Customizer
 * @package themes\bookwell\classes\base
 */
class Customizer extends Base
{
    private static $instance;

    private function __construct()
    {

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
     * @return Customizer
     */
    public static function get_instance()
    {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }

    public function init()
    {
        add_action('customize_register', [$this, 'customize']);
        add_action('wp_head', [$this, 'customize_css']);
        add_action('admin_enqueue_scripts', [$this, 'live_preview']);
    }


    public function customize($wp_customize)
    {
        $wp_customize = $this->add_section($wp_customize,'bookwell_options', __( 'BookWell Options', 'bookwell' ), __('Allows you to customize some setting for BookWell.', 'bookwell'));
        $wp_customize = $this->add_color_option($wp_customize, 'mail_color', 'bookwell_options', __('Main color', 'bookwell'), __('Sites main color ', 'bookwell'), '#ec7f1f' );
        $wp_customize = $this->add_textarea_option($wp_customize, 'main_title', 'bookwell_options', __('Main tilte', 'bookwell'), __('Sites main tilte on homepage', 'bookwell'), "The Ultimate <br> Marketing Tool" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'main_subtitle', 'bookwell_options', __('Main subtilte', 'bookwell'), __('Sites main subtilte on homepage', 'bookwell'), "Paid advertisements aren’t the only way to dominate the first page of Google. Make the most of your <strong>Google My Business</strong> listing with BookWell." );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_title_1', 'bookwell_options', __('Box title 1', 'bookwell'), __('Left header box title', 'bookwell'), "Reserve with Google" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_subtitle_1', 'bookwell_options', __('Box subtitle 1', 'bookwell'), __('Left header box subtitle', 'bookwell'), "Instantly convert leads with a direct booking button on your Google My Business listing" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_title_2', 'bookwell_options', __('Box title 2', 'bookwell'), __('Middle header box title', 'bookwell'), "Online Reviews" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_subtitle_2', 'bookwell_options', __('Box subtitle 2', 'bookwell'), __('Middle header box subtitle', 'bookwell'), "Optimize your reputation by generating and filtering Google verified reviews" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_title_3', 'bookwell_options', __('Box title 3', 'bookwell'), __('Right header box title', 'bookwell'), "Listing Management" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'box_subtitle_3', 'bookwell_options', __('Box subtitle 3', 'bookwell'), __('Right header box subtitle', 'bookwell'), "Control your visual branding and maximize information on the first page of Google" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_2_subtitle', 'bookwell_options', __('Second banner subtitle', 'bookwell'), __('Second banner text on the top', 'bookwell'), "DON’T LOSE YOUR LEADS" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_2_title', 'bookwell_options', __('Second banner title', 'bookwell'), __('Second banner main title', 'bookwell'), "Up to <strong>80% of all leads</strong> drop off early" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_2_description', 'bookwell_options', __('Second banner description', 'bookwell'), __('Second banner description below', 'bookwell'), "Google estimates an 80% drop-off rate between online searches and conversions. Why? The answer is simple. Too many clicks. With every step in the booking process, the drop-off risk grows." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_1_description',
            'bookwell_options',
            __('1 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Ian is halfway through the booking process when his kids get home from school and he’s instantly preoccupied." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_2_description',
            'bookwell_options',
            __('2 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Diana’s phone lights up with a new text." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_3_description',
            'bookwell_options',
            __('3 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Zhara is intrigued by your website but she doesn’t have time to fill out forms. She leaves the tab open on her computer. The next day, she restarts her computer and loses all her tabs." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_4_description',
            'bookwell_options',
            __('4 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Jason can’t find your online form. He procrastinates calling because he doesn’t like to talk on the phone." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_5_description',
            'bookwell_options',
            __('5 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Chantal is interested but is not sure what her next steps should be." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_6_description',
            'bookwell_options',
            __('6 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Annie can’t view your booking form properly from her mobile phone." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_7_description',
            'bookwell_options',
            __('7 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Sam is overwhelmed by his options and decides he doesn't have time to look into anything right now." );
        $wp_customize = $this->add_textarea_option($wp_customize,
            'slide_8_description',
            'bookwell_options',
            __('8 slide text', 'bookwell'),
            __('', 'bookwell'),
            "Yves becomes frustrated when your website’s internal search engine doesn’t show him what he is looking for. He goes back to his initial Google search, and ends up booking with a competitor." );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_3_subtitle', 'bookwell_options', __('Third banner subtitle', 'bookwell'), __('Third banner text on the top', 'bookwell'), "WHAT IS THE SOLUTION?" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_3_title', 'bookwell_options', __('Third banner title', 'bookwell'), __('Third banner main title', 'bookwell'), "Streamline <strong>Your Client</strong> Experience" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_3_description', 'bookwell_options', __('Third banner description', 'bookwell'), __('Third banner description below', 'bookwell'), "Google users are already searching for your services. Don’t let them slip away as they encounter distractions or navigation difficulties." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_subtitle', 'bookwell_options', __('4th banner subtitle', 'bookwell'), __('4th banner text on the top', 'bookwell'), "INTRODUCING" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_title', 'bookwell_options', __('4th banner title', 'bookwell'), __('4th banner main title', 'bookwell'), "<strong>Reserve</strong> with Google" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_description', 'bookwell_options', __('4th banner description', 'bookwell'), __('4th banner description below', 'bookwell'), "BookWell gives you unique access to Reserve with Google, the most streamlined online scheduling tool to date. Eliminate extra steps in your booking flow by adding a direct booking button to your Google My Business listing." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_left_box', 'bookwell_options', __('4th banner left box', 'bookwell'), __('', 'bookwell'), "Instantly<br>Boost SEO" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_middle_box', 'bookwell_options', __('4th banner middle box', 'bookwell'), __('', 'bookwell'), "Make Your Profile Stand Out" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_right_box', 'bookwell_options', __('4th banner right box', 'bookwell'), __('', 'bookwell'), "Optimize User Experience" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_4_screens_title', 'bookwell_options', __('4th banner screens title', 'bookwell'), __('', 'bookwell'), "Lock in Leads with Three Easy Steps" );

        $wp_customize = $this->add_textarea_option($wp_customize, '1_advertisement_title', 'bookwell_options', __('1st Advertisement title', 'bookwell'), __('', 'bookwell'), "Reach the Right People" );
        $wp_customize = $this->add_textarea_option($wp_customize, '1_advertisement_subtitle', 'bookwell_options', __('1st Advertisement subtitle', 'bookwell'), __('', 'bookwell'), "The best possible audience to market to is the audience that is already actively looking for your services. Capture the interest of Google users at the optimal time." );

        $wp_customize = $this->add_textarea_option($wp_customize, '2_advertisement_title', 'bookwell_options', __('2nd Advertisement title', 'bookwell'), __('', 'bookwell'), "Mobile-friendly Marketing" );
        $wp_customize = $this->add_textarea_option($wp_customize, '2_advertisement_subtitle', 'bookwell_options', __('2nd Advertisement subtitle', 'bookwell'), __('', 'bookwell'), "Make your business stand out to mobile users. Reserve with Google makes it easy to schedule services from mobile browsers and the Google Maps app." );

        $wp_customize = $this->add_textarea_option($wp_customize, '3_advertisement_title', 'bookwell_options', __('3rd Advertisement title', 'bookwell'), __('', 'bookwell'), "Capture Local Traffic" );
        $wp_customize = $this->add_textarea_option($wp_customize, '3_advertisement_subtitle', 'bookwell_options', __('1st Advertisement subtitle', 'bookwell'), __('', 'bookwell'), "Automatically target users by location and direct nearby leads right to your door. Update schedules in bulk or customize the schedule for each location." );

        $wp_customize = $this->add_textarea_option($wp_customize, '4_advertisement_title', 'bookwell_options', __('4th Advertisement title', 'bookwell'), __('', 'bookwell'), "Built-in SMS & Email Automation" );
        $wp_customize = $this->add_textarea_option($wp_customize, '4_advertisement_subtitle', 'bookwell_options', __('4th Advertisement subtitle', 'bookwell'), __('', 'bookwell'), "BookWell makes it easy to automate texts and emails. Keep every client connected with customized confirmation messages and appointment reminders." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_5_subtitle', 'bookwell_options', __('5th banner subtitle', 'bookwell'), __('', 'bookwell'), "BOOKWELL REVIEWS" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_5_title', 'bookwell_options', __('5th banner title', 'bookwell'), __('', 'bookwell'), "Control <strong>Your Online</strong> Reputation" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_5_description', 'bookwell_options', __('5th banner description', 'bookwell'), __('', 'bookwell'), "Generate, manage, and respond to reviews — all from one simple dashboard." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_6_subtitle', 'bookwell_options', __('6th banner subtitle', 'bookwell'), __('', 'bookwell'), "CUSTOMER REVIEWS" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_6_title', 'bookwell_options', __('6th banner title', 'bookwell'), __('', 'bookwell'), "Generate<br><strong>Spread the Word</strong>" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_6_description', 'bookwell_options', __('6th banner description', 'bookwell'), __('', 'bookwell'), "Nothing makes your business look better than genuine customer satisfaction. Generate more positive reviews by sending custom automated emails to clients immediately after they engage with your services." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_7_subtitle', 'bookwell_options', __('7th banner subtitle', 'bookwell'), __('', 'bookwell'), "SHOWCASE YOUR BRAND" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_7_title', 'bookwell_options', __('7th banner title', 'bookwell'), __('', 'bookwell'), "Manage <strong>Your</strong><br>Image" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_7_description', 'bookwell_options', __('7th banner description', 'bookwell'), __('', 'bookwell'), "Put your best foot forward by selecting which reviews to showcase on your public profile." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_8_subtitle', 'bookwell_options', __('8th banner subtitle', 'bookwell'), __('', 'bookwell'), "CONNECT WITH YOUR CLIENTS" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_8_title', 'bookwell_options', __('8th banner title', 'bookwell'), __('', 'bookwell'), "Join The<br><strong>Conversation</strong>" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_8_description', 'bookwell_options', __('8th banner description', 'bookwell'), __('', 'bookwell'), "Don’t let conversations about your business happen without you! Easily respond to customer reviews and public questions via one simple dashboard." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_title', 'bookwell_options', __('9th banner title', 'bookwell'), __('', 'bookwell'), "Google My Business Listing Management<br><strong>Keep Prospects Informed</strong>" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_description', 'bookwell_options', __('9th banner description', 'bookwell'), __('', 'bookwell'), "Keeping your information up-to-date and easily accessible has never been more vital. In the digital era, your prospective clients expect that everything they need to know about your services will be just a few clicks away." );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_list_1', 'bookwell_options', __('9th banner 1st element', 'bookwell'), __('', 'bookwell'), "Ensure hours for each location are accurate and reflect holiday closures" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_list_2', 'bookwell_options', __('9th banner 2nd element', 'bookwell'), __('', 'bookwell'), "Customize images to maintain clear, consistent branding" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_list_3', 'bookwell_options', __('9th banner 3rd element', 'bookwell'), __('', 'bookwell'), "Claim or create new listings with ease" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_9_list_4', 'bookwell_options', __('9th banner 4th element', 'bookwell'), __('', 'bookwell'), "Push global updates across all listings" );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_title', 'bookwell_options', __('10th banner title', 'bookwell'), __('', 'bookwell'), "Get Started with <strong>BookWell</strong>" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_description', 'bookwell_options', __('10th banner description', 'bookwell'), __('', 'bookwell'), "BookWell is the only tool that can grant you access to ALL these powerful Google integrations." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_left_title', 'bookwell_options', __('10th banner left title', 'bookwell'), __('', 'bookwell'), "Option 1: Quick Launch" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_left_subtitle', 'bookwell_options', __('10th banner left subtitle', 'bookwell'), __('', 'bookwell'), "Potential to launch pilot in less than a week" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_left_text', 'bookwell_options', __('10th banner left text', 'bookwell'), __('', 'bookwell'), "<strong>Launch BookWell independently from your current booking system.</strong><br><br><strong>Step 1</strong><br>Set aside designated time slots in your staff members’ calendars for Reserve with Google appointments.<br><br><strong>Step 2</strong><br>List the time slots on WellnessLiving." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_right_title', 'bookwell_options', __('10th banner right title', 'bookwell'), __('', 'bookwell'), "Option 2: System Integration" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_right_subtitle', 'bookwell_options', __('10th banner right subtitle', 'bookwell'), __('', 'bookwell'), "Integrate BookWell with your current software" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_10_right_text', 'bookwell_options', __('10th banner right text', 'bookwell'), __('', 'bookwell'), "<strong>WellnessLiving’s full RESTful API and SDK documentation make integration easy.</strong><br><br>WellnessLiving currently integrates with<br>Zoho CRM, Atlassian JIRA, Amazon Web Services, ClassPass, and more.<br><br><strong>Coming Soon:</strong> Microsoft Dynamics CRM and Intuit QuickBooks" );

        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_11_title', 'bookwell_options', __('11th banner title', 'bookwell'), __('', 'bookwell'), "Frequently Asked<br>Questions" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_11_question_1', 'bookwell_options', __('11th banner question 1', 'bookwell'), __('', 'bookwell'), "What is a Google My<br>Business listing?" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_11_answer_1', 'bookwell_options', __('11th banner answer 1', 'bookwell'), __('', 'bookwell'), "A Google My Business listing is a customizable profile that appears when people are searching for your business or businesses like yours on Google Search and Google Maps. Listings are based on physical address, so businesses with multiple branches or locations have multiple Google My Business profiles." );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_11_question_2', 'bookwell_options', __('11th banner question 2', 'bookwell'), __('', 'bookwell'), "What kinds of businesses can benefit from BookWell?" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'banner_11_answer_2', 'bookwell_options', __('11th banner answer 2', 'bookwell'), __('', 'bookwell'), "BookWell is perfect for multi-location businesses that offer appointments or classes. Reserve with Google is the future of online scheduling and has quickly become a dominant lead generation source for everything from personal banking services to yoga classes. Note that Reserve with Google is currently not available to medical practices." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'form_title', 'bookwell_options', __('Form title', 'bookwell'), __('', 'bookwell'), "Start Booking More Services" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'form_subtitle', 'bookwell_options', __('Form subtitle', 'bookwell'), __('', 'bookwell'), "Take your Google marketing strategy to the next level with BookWell." );

        $wp_customize = $this->add_textarea_option($wp_customize, 'form_footer', 'bookwell_options', __('Form label', 'bookwell'), __('', 'bookwell'), "Or Simply Call Us To Get Started" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'phone', 'bookwell_options', __('Phone link', 'bookwell'), __('', 'bookwell'), "1-888-668-7728" );
        $wp_customize = $this->add_textarea_option($wp_customize, 'form_number', 'bookwell_options', __('Phone visible', 'bookwell'), __('', 'bookwell'), "1 (888) 668-7728" );

        //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head', $func)
     * @since BookWell 1.0
     */
    public function customize_css()
    { ?>
        <!--Customizer CSS-->
        <style type="text/css">
            <?php $this->generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?>
            <?php $this->generate_css('body', 'background-color', 'background_color', '#'); ?>
            <?php $this->generate_css('header', 'background-color', 'mail_color'); ?>
            <?php $this->generate_css('.article-1', 'background-color', 'mail_color'); ?>
            <?php// $this->generate_css('.article-5', 'background', 'alter_background_color'); ?>
        </style>
        <!--/Customizer CSS-->
    <?php
    }

    /**
     * @param $wp_customize
     * @param $id
     * @param $label
     * @param $description
     * @param $priority = 35
     * @return mixed
     */
    protected function add_section($wp_customize, $id, $title, $description, $priority = 35)
    {
        $wp_customize->add_section( $id,
            array(
                'title'       => $title,
                'priority'    => $priority,
                'capability'  => 'edit_theme_options',
                'description' => $description,
            )
        );
        return $wp_customize;
    }

    /**
     * @param $wp_customize
     * @param $id
     * @param $section
     * @param $label
     * @param $description
     * @param $default
     * @return mixed
     */
    protected function add_color_option($wp_customize, $id, $section, $label, $description, $default)
    {
        //2. Register new settings to the WP database...
        $wp_customize->add_setting( $id, //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
            array(
                'default'    => $default,
                'capability' => 'edit_theme_options',
                'transport'  => 'postMessage',
            )
        );

        //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
        $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
            $wp_customize, //Pass the $wp_customize object (required)
            'bookwell_alter_background_color', //Set a unique ID for the control
            array(
                'label'      => $label, //Admin-visible name of the control
                'settings'   => $id, //Which setting to load and manipulate (serialized is okay)
                'priority'   => 10, //Determines the order this control appears in for the specified section
                'section'    => $section, //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                'description'    => $description, //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ) );
        return $wp_customize;
    }


    /**
     * @param $wp_customize
     * @param $id
     * @param $section
     * @param $label
     * @param $description
     * @param $default
     * @return mixed
     */
    protected function add_image_option($wp_customize, $id, $section, $label, $description, $default)
    {
        /** TODO: Image customizer control */
        return $wp_customize;
    }


    /**
     * @param $wp_customize
     * @param $id
     * @param $section
     * @param $label
     * @param $description
     * @param $default
     * @return mixed
     */
    protected function add_textarea_option($wp_customize, $id, $section, $label, $description, $default)
    {
        $wp_customize->add_setting( $id, array(
            'capability' => 'edit_theme_options',
            'default' => $default,
//            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( $id, array(
            'type' => 'textarea',
            'section' => $section,
            'label' => $label,
            'description' => $description,
        ) );
        return $wp_customize;
    }

    /**
     * @param $wp_customize
     * @param $id
     * @param $section
     * @param $label
     * @param $description
     * @param $default
     * @return mixed
     */
    protected function add_text_option($wp_customize, $id, $section, $label, $description, $default)
    {
        $wp_customize->add_setting( $id, array(
            'capability' => 'edit_theme_options',
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( $id, array(
            'type' => 'text',
            'section' => $section,
            'label' => $label,
            'description' => $description,
        ) );
        return $wp_customize;
    }


    /**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     *
     * Used by hook: 'customize_preview_init'
     *
     * @see add_action('customize_preview_init',$func)
     * @since BookWell 1.0
     */
    public function live_preview() {
        wp_enqueue_script('bookwell-sceditor', '//cdn.ckeditor.com/4.11.2/full/ckeditor.js', array(  'jquery', 'customize-preview' ), '',true);
//        wp_enqueue_script( 'tiny_mce' );

        wp_enqueue_script('bookwell-customizer', get_theme_file_uri() . '/assets/js/theme-customizer.js', array(  'jquery', 'customize-preview', 'bookwell-sceditor' ), '',true);
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since BookWell 1.0
     */
    protected function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if ( ! empty( $mod ) ) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix.$mod.$postfix
            );
            if ( $echo ) {
                echo $return;
            }
        }
        return $return;
    }

}