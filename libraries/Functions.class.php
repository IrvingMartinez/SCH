<?php
defined('_EXEC') or die;

class Functions
{
    private $database;
    private $security;

    public function __construct()
    {
        $this->database = new Medoo();
        $this->security = new Security();
    }

    static function check_session()
    {
        return ( isset($_COOKIE['_vkye_token']) && !empty($_COOKIE['_vkye_token']) ) ? ( Session::exists_var('_vkye_token') && Session::exists_var('_vkye_id_user') && Session::exists_var('_vkye_user') && Session::exists_var('_vkye_last_access') && Session::exists_var('_vkye_level') ) ? true : false : false;
    }

    static function admin_levels() : array
    {
        return [
            '{sysadmin}',
            '{administrator}'
        ];
    }

    static function put_button_hamburger_menu( $id = null )
    {
        $id = ( is_null($id) ) ? 'trigger-nav-mobile' : $id;
        return "<button id='{$id}' class='button-hamburger-menu menu-wrapper'> <div class='hamburger-menu'></div> </button>";
    }
}
