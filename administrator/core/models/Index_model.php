<?php
defined('_EXEC') or die;

class Index_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create_entry( $card_num )
	{

		// Pull variables from model / sqli

		global $employee;
		$employee = $this->get_employee($card_num);

		// Compare timestamps

		global $timeCheck, $timeLate, $date_check;

		return $this->database->insert(
				'entries',
				[
				// fields
				'check_date' => date('Y-m-d'),
				'check_time' => date('H:i:s'),
				'entry_date' => date('Y-m-d'),
				'entry_time' => $employee['sched_time'],
				// Agregar función de identificación automática
				'status_entry' => '1',
				'status_response' => '1',
				'id_employee' => $employee['id_emp']
				]
		);

	}

	public function get_employee( $id = null )
    {
        if ( is_null($id) )
            return null;

        $response = $this->database->select('employees', [
			"[>]positions" => [
                "id_position" => "id"
            ],
			"[>]areas" => [
                "id_area" => "id"
			]
        ], [
			'employees.id (id_emp)',
			'employees.sched_time',
			'name',
            'ap_pat',
            'ap_mat',
            'cuip',
            'avatar',
            'num_card',
            'id_position',
			'positions.title (position)',
            'areas.title (area)'
        ], [
            'num_card' => $id
        ]);

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
    }
}
