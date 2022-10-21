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

  // Validar entrada de datos al modelo

  public function validate_report( $data )
  {
      // Función que regresa un string de datos a la función de reportes

      /*

      RECIBE 2 VALORES: $data['media'] y ['message_response']

      $response;

      VALIDAR 1:
            if( isset($data['message_response']) && !empty($data['message_response']) ) ? $response = 'OK' : $response = 'error';
            if( isset($data['media']) && !empty($data['media']) ) ? $response = 'OK' : $response = 'error';

      return $response;
      */
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

  // Función para envio de reportes a modulo 2 (RRHH)

  public function send_report( $params )
  {
        // Validar existan los campos con label response => $data['data']

        $data = $_POST['labels'];

        echo "<script type='text/javascript'>alert('Hola');</script>";

        global $entries_report;

        $entries_report = $this->model->get_entries_report();

        define('_title', 'Vista de Encargado de Area en {$vkye_webpage}');
        echo $this->view->render($this, 'index');

        /*

        PARSE $_POST COMO ARRAY CON data_media y data_description
        AGREGAR FUNCIÓN PARA validate_Data

        $response_status = $this->validate_data(regresa un String entre 'OK' o 'error' );

        if($response_status['media'] o ['descripcion'] == null)
        {
            *** DAR ALERTA DE CAMPOS INCOMPLETOS -> NO REDIRECT
            DIES
        }
        else
        {
            *** DAR MENSAJE DE CAMPOS COMPLETADOS Y ACTUALIZACIÓN

            update_report($response_status);
            REDIRECT -> OK TO MANAGER

            render TO -> MANAGER
        }
        */
  }

}
