<?php
defined('_EXEC') or die;

class Monitor_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index( $params )
    {
    	global $employees, $positions, $areas, $municipalities;

    	$employees = $this->model->get_employees();
    	$positions = $this->model->get_positions();
    	$areas = $this->model->get_areas();
    	$municipalities = $this->model->get_municipalities();

    	define('_title', 'Lista de empleados registrados en {$vkye_webpage}');
    	echo $this->view->render($this, 'index');
    }

    private function validate_employee( $edit = false )
	{
		$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
		$post['ap_pat'] = ( isset($_POST['ap_pat']) && !empty($_POST['ap_pat']) ) ? $_POST['ap_pat'] : null;
		$post['ap_mat'] = ( isset($_POST['ap_mat']) && !empty($_POST['ap_mat']) ) ? $_POST['ap_mat'] : null;
		$post['curp'] = ( isset($_POST['curp']) && !empty($_POST['curp']) ) ? $_POST['curp'] : null;
		$post['rfc'] = ( isset($_POST['rfc']) && !empty($_POST['rfc']) ) ? $_POST['rfc'] : null;
		$post['num_employee'] = ( isset($_POST['num_employee']) && !empty($_POST['num_employee']) ) ? $_POST['num_employee'] : null;
		$post['cuip'] = ( isset($_POST['cuip']) && !empty($_POST['cuip']) ) ? $_POST['cuip'] : null;
		$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
		$post['status'] = ( isset($_POST['status']) && !empty($_POST['status']) ) ?  true : false;
		$post['num_card'] = ( isset($_POST['num_card']) && !empty($_POST['num_card']) ) ? $_POST['num_card'] : null;
		$post['position'] = ( isset($_POST['position']) && !empty($_POST['position']) ) ? $_POST['position'] : null;
		$post['area'] = ( isset($_POST['area']) && !empty($_POST['area']) ) ? $_POST['area'] : null;
		$post['municipality'] = ( isset($_POST['municipality']) && !empty($_POST['municipality']) ) ? $_POST['municipality'] : null;

		$labels = [];

		if ( is_null($post['name']) )
			array_push($labels, ['name', 'Escribe el nombre del empleado.']);

		if ( is_null($post['ap_pat']) )
			array_push($labels, ['ap_pat', 'Escribe el apellido paterno.']);

		if ( is_null($post['ap_mat']) )
			array_push($labels, ['ap_mat', 'Escribe el apellido materno.']);

		if ( is_null($post['num_employee']) )
			array_push($labels, ['num_employee', 'Escribe el número de empleado.']);

		if ( is_null($post['cuip']) )
			array_push($labels, ['cuip', 'Escribe el cuip del empleado.']);

        if ( $edit == false )
        {
            $__valid = Upload::validate_file($post['image_cover'], ['jpg', 'jpeg', 'png']);
            if ( $__valid['status'] === 'ERROR' )
            /*  */ array_push($labels, ['image_cover', $__valid['message']]);
        }

        // if ( is_null($post['num_card']) )
		// 	array_push($labels, ['num_card', 'Escribe el numero de la tarjeta.']);
        //
        // if ( is_null($post['num_family']) )
		// 	array_push($labels, ['num_family', 'Escribe el numero de familia de la tarjeta.']);

        if ( is_null($post['position']) )
			array_push($labels, ['position', 'Selecciona un puesto de empleado.']);

        if ( is_null($post['area']) )
			array_push($labels, ['area', 'Selecciona un área / departamento.']);

        if ( is_null($post['municipality']) )
			array_push($labels, ['municipality', 'Selecciona un municipio.']);

        if ( !empty($labels) )
		{
			return [
				'status' => 'ERROR',
				'labels' => $labels
			];
		}
		else
		{
			return [
				'status' => 'OK',
				'post' => $post
			];
		}
	}

    public function create_employee( $params )
	{
        if ( Format::exist_ajax_request() )
        {
            $response = $this->validate_employee();

            if ( $response['status'] == 'ERROR')
            {
                echo json_encode([
                    'status' => 'error',
                    'labels' => $response['labels']
                ], JSON_PRETTY_PRINT);
            }
            else
            {
                $response = $this->model->save_employee( $response['post'] );

                if ( $response['status'] == 'fatal_error' )
                {
                    echo json_encode([
    					'status' => 'fatal_error',
    					'message' => $response['message']
    				], JSON_PRETTY_PRINT);
                }
                else
    			{
    				echo json_encode([
    					'status' => 'OK',
    					'redirect' => 'index.php?c=monitor'
    				], JSON_PRETTY_PRINT);
    			}
            }
        }
        else
        {
            global $positions, $areas, $municipalities;

            $positions = $this->model->get_positions();
            $areas = $this->model->get_areas();
        	$municipalities = $this->model->get_municipalities();

			define('_title', 'Crear nuevo empleado - {$vkye_webpage}');
			echo $this->view->render($this, 'new');
        }
    }

    public function update_employee( $params )
    {
        if ( isset($params['id']) && !empty($params['id']) )
        {
            $response = $this->model->get_employee($params['id']);

            if ( isset($response) && !empty($response) )
            {
                if (Format::exist_ajax_request() )
                {
                    $response = $this->validate_employee(true);

                    if ( $response['status'] == 'ERROR' )
                    {
                        echo json_encode([
                            'status' => 'error',
                            'labels' => $response['labels']
                        ], JSON_PRETTY_PRINT);
                    }
                    else
                    {
                        $response['post']['id'] = $params['id'];

                        $response = $this->model->save_employee( $response['post'], true );

                        if ( $response['status'] != 'OK' )
                        {
                            echo json_encode([
                                'status' => 'fatal_error',
                                'message' => $response['message']
                            ], JSON_PRETTY_PRINT);
                        }
                        else
                        {
                            echo json_encode([
                                'status' => 'OK',
                                'redirect' => 'index.php?c=monitor&m=update_employee&id='. $params['id']
                            ], JSON_PRETTY_PRINT);
                        }
                    }
                }
                else
                {
                    global $positions, $areas, $municipalities, $employee;

                    $positions = $this->model->get_positions();
                    $areas = $this->model->get_areas();
                	$municipalities = $this->model->get_municipalities();
					$employee = $response;

					define('_title', $employee['name'] .' - {$vkye_webpage}');
					echo $this->view->render($this, 'update');
                }
            }
            else
			/*  */ Errors::http('404');
        }
        else
			/*  */ Errors::http('404');
    }

    public function create_position()
    {
        /* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$post['code'] = ( isset($_POST['code']) && !empty($_POST['code']) ) ? $_POST['code'] : null;
			$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;

			$labels = [];

			if ( is_null($post['code']) )
				array_push($labels, ['code', 'Debes escribir el puesto de trabajo.']);

			if ( is_null($post['title']) )
				array_push($labels, ['title', 'Escribe el nombre del puesto.']);

			if ( !empty($labels) )
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
			else
			{
				$this->model->create_position($post);

				echo json_encode([
					'status' => 'OK',
					'redirect' => 'index.php?c=monitor'
				], JSON_PRETTY_PRINT);
			}
		}
		else
			Errors::http('404');

    }

    public function create_area()
    {
        /* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$post['code'] = ( isset($_POST['code']) && !empty($_POST['code']) ) ? $_POST['code'] : null;
			$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;

			$labels = [];

			if ( is_null($post['code']) )
				array_push($labels, ['code', 'Debes escribir el área de trabajo.']);

			if ( is_null($post['title']) )
				array_push($labels, ['title', 'Escribe el nombre del área.']);

			if ( !empty($labels) )
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
			else
			{
				$this->model->create_area($post);

				echo json_encode([
					'status' => 'OK',
					'redirect' => 'index.php?c=monitor'
				], JSON_PRETTY_PRINT);
			}
		}
		else
			Errors::http('404');

    }

    public function create_municipality()
    {
        /* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$post['code'] = ( isset($_POST['code']) && !empty($_POST['code']) ) ? $_POST['code'] : null;
			$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;

			$labels = [];

			if ( is_null($post['code']) )
				array_push($labels, ['code', 'Debes escribir el municipio.']);

			if ( is_null($post['title']) )
				array_push($labels, ['title', 'Escribe el nombre del municipio.']);

			if ( !empty($labels) )
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
			else
			{
				$this->model->create_municipality($post);

				echo json_encode([
					'status' => 'OK',
					'redirect' => 'index.php?c=monitor'
				], JSON_PRETTY_PRINT);
			}
		}
		else
			Errors::http('404');

    }

    public function delete_position()
	{
		header('Content-type: application/json');

		$post['id'] = ( isset($_POST['id']) && !empty($_POST['id']) ) ? $_POST['id'] : null;

		if ( is_null($post['id']) )
		{
			echo json_encode([
				'status' => 'error',
				'message' => 'Debes elegir un puesto.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete_position($post);

			echo json_encode([
				'status' => 'OK',
				'redirect' => 'index.php?c=monitor'
			], JSON_PRETTY_PRINT);
		}
	}

    public function delete_area()
	{
		header('Content-type: application/json');

		$post['id'] = ( isset($_POST['id']) && !empty($_POST['id']) ) ? $_POST['id'] : null;

		if ( is_null($post['id']) )
		{
			echo json_encode([
				'status' => 'error',
				'message' => 'Debes elegir un área.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete_area($post);

			echo json_encode([
				'status' => 'OK',
				'redirect' => 'index.php?c=monitor'
			], JSON_PRETTY_PRINT);
		}
	}

    public function delete_municipality()
	{
		header('Content-type: application/json');

		$post['id'] = ( isset($_POST['id']) && !empty($_POST['id']) ) ? $_POST['id'] : null;

		if ( is_null($post['id']) )
		{
			echo json_encode([
				'status' => 'error',
				'message' => 'Debes elegir un municipio.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete_municipality($post);

			echo json_encode([
				'status' => 'OK',
				'redirect' => 'index.php?c=monitor'
			], JSON_PRETTY_PRINT);
		}
	}
}
