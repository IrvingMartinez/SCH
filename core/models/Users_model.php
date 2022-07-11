<?php
defined('_EXEC') or die;

class Users_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user( $data = [] )
	{
		if ( is_null($data) )
			return false;

		$query = $this->database->select("users", [
			"[>]levels" => [
				"id_level" => "id"
			]
		], [
			"users.id",
			"users.username",
			"users.name",
			"users.email",
			"users.phone",
			"users.password",
			"users.permissions [Object]",
			"levels.code"
		], [
			"AND" => [
				"email" => $data['email'],
				"users.id_level[=]levels.id"
			]
		]);

		return ( isset($query[0]) && !empty($query[0]) ) ? $query[0] : null;
	}

	public function create_user( $data = null )
	{
		if ( is_null($data) )
			return null;

		$this->database->insert('users', [
			'username' => $data['username'],
			'name' => $data['name'],
			'email' => $data['email'],
			'phone' => $data['phone'],
			'password' => $this->security->create_password($data['password']),
			'id_level' => 11,
			'permissions' => null
		]);

		if ( $this->database->id() )
			return true;
		else
			return null;
	}

	public function create_session( $user = null )
	{
		if ( is_null($user) )
			return null;

		$token = $this->security->random_string(128);

		if ( $this->log_session([ 'id_user' => $user['id'], 'token' => $token ]) )
		{
			setcookie('_vkye_token', $user['id'] .':'. $this->security->random_string(4) .':'. $token, time() + (Configuration::$cookie_lifetime * 30), "/");

			Session::create_session_login([
				'token' => $token,
				'id_user' => $user['id'],
				'user' => $user['username'],
				'last_access' => Format::get_date_hour(),
				'level' => $user['code']
			]);

			Session::set_value('session_permissions', $user['permissions']);
		}

		return true;
	}

	public function log_session( $data = null, $action = 'login' )
	{
		if ( is_null($data) )
			return false;

		switch ( $action )
		{
			case 'login':
			default:
				$this->database->insert('sessions', [
					'id_user' => $data['id_user'],
					'token' => $data['token'],
					'login_date' => date('Y-m-d H:i:s'),
					'connection' => Security::get_client_info()
				]);

				if ( $this->database->id() )
					return true;
				else
					return false;
				break;

			case 'logout':
				$this->database->update('sessions', [
					'logout_date' => date('Y-m-d H:i:s')
				], [
					'AND' => [
						'id_user' => $data['id_user'],
						'token' => $data['token']
					]
				]);

				return true;
				break;
		}
	}

}
