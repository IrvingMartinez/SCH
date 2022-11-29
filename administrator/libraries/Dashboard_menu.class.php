<?php
defined('_EXEC') or die;

class Dashboard_menu
{
    static public function main_menu() : array
    {
        $menu = [];

        $menu[] = [
            'name' => 'Check In',
            'url' => 'index.php',
            'icon' => 'dripicons-home'
        ];

        $menu[] = [
                'name' => 'Areas',
                'url' => 'index.php?c=entry',
                'icon' => 'dripicons-network-3'
        ];

        $menu[] = [
           'name' => 'Empleados',
           'url' => 'index.php?c=monitor',
           'icon' => 'dripicons-user-group'
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

<<<<<<< HEAD
        if ( in_array('{employees}', Session::get_value('session_permissions')) )
        {
            $menu[] = [
               'name' => 'Empleados',
               'url' => 'index.php?c=monitor',
               'icon' => 'dripicons-user-group'
            ];
        }

=======
>>>>>>> 0fef651766d1ecf6ef651c3bc0f3f4c95daeeddd
        $menu[] = [
          'name' => 'Horarios',
          'url' => 'index.php?c=schedule',
          'icon' => 'dripicons-alarm'
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
