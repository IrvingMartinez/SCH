<?php
defined('_EXEC') or die;

class Users_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if ( Format::exist_ajax_request() )
		{
			header('Content-type: application/json');

			$post['email'] = ( isset($_POST['email']) && !empty($_POST['email']) ) ? $_POST['email'] : null;
			$post['password'] = ( isset($_POST['password']) && !empty($_POST['password']) ) ? $_POST['password'] : null;

			$labels = [];

			if ( is_null($post['email']) ) array_push($labels, ['email', 'Por favor, escriba el correo electrónico con el que está registrado.']);
			if ( is_null($post['password']) ) array_push($labels, ['password', 'Por favor, escriba una contraseña.']);

			if ( empty($labels) )
			{
				$user = $this->model->get_user($post);

				if ( is_null($user) )
				{
					echo json_encode([
						'status' => 'error',
						'labels' => [
							['email', 'El correo electrónico no se encuentra registrado.']
						]
					], JSON_PRETTY_PRINT);
				}
				else
				{
					$crypto = explode(':', $user['password']);
					$check_password = ( $this->security->create_hash('sha1', $post['password'] . $crypto[1]) === $crypto[0] ) ? true : false;

					if ( $check_password == false )
					{
						echo json_encode([
							'status' => 'error',
							'labels' => [
								['password', 'La contraseña es incorrecta.']
							],
						], JSON_PRETTY_PRINT);
					}
					else
					{
						if ( $this->model->create_session($user) )
						{
							echo json_encode([
								"status" => "OK",
								"redirect" => '/dashboard'
							], JSON_PRETTY_PRINT);
						}
						else
						{
							echo json_encode([
								'status' => 'fatal_error',
								'message' => 'Se produjo un error desconocido, vuelve a intentarlo.'
							], JSON_PRETTY_PRINT);
						}
					}
				}
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels,
					'message' => 'Por favor, inicie sesión.'
				], JSON_PRETTY_PRINT);
			}
		}
		else
		{
			define('_title', 'Iniciar sesión en {$vkye_webpage}');
			$template = $this->view->render($this, 'login');

			echo $template;
		}
	}

	public function register()
	{
		if ( Format::exist_ajax_request() )
		{
			header('Content-type: application/json');

			$post['username'] = strtoupper($this->security->random_string(6));
			$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
			$post['email'] = ( isset($_POST['email']) && !empty($_POST['email']) ) ? $_POST['email'] : null;
			$post['phone'] = ( isset($_POST['phone']) && !empty($_POST['phone']) ) ? str_replace(['(',')','-',' '], '', $_POST['prefix'] . $_POST['phone']) : null;
			$post['password'] = ( isset($_POST['password']) && !empty($_POST['password']) ) ? $_POST['password'] : null;
			$post['r-password'] = ( isset($_POST['r-password']) && !empty($_POST['r-password']) ) ? $_POST['r-password'] : null;

			$labels = [];

			if ( is_null($post['name']) ) array_push($labels, ['name', '']);
			if ( is_null($post['email']) ) array_push($labels, ['email', '']);
			if ( is_null($post['phone']) ) array_push($labels, ['phone', '']);
			if ( strlen($post['password']) < 8 ) array_push($labels, ['password', 'Tu contraseña debe ser mayor a 8 caracteres.']);
			if ( $post['password'] !== $post['r-password'] ) array_push($labels, ['r-password', 'Las contraseñas no son iguales.']);
			if ( !empty($this->model->get_user($post)) ) array_push($labels, ['email', 'Este correo electrónico ya se encuentra registrado.']);

			if ( empty($labels) )
			{
				if ( $this->model->create_user($post) )
				{
					if ( $this->model->create_session( $this->model->get_user($post) ) )
					{
						echo json_encode([
							"status" => "OK",
							"redirect" => '/dashboard'
						], JSON_PRETTY_PRINT);
					}
					else
					{
						echo json_encode([
							'status' => 'fatal_error',
							'message' => 'Se produjo un error desconocido, vuelve a intentarlo.'
						], JSON_PRETTY_PRINT);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'fatal_error',
						'message' => 'Se produjo un error desconocido, vuelve a intentarlo.'
					], JSON_PRETTY_PRINT);
				}
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
		}
		else
		{
			global $ladas;

			$ladas = $this->format->import_file(PATH_INCLUDES, 'code_countries_lada', 'json');

			define('_title', 'Registrarme en {$vkye_webpage}');
			echo $this->view->render($this, 'register');
		}
	}

	public function logout()
	{
		$this->model->log_session([ 'id_user' => Session::get_value('_vkye_id_user'), 'token' => Session::get_value('_vkye_token') ], 'logout');

		setcookie("_vkye_token", null, -1, '/');
		Session::destroy();

		header("Location: /iniciar-sesion");
	}
}
