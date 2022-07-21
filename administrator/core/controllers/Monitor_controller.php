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
    // Prepare Ajax Action Exec with $_POST

    define('_title', 'Vista monitoreo de Encargado em {$vkye_webpage}');
    echo $this->view->render($this, 'index');
  }
}
