<?php
defined('_EXEC') or die;

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index( $params )
	{

		if(isset($_GET['num_card']) && !empty($_GET['num_card']))
		{
			$card_num = $_GET['num_card'];

			global $employee;
			$employee = $this->model->get_employee($card_num);

			// Función de registro entrada

			global $entry;
			$entry = $this->model->create_entry($card_num);

			define('_title', 'Lista de Áreas en {$vkye_webpage}');
			echo $this->view->render($this, 'index');
		}
		else
		{

			$card_num = $_GET['num_card'];

			global $employee;
			$employee = $this->model->get_employee($card_num);

			define('_title', 'Lista de Áreas en {$vkye_webpage}');
			echo $this->view->render($this, 'index');
		}
	}

}
