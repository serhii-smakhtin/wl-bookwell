<?php
/**
 * Created by PhpStorm.
 * User: ilyapolyakov
 * Date: 2019-05-21
 * Time: 20:54
 */


namespace themes\bookwell\classes;

use themes\bookwell\classes\base\Base;


class Mailer extends Base
{
    private static $instance;

    protected $admin_mail = 'sales@wellnessliving.com';
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
     * @return Mailer
     */
    public static function get_instance()
    {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }

    public function init()
    {
        add_action( 'phpmailer_init', [$this, 'set_options'] );
        add_action( 'wp_mail_content_type', [$this, 'set_type'] );
        add_action( 'wp_ajax_send_lead', [$this, 'send_lead'] );
        add_action( 'wp_ajax_nopriv_send_lead', [$this, 'send_lead'] );

    }

    public function set_options($phpmailer)
    {
        $phpmailer->isSMTP();
        $phpmailer->Host       = SMTP_HOST;
        $phpmailer->SMTPAuth   = SMTP_AUTH;
        $phpmailer->Port       = SMTP_PORT;
        $phpmailer->SMTPSecure = SMTP_SECURE;
        $phpmailer->Username   = SMTP_USERNAME;
        $phpmailer->Password   = SMTP_PASSWORD;
        $phpmailer->From       = SMTP_FROM;
        $phpmailer->FromName   = SMTP_FROMNAME;
    }

    public function set_type()
    {
        return "text/html";
    }

    public function send_mail($to, $subject, $message)
    {
        wp_mail($to, $subject, $message);
    }

    public function send_lead()
    {
        check_ajax_referer( 'contact_form', 'nonce' );
        $errors = $this->validateLead($_POST);
        if(count($errors)){
            echo json_encode($errors);
            wp_die();
        }
        $message = "<p>This contact is interested in learning more about BookWell, a comprehensive Google marketing tool powered by WellnessLiving</p>";
        $message .= "<ul>";
        $message .= !empty($_POST['firstname']) ? "<li>First name: ".$_POST['firstname']."</li>" : '';
        $message .= !empty($_POST['lastname']) ? "<li>Last name: ".$_POST['lastname']."</li>" : '';
        $message .= !empty($_POST['mail']) ? "<li>Email: ".$_POST['mail']."</li>" : '';
        $message .= !empty($_POST['phone']) ? "<li>Phone: ".$_POST['phone']."</li>" : '';
        $message .= !empty($_POST['url']) ? "<li>Web site: ".$_POST['url']."</li>" : '';
        $message .= !empty($_POST['industry']) ? "<li>Industry: ".$_POST['industry']."</li>" : '';
        $message .= !empty($_POST['reference']) ? "<li>Where did you heard about us: ".$_POST['reference']."</li>" : '';
        $message .= "</ul>";

        $this->send_mail($this->admin_mail, 'BookWell Lead', $message);
        echo 'success';
        wp_die();
    }
    protected function validateLead($fields)
    {
        $errors = [];
        if(!(filter_var($fields['mail'], FILTER_VALIDATE_EMAIL))) $errors['mail'] = 'Email is incorrect';
        if(!(filter_var($fields['url'], FILTER_VALIDATE_DOMAIN))) $errors['url'] = 'Web Site url is incorrect';
        if(empty($fields['firstname'])) $errors['firstname'] = 'First name is required';
        if(empty($fields['lastname'])) $errors['lastname'] = 'Last name is required';
        if(empty($fields['mail'])) $errors['mail'] = 'Mail is required';
        if(empty($fields['phone'])) $errors['phone'] = 'Phone is required';
        if(empty($fields['url'])) $errors['url'] = 'Web Site is required';
        if(empty($fields['industry'])) $errors['industry'] = 'your industry is required';


        return $errors;
    }


}