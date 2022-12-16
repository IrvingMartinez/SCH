<?php
defined('_EXEC') or die;

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// Lógica de Entradas



	// function on.event( $tarjeta )
	// {
	//
	// 	SI EXISTE $tarjeta Y $tarjeta !NULL
	// 	{
	// 		SI EN empleado.horarios EXISTE empleados.horarios != null
	// 		{
	// 			SI EN empleado.estado ES ACTIVO
	// 			{
	// 				SI NO EXISTE $this->employee->entries DONDE FECHA SEA HOY
	// 				{
	// 					SI tiempo.checado ES MENOR A horario.entrada + 10 MIN
	// 					{
	// 						CREAR ENTRADA REGULAR
	// 						MENSAJE "Bienvenido. Regular(VERDE)"
	// 					}
	// 					ELSE SI tiempo.checado ES MAYOR A horario.entrada + 10 MIN && MENOR A tiempo.checado + 12 MIN
	// 					{
	// 						CREAR ENTRADA RETARDO
	// 						MENSAJE "Bienvenido. Retardo(AMARILLO)"
	// 					}
	// 					ELSE SI tiempo.checado ES MAYOR A horario.entrada + 12 MIN
	// 					{
	// 						CREAR ENTRADA FALTA
	// 						MENSAJE "Bienvenido. FALTA(ROJO)"
	// 					}
	// 				}
	// 				ELSE EXISTE $this->employee->entries DONDE FECHA ES HOY
	// 				{
	// 					MENSAJE "Entrada rechazada. Razón: Empleado ya tuvo un acceso hoy. Comunicarse con RRHH o Sistemas para aclaraciones."
	// 				}
	// 			}
	// 			ELSE empleado.estado ES INACTIVO
	// 			{
	// 				MENSAJE "Entrada rechazada. Razón: Empleado no activado en Sistema, hable con RRHH o Sistemas para alta o corrección"
	// 			}
	// 		}
	// 		ELSE empleados.horarios ES null
	// 		{
	// 			MENSAJE "Entrada rechazada. Razón: No existe un horario registrado para este empleado"
	// 		}
	// 	}
	// 	ELSE tarjeta no existe
	// 	{
	// 		MENSAJE "Entrada rechazada. Razón: Tarjeta o empleado no registrado"
	// 	}
	// }


	public function index( $params )
	{

		if(isset($_GET['num_card']) && !empty($_GET['num_card']))
		{
			$card_num = $_GET['num_card'];

			global $employee, $response, $entry_validation;
			$employee = $this->model->get_employee($card_num);

			if(isset($employee) && !empty($employee))														// EXISTE EMPLEADO
			{
				if($employee['status'] == "1")																// EMPLEADO ACTIVO
				{
					if(isset($employee['sched_time']) && !empty($employee['sched_time']))					// EXISTA HORARIO ASIGNADO
					{
						if(empty($entry_validation))
						{

							// Función de registro entrada

							global $entry, $res;
							$entry = $this->model->create_entry($card_num);
							// entry retorna (0 >>> Regular, 1 >>> Retardo, 2 >>> Falta)

							if($entry == "0")
							{
								$res = "0";
							}
							else if($entry == "1")
							{
								$res = "1";
							}

							$response = "5";
						}
						else
						{
							$response = "4";
						}
					}
					else
					{
						$response = "3";
					}
				}
				else
				{
					$response = "2";
				}
			}
			else
			{
				$response = "1";
			}

			define('_title', 'Lista de Áreas en {$vkye_webpage}');
			echo $this->view->render($this, 'index');
		}
		else
		{

			$card_num = $_GET['num_card'];

			global $employee;
			$employee = $this->model->get_employee($card_num);

			define('_title', 'Lista de Áreas en {$vkye_webpage}');
			echo $this->view->render($this, 'index');
		}
	}

}
