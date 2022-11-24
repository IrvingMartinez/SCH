<?php
defined('_EXEC') or die;

class Schedule_model extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_employees()
  {

        return $this->database->select(
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
                'entries.check_date',
                'entries.check_time',
                'entries.entry_date',
                'entries.media',
                'entries.entry_time',
                'entries.status_entry',
                'entries.status_response',
                'entries.desc_incidence',
                // Fetch from Municipalities, Area and Position
                'areas.title',
                'municipalities.title (pos_title)',
                'positions.title (pos_area)'
            ]
        );
    }
}
