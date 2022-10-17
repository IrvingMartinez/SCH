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

  public function validate_report()
  {
      $post['desc_incidence'] = ( isset($_POST['desc_incidence']) && !empty($_POST['desc_incidence']) ) ? $_POST['desc_incidence'] : null;
      $post['media'] = ( isset($_POST['media']) && !empty($_POST['media']) ) ? $_POST['media'] : null;

      $labels = [];
      $edit = false;

      if( is_null($post['desc_incidence']))
        array_push($labels, ['desc_incidence', 'Por favor, agruegue la descripción.']);

        if( $edit == false)
        {
            $__valid = Upload::validate_file($post['media'], ['jpg', 'jpeg', 'png']);
            if( $__valid['status'] === 'ERROR' )
                array_push($labels, ['media', $__valid['message']]);
        }

        if( !empty($labels) )
        {
            return [
                'status_response' => 'ERROR',
                'labels' => $labels
            ];
        }
        else
        {
            return [
                'status_response' => 'OK',
                'post' => $post
            ];
        }
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

      if( isset($params['id']) && !empty($params['id']) )
      {

          $response = $this->model->get_employee_report($params['id']);

          if(isset($response) && !empty($response))
          {
              $respone = $this->validate_report();

              if($response['status_response'] == 'ERROR')
              {
                  echo json_encode([
                     'status_response' => 'error',
                     'labels' => $response['labels']
                 ], JSON_PRETTY_PRINT);
              }
              else
              {
                  $response['post']['id'] = $params['id'];

                  $response = $this->model->save_report($response['post']);

                  if($response['status_response'] != 'OK')
                  {
                      echo json_encode([
                          'status_response' => 'fatal_error',
                          'message' => $response['message']
                      ], JSON_PRETTY_PRINT);
                  }
              }
            }
      }
    }

}
