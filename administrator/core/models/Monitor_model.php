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

    public function get_positions()
    {
        return $this->database->select('positions', '*');
    }

    public function get_areas()
    {
        return $this->database->select('areas', '*');
    }

    public function get_municipalities()
    {
        return $this->database->select('municipalities', '*');
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
            'id_position',
            'id_area',
            'id_municipality'
        ], [
            'id' => $id
        ]);

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
    }

    public function save_employee( $data = [], $edit = false )
	{
		if ( empty($data) )
		/*  */ return null;

		$config_uploads = [
			'path_uploads' => PATH_UPLOADS,
			'set_name' => 'FILE_NAME_LAST_RANDOM'
		];

		$save = [
			'name' => $data['name'],
			'ap_pat' => $data['ap_pat'],
			'ap_mat' => $data['ap_mat'],
			'curp' => $data['curp'],
			'rfc' => $data['rfc'],
			'num_employee' => $data['num_employee'],
			'cuip' => $data['cuip'],
			'status' => $data['status'],
			'num_card' => $data['num_card'],
			'id_position' => $data['position'],
			'id_area' => $data['area'],
			'id_municipality' => $data['municipality']
		];

		if ( !empty($data['image_cover']['name']) )
		{
			$data['image_cover'] = Upload::upload_file($data['image_cover'], $config_uploads);
			$save['avatar'] = $data['image_cover']['file'];
		}

		if ( $edit == false )
		{
			$this->database->insert('employees', $save);

			if ( $this->database->id() )
			/*  */ return [ 'status' => 'OK' ];
			else
			{
				return [
					'status' => 'fatal_error',
					'message' => 'Ocurrió un problema al guardar el empleado.'
				];
			}
		}

		if ( $edit == true )
		{
			$this->database->update('employees', $save, [
				'id' => $data['id']
			]);

			return [ 'status' => 'OK' ];
		}
	}

    public function create_position( $data = null )
    {
        if ( is_null($data) )
            return null;

        $this->database->insert('positions', [
            'code' => $data['code'],
            'title' => $data['title']
        ]);
    }

    public function create_area( $data = null )
    {
        if ( is_null($data))
        return null;

        $this->database->insert('areas', [
            'code' => $data['code'],
            'title' => $data['title']
        ]);
    }

    public function create_municipality( $data = null )
    {
        if ( is_null($data))
        return null;

        $this->database->insert('municipalities', [
            'code' => $data['code'],
            'title' => $data['title']
        ]);
    }

    public function delete_position( $data = null )
    {
        if ( is_null($data) )
            return null;

        $this->database->delete('positions', [
            'id' => $data['id']
        ]);
    }

    public function delete_area( $data = null )
    {
        if ( is_null($data) )
            return null;

        $this->database->delete('areas', [
            'id' => $data['id']
        ]);
    }

    public function delete_municipality( $data = null )
    {
        if ( is_null($data) )
            return null;

        $this->database->delete('municipalities', [
            'id' => $data['id']
        ]);
    }
}
