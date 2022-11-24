<?php
defined('_EXEC') or die;

class Schedule_controller extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index( $params )
  {
    // Prepare Ajax Action Exec with $_POST

    global $employees;
    $employees = $this->model->get_employees();

    define('_title', 'Vista asignación de Horarios en {$vkye_webpage}');
    echo $this->view->render($this, 'index');
  }
}
