<?php defined('_EXEC') or die;

class Manager_model extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

// Funciones para traer detalles de empleados y entradas - Tab 1
// Pantalla de incidencias esperando Respuesta de Manager

public function get_entries_report() {

      return $this->database->select(
          // Tabla a llamar
          "entries",
          [
            "[>]employees" => ["id_employee" => "id"]
          ],[
              // Target columns from Employees
              'employees.name', 'employees.ap_pat', 'employees.ap_mat',
              'employees.cuip',
              'employees.avatar',
              'employees.num_card', 'employees.num_family',
              // Target columns from Entries
              'entries.id',
              'entries.check_time', 'entries.entry_time',
              'entries.status_entry',
              'entries.status_response'
          ],[
             'entries.status_response' => '1',
             'ORDER' => ['entries.entry_time' => 'DESC']
          ]
      );
}

// Función de búsqueda en base al id

public function get_employee_report( $id = null )
{

    if(is_null($id))
        return null;

        $response = $this->database->select(
            // Tabla a llamar
            "employees",
            [
                "[>]entries" => ["id" => "id_employee"],
                "[>]areas" => ["id_area" => "id"],
                "[>]municipalities" => ["id_municipality" => "id"],
                "[>]positions" => ["id_position" => "id"]
            ],[
                // Fetch from Employees
                'employees.id',
                'employees.name', 'employees.ap_pat', 'employees.ap_mat',
                'employees.cuip', 'employees.num_card',
                'employees.avatar',
                'employees.num_employee',
                'employees.curp',
                'employees.num_family',
                'employees.rfc',
                // Fetch from Entries
                'entries.entry_time',
                'entries.check_time',
                'entries.status_entry',
                'entries.status_response',
                'entries.desc_incidence',
                // Fetch from Municipalities, Area and Position
                'areas.title',
                'municipalities.title (pos_title)',
                'positions.title (pos_area)'
            ],[
                'entries.id' => [$id]
            ]
        );

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
}

public function send_report( $data_desc, $data_id )
{

    if(is_null($data_desc) || is_null($data_id))
    {
        $message = "SCH_SERVER:DATA_IS_EMPTY";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else
    {

        $response = $this->database->update(
            // Tabla a llamar
            "entries",
            [
                // ROWS
                "desc_incidence" => $data_desc,
                "status_response" => "2"
            ],[
                // WHERE
                "id" => $data_id
            ]
        );
    }
}


}
