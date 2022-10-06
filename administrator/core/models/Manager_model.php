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
                'municipalities.code'
            ],[
                'entries.id' => [$id]
            ]
        );

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
}

// Función para contestar la incidencia reportada, y enviarla a RH

    public function save_report( $data )
    {

        // On update change to response 1 => 2 * ADD
        if($data != null)
        {
            $this->database->update(
                    'entries',
                    [
                        'status_response' => '2'
                    ],
                    [
                        'id_employee' => $data
                    ]
                );
        }
        else
        {
            $this->database->update(
                'entries',
                [
                    'status_response' => '2'
                ],
                [
                    'id_employee' => '1'
                ]
            );
        }

    return $query;
    }
}
