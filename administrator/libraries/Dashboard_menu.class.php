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
                'name' => 'Inbox RH',
                'url' => 'index.php?c=inbox',
                'icon' => 'dripicons-mail'
        ];

        $menu[] = [
           'name' => 'Empleados',
           'url' => 'index.php?c=monitor',
           'icon' => 'dripicons-user-group'
        ];

        $menu[] = [
          'name' => 'Horarios',
          'url' => 'index.php?c=schedule',
          'icon' => 'dripicons-alarm'
        ];

        $menu[] = [
                'name' => 'Entradas',
                'url' => 'index.php?c=entry',
                'icon' => 'dripicons-flag'
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
