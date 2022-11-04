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

    global $entries_report;

    $entries_report = $this->model->get_entries_report();

    define('_title', 'Vista de Encargado de Area en {$vkye_webpage}');
    echo $this->view->render($this, 'index');
  }

  // Funcón para obtener el estado de reporte por id de empleado (Función y Vista)

  public function incidence_report( $params )
  {
      // Agregar función de datos de empleado para vista en formulario

      if(isset($_POST['desc_incidence']) && !empty($_POST['desc_incidence']))
      {

          $id = $_GET['id'];
          $desc = $_POST['desc_incidence'];

          $send_report = $this->model->send_report($_POST['desc_incidence'], $id);

          // SALIDA DE DATOS HACIA LA FUNCIÓN

          echo
          "<script type='text/javascript'>alert('Se actualizó el reporte');</script>";

          echo
          "<script type='text/javascript'>window.location.replace('index.php?c=manager');</script>";
      }
      else
      {

          global $employee_report;

          $employee_report = $this->model->get_employee_report($params['id']);

          define('_title', 'Vista de Creación de Reportes en {$vkye_webpage}');
          echo $this->view->render($this, 'new');
      }

  }


}
