<?php
defined('_EXEC') or die;

class Users_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_levels()
	{
		return $this->database->select("levels", '*');
	}

	public function get_all_areas()
	{
		return $this->database->select("areas", '*');
	}

	public function get_all_permissions()
	{
		return $this->database->select("permissions", '*');
	}

	public function get_all_users()
	{
		return $this->database->select("users", [
			"[>]levels" => [
				"id_level" => "id"
			],
			"[>]areas" => [
				"id_area" => "id"
			]
		], [
			"users.id",
			"users.username",
			"levels.title (level)",
			"areas.title (area)",
		], [
			"ORDER" => [
				'users.id' => 'ASC'
			]
		]);
	}

	public function get_data_user( $id = null )
	{
		$response = $this->database->select("users", [
			"[>]levels" => [
				"id_level" => "id"
			],
			"[>]areas" => [
				"id_area" => "id"
			]
		], [
			"users.id",
			"users.username",
			"levels.id (level)",
			"areas.id (area)",
			"users.permissions [Object]",
		], [
			"users.id" => $id,
			"ORDER" => [
				'users.id' => 'ASC'
			]
		]);

		if ( isset($response[0]) && !empty($response[0]) )
		{
			$response = $response[0];

			return $response;
		}
		else return [];
	}

	public function create_user( $data = null )
	{
		if ( is_null($data) )
			return null;

		$this->database->insert('users', [
			'username' => $data['username'],
			'password' => $this->security->create_password($data['password']),
			'id_level' => $data['level'],
			'id_area' => $data['area'],
			'permissions' => $data['permissions']
		]);
	}

	public function update_data_user( $data = null )
	{
		if ( is_null($data) )
			return null;

		$update = [
			'username' => $data['username'],
			'id_level' => $data['level'],
			'id_area' => $data['area'],
			'permissions' => $data['permissions']
		];

		if ( !is_null($data['password']) )
			$update['password'] = $this->security->create_password($data['password']);

		$this->database->update('users', $update, [
			'id' => $data['id']
		]);
	}

	public function delete_user( $data = null )
	{
		if ( is_null($data) )
			return null;

		$this->database->delete('users', [
			'id' => $data['id']
		]);
	}

	public function create_permission( $data = null )
	{
		if ( is_null($data) )
			return null;

		$this->database->insert('permissions', [
			'code' => $data['code'],
			'title' => $data['title']
		]);
	}

	public function delete_permission( $data = null )
	{
		if ( is_null($data) )
			return null;

		$this->database->delete('permissions', [
			'id' => $data['id']
		]);
	}
}
