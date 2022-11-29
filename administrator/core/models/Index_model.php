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

		global $sched_time, $timeLate, $time_stamp, $time_sum, $date_check, $check_time;

		// sqli fetch

		$sched_time = $employee['sched_time'];
		$time_late = strtotime($sched_time);
		$time_sum = $time_late + 600;
		$time_stamp = date('H:i:s', $time_sum);

		// String to Unix Conversion

		$time_cross_1 = strtotime($sched_time);
		$time_cross_2 = strtotime($time_stamp);

		$time_now = date("H:i:s");

		$time_cross_n = strtotime($time_now);

		// Unix to string for sqli insertion

		$time_1 = date('H:i:s', $time_cross_1);
		$time_2 = date('H:i:s', $time_cross_2);
		$time_3 = date('H:i:s', $time_cross_n);

		// Logic gates

		if($time_cross_n > $time_cross_2)
		{
			return $this->database->insert(
					'entries',
					[
					// fields
					'check_date' => date('Y-m-d'),
					'check_time' => $time_3,
					'entry_date' => date('Y-m-d'),
					'entry_time' => $time_1,
					'status_entry' => '1',
					'status_response' => '1',
					'id_employee' => $employee['id_emp']
					]
			);
		}
		else
		{
			return $this->database->insert(
					'entries',
					[
					// fields
					'check_date' => date('Y-m-d'),
					'check_time' => $time_3,
					'entry_date' => date('Y-m-d'),
					'entry_time' => $time_1,
					'status_entry' => '0',
					'status_response' => '0',
					'id_employee' => $employee['id_emp']
					]
			);
		}

		// function ends
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
