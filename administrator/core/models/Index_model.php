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
			"[>]positions" => [
                "id_position" => "id"
            ],
			"[>]areas" => [
                "id_area" => "id"
			]
        ], [
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
