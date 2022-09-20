<?php
defined('_EXEC') or die;

class Manager_controller extends Controller
{
  public function __construct()
  {

    parent::__construct();
  }

  // Función para indexar los reportes por estado de respuesta (VISTA)

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

  // Funcón para obtener el estado de reporte por id de empleado (Función y Vista)

  public function incidence_report()
  {

      // Agregar función de datos de empleado para vista en formulario

      $data = $_GET['id'];

      global $employee_report;

      $employee_report = $this->model->get_employee_report($data);

      define('_title', 'Vista de Creación de Reportes en {$vkye_webpage}');
      echo $this->view->render($this, 'new');
  }

}
