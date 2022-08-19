<?php
defined('_EXEC') or die;

class Manager_controller extends Controller
{
  public function __construct()
  {

    parent::__construct();
  }

  public function index( $params )
  {

    // Prepare Ajax Action Exec with $_POST

    global $entries_report, $entries_pending, $employees, $entries_answered;

    $entries_report = $this->model->get_entries_report();
    $entries_pending = $this->model->get_entries_pending();
    $entries_answered = $this->model->get_entries_answered();
    $employees = $this->model->get_employees();

    define('_title', 'Vista de Encargado de Area en {$vkye_webpage}');
    echo $this->view->render($this, 'index');
  }

}
