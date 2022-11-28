<?php
defined('_EXEC') or die;

class Inbox_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_reports()
    {

        return $this->database->select(
                // Tabla a llamar
                "entries",
                [
                    "[>]employees" => ["id_employee" => "id"],
                    "[>]areas" => ["employees.id_area" => "id"]
                ],[
                    // Target columns from Employees
                    'employees.name', 'employees.ap_pat', 'employees.ap_mat',
                    'employees.cuip',
                    'employees.avatar',
                    'employees.num_card', 'employees.sched_time',
                    // Target columns from Entries
                    'entries.id',
                    'entries.check_time', 'entries.entry_time',
                    'entries.check_date', 'entries.entry_date',
                    'areas.title',
                    'entries.status_entry',
                    'entries.status_response'
                ],[
                    'entries.status_response' => '2',
                    'ORDER' => ['entries.entry_time' => 'ASC']
                ]
        );
    }

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
                'employees.sched_time',
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
            ],[
                'entries.id' => [$id]
            ]
        );

        return ( isset($response[0]) && !empty($response[0]) ) ? $response[0] : null;
    }

    public function send_report($data_desc, $data_entry, $data_id)
    {
        return $this->database->update(
            // Tabla a llamar
            "entries",
            [
                "desc_response" => $data_desc,
                "status_entry" => $data_entry,
                "status_response" => "4"
            ],[
                "id" => $data_id
            ]
        );
    }

}
