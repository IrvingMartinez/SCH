<?php defined('_EXEC') or die;

class Entry_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_areas()
    {
        return $this->database->select('areas',
        [
                'id',
                'code',
                'title'
        ]
        );
    }
}


/*

controller
function index()
{

    global area_id = $_GET['id_area'];

    global fecth = $this->functionmodel($area_id);
}

model
function($data){

    return select(

    'employees',
    [
        'campos_1',
        'n'
    ],
    [
        'id_area' => $data
    ]

    );


}

*/
