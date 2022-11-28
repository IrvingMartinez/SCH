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

  public function change_schedule( $params )
  {

      if(isset($_POST['sched_time']) && !empty($_POST['sched_time']))
      {

          global $id;
          $id = $_GET['id'];
          global $sched_time;
          $sched_time = $_POST['sched_time'];

          global $employee_report;
          $employee_report = $this->model->get_employee_report($id);

          $this->model->new_schedule($id, $sched_time);

          echo
          "<script type='text/javascript'>
                window.location='index.php?c=schedule';
          </script>";

          define('_title', 'Cambio de Horario');
          echo $this->view->render($this, 'new');
      }
      else
      {
          $id = $_GET['id'];

          global $employee_report, $change;
          $change = $employee_report = $this->model->get_employee_report($id);

          define('_title', 'Cambio de Horario');
          echo $this->view->render($this, 'new');
      }
      // Fin de Función
  }
}
