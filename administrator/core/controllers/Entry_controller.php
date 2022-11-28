<?php defined('_EXEC') or die;

class Entry_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        // Función al Index, get_areas

        global $areas;
        $areas = $this->model->get_areas();

        define('_title', 'Lista de Entradas en {$vkye_webpage}');
		echo $this->view->render($this, 'index');
    }

    public function entry()
    {

        define('_title', 'Lista de Entradas en {$vkye_webpage}');
		echo $this->view->render($this, 'new');
    }
}
