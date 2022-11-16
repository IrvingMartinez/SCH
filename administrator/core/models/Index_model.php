<?php
defined('_EXEC') or die;

class Index_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_employee( $id = null )
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
            'num_family',
            'id_position',
            'id_area',
            'id_municipality'
        ], [
            'num_card' => $id
        ]);

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
    }
}
