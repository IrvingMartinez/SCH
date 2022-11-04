<?php
defined('_EXEC') or die;

class Inbox_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params)
    {

        global $reports;

        $reports = $this->model->get_reports();

        define('_title', 'Vista de inbox en {$vkye_webpage}');
        echo $this->view->render($this, 'index');
    }

    public function incidence_report( $params )
    {

        global $employee_report;

        $employee_report = $this->model->get_employee_report($params['id']);

        define('_title', 'Vista de reportes en {$vkye_webpage}');
        echo $this->view->render($this, 'new');
    }

}
