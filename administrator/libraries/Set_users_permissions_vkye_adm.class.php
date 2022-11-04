<?php
defined('_EXEC') or die;

class Set_users_permissions_vkye_adm
{
    static public function permissions($key = null)
    {
        $arr = [
            'Index/index' => 'ALL',
            'Manager/index' => 'ALL',
            'Manager/incidence_report' => 'ALL',
            'Manager/send_report' => 'ALL',
            'Inbox/index' => 'ALL',
            'Inbox/incidence_report' => 'ALL',
            'Schedule/index' => 'ALL',
            'Monitor/index' => 'ALL',
            'Monitor/create_employee' => 'ALL',
            'Monitor/update_employee' => 'ALL',
            'Monitor/create_position' => 'ALL',
            'Monitor/delete_position' => 'ALL',
            'Monitor/create_area' => 'ALL',
            'Monitor/delete_area' => 'ALL',
            'Monitor/create_municipality' => 'ALL',
            'Monitor/delete_municipality' => 'ALL',
            'Help/index' => ['{help_development}'],
            'Users/index' => ['{users_read}'],
            'Users/create_user' => ['{users_create}'],
            'Users/update_data_user' => ['{users_update}'],
            'Users/delete_user' => ['{users_delete}'],
            'Users/create_permission' => ['{permissions_create}'],
            'Users/delete_permission' => ['{permissions_delete}'],
            'Blog/index' => ['{blog_read}'],
            'Blog/create_article' => ['{blog_create}'],
            'Blog/update_article' => ['{blog_update}'],
            'Blog/delete_article' => ['{blog_delete}'],
            'Blog/create_category' => ['{categories_blog_create}'],
            'Blog/delete_category' => ['{categories_blog_delete}']
        ];

        return ( isset($arr[$key]) ) ? $arr[$key] : null;
    }
}
