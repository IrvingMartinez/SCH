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

        if(isset($_POST['status_entry']) && !empty($_POST['status_entry']))
        {

            $data_entry = $_POST['status_entry'];
            $data_id = $_GET['id'];
            $data_desc = $_POST['desc_response'];

            $this->model->send_report($data_desc, $data_entry, $data_id);
            
            echo
            "<script type='text/javascript'>alert('Reporte completado.');</script>";

            echo
            "<script type='text/javascript'>window.location.replace('index.php?c=inbox');</script>";
        }
        else
        {

            global $employee_report;

            $employee_report = $this->model->get_employee_report($params['id']);

            define('_title', 'Vista de reportes en {$vkye_webpage}');
            echo $this->view->render($this, 'new');
        }

    }

}
