<?php
defined('_EXEC') or die;

class Pages_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_employees()
	{
		return $this->database->select('employees', [
            "[>]positions" => [
                "id_position" => "id"
            ],
            "[>]areas" => [
                "id_area" => "id"
            ]
        ], [
			'employees.id',
			'employees.name',
			'employees.ap_pat',
			'employees.ap_mat',
			'employees.num_employee',
			'employees.avatar',
			'employees.status',
            'positions.title (position)',
            'areas.title (area)'
		], [
			'ORDER' => [
				'name' => 'ASC'
			]
		]);
	}

}
