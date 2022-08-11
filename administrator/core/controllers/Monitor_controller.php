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
    	global $employees;

    	$employees = $this->model->get_all_employees();

    	define('_title', 'Lista de empleados registrados en {$vkye_webpage}');
    	echo $this->view->render($this, 'index');
    }

    public function create_employee( $params)
	{
        if ( Format::exist_ajax_request() )
        {
            $responde = $this->validate_employee();

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
            global $positions, $areas, $cities, $municipalities;

            $positions = $this->model->get_positions();
            $areas = $this->model->get_areas();
        	$cities = $this->model->get_cities();
        	$municipalities = $this->model->get_municipalities();

			define('_title', 'Crear nuevo empleado - {$vkye_webpage}');
			echo $this->view->render($this, 'new');
        }
    }

    // public function create_employee( $params)
	// {
	// 	/* Action Ajax ------------------------------------------------------ */
	// 	if ( Format::exist_ajax_request() )
	// 	{
	// 		$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
	// 		$post['ap_pat'] = ( isset($_POST['ap_pat']) && !empty($_POST['ap_pat']) ) ? $_POST['ap_pat'] : null;
	// 		$post['ap_mat'] = ( isset($_POST['ap_mat']) && !empty($_POST['ap_mat']) ) ? $_POST['ap_mat'] : null;
	// 		$post['curp'] = ( isset($_POST['curp']) && !empty($_POST['curp']) ) ? $_POST['curp'] : null;
	// 		$post['rfc'] = ( isset($_POST['rfc']) && !empty($_POST['rfc']) ) ? $_POST['rfc'] : null;
    //
	// 		$labels = [];
    //
	// 		if ( is_null($post['name']) )
	// 			array_push($labels, ['name', 'Escribe el nombre del empleado.']);
    //
	// 		if ( !empty($labels) )
	// 		{
	// 			echo json_encode([
	// 				'status' => 'error',
	// 				'labels' => $labels
	// 			], JSON_PRETTY_PRINT);
	// 		}
	// 		else
	// 		{
	// 			// $this->model->create_employee($post);
    //
	// 			echo json_encode([
	// 				'status' => 'OK',
	// 				'redirect' => 'index.php?c=monitor'
	// 			], JSON_PRETTY_PRINT);
	// 		}
	// 	}
	// 	else
	// 		Errors::http('404');
	// }
}
