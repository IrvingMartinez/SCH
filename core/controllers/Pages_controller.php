<?php
defined('_EXEC') or die;

class Pages_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		define('_title', '{$vkye_webpage}');
		$template = $this->view->render($this, 'home');

		echo $template;
		// echo $this->security->create_password('admin');
	}

}
