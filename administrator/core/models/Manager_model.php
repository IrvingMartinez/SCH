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

// Función para llamar empleados

public function get_employees(){
    return $this->database->select(
        // Tabla a llamar
        "employees",
        [
            'avatar',
            'id',
            'name',
            'ap_pat',
            'ap_mat',
            'cuip'
        ]
    );
}

// Pantalla de Incidencias Pendientes de RH

public function get_entries_pending(){
    return $this->database->select(
        // Tabla a llamar
        "entries",
        [
            "[>]employees" => ["id_employee" => "id"]
        ],
        [
            // Target columns from Employees
            'employees.id',
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
            'entries.status_response' => '2',
            'ORDER' => ['entries.entry_time' => 'DESC']
        ]
    );
}

// Pantalla de Incidencias a ser Archivadas

public function get_entries_answered(){
    return $this->database->select(
        // Tabla a llamar
        "entries",
        [
            "[>]employees" => ["id_employee" => "id"]
        ],[
            // Target columns from Employees
            'employees.id',
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
            'entries.status_response' => '3',
            'ORDER' => ['entries.entry_time' => 'DESC']
        ]
    );
}

// Update de Incidencias cuando Manager contesta a RH

// public function update_entries_answer( $data ){
//       $this->database->update(
//           // Tabla a hacer update
//           'entries',
//           [
//               'status_response' => '2',
//               'desc_incidence' => $data['desc_incidence'],
//               'desc_response' => $data['desc_response'],
//               'media' => $data['media']
//           ],[
//               'id' => $data['id']
//           ]
//       );
// }

// Update cuando Manager archiva la Incidencia en entries

// public function update_entries_archive( $data ){
//
//       $this->database->update(
//           // Tabla a hacer update
//           'entries',
//           [
//               'status_response' => '4'
//           ],[
//               'id' => $data['id']
//           ]
//       );
// }
}
