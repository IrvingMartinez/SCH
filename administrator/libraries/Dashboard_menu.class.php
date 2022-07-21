<?php
defined('_EXEC') or die;

class Dashboard_menu
{
    static public function main_menu() : array
    {
        $menu = [];

        $menu[] = [
            'name' => 'General',
            'url' => 'index.php',
            'icon' => 'dripicons-home'
        ];

        $menu[] = [

          'name' => 'Incidencias',
          'url' => 'index.php?c=manager',
          'icon' => 'dripicons-flag'
        ];

        $menu[] = [

           'name' => 'Monitoreo',
           'url' => 'index.php?c=monitor',
           'icon' => 'dripicons-user-group'
        ];


        // if ( in_array('{blog_read}', Session::get_value('session_permissions')) )
        // {
        //     $menu[] = [
        //         'name' => 'Blog',
        //         'url' => 'index.php?c=blog',
        //         'taget' => '_blank',
        //         'icon' => 'dripicons-blog'
        //     ];
        // }

        return $menu;
    }
}
