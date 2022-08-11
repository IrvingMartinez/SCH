<?php
defined('_EXEC') or die;

class Monitor_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /* Selects
	------------------------------------------------------------------------------- */
	public function get_all_employees()
	{
		return $this->database->select('employees', [
			'id',
			'name',
			'ap_pat',
			'ap_mat',
			'num_employee',
			'avatar',
			'status'
		], [
			'ORDER' => [
				'employees.name' => 'ASC'
			]
		]);
	}

    public function get_data_employee( $id = null )
    {
        if ( is_null($id) )
            return null;

        $response = $this->database->select('employees', [
            'name',
            'ap_pat',
            'ap_mat',
            'curp',
            'rfc',
            'num_employee',
            'cuip',
            'avatar',
            'status',
            'num_card',
            'id_position',
            'id_area',
            'id_city',
            'id_municipality'
        ], [
            'id' => $id
        ]);

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
    }

    public function get_positions()
    {
        return $this->database->select('positions', '*');
    }

    public function get_areas()
    {
        return $this->database->select('areas', '*');
    }

    public function get_cities()
    {
        return $this->database->select('cities', '*');
    }

    public function get_municipalities()
    {
        return $this->database->select('municipalities', '*');
    }
}
